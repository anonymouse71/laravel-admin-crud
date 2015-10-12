<?php

class BookController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
}


    public function index()
    {

        //$books = DB::table('books')->get();
      // return View::make('books.bview')->with('books',$books);
        $books = Books::all();

        return View::make('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */



    /**
     * Store a newly created user in storage.
     *
     * @return Response
*/
    public function store()
    {
        $rules = array(
            'bname' => 'required',
            'bauthor' => 'required',
            'bedition' => 'required',


        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('books/create')
                ->withErrors($validator);

        } else {

            $books = new Books;
            $books->bname = Input::get('bname');
            $books->bauthor = Input::get('bauthor');
            $books->bedition = Input::get('bedition');

            $books->save();

            return Redirect::to('books');
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     *

    public function create($id)
    {

        //$books = DB::table('books')->get();
        //return View::make('books.add')->with('books',$books);//here books is database and $books is variable
        $book = Books::find($id);

        return View::make('books.add', [ 'books' => $book ]);
    }
*/


    public function create()
{
    return View::make('books.create');
}




    public function edit($id)
    {
        $books = Books::find($id);

        return View::make('books.edit', [ 'books' => $books ]);

    }



    public function update($id)
    {
        $rules = array(
            'bname' => 'required',
            'bauthor' => 'required',
            'bedition' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('books/' . $id . '/edit')
                ->withErrors($validator);

        } else {


            $book = Books::find($id);

            $books = new Books;
            $books->bname = Input::get('bname');
            $books->bauthor = Input::get('bauthor');
            $books->bedition = Input::get('bedition');

            $books->save();

            return Redirect::to('books');
        }
    }




    public function destroy($id)
    {
        Books::destroy($id);

        return Redirect::to('/books');
    }







}
