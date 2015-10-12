<?php

class UserController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
}

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::all();

        return View::make('user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response

    public function store()
    {
        $user = new User;


        $user->name  = Input::get('name');
        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->phone = Input::get('phone');
        $user->password   = Hash::make(Input::get('password'));

        $user->save();

        return Redirect::to('/user');
    }
*/

    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'username' =>'required|min:5|unique:users',
            'name'       => 'required',
            'email'      => 'required|email',
            'phone' => 'required|numeric',
            'password'=>'required|min:4'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('user/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new User;


            $user->name  = Input::get('name');
            $user->username   = Input::get('username');
            $user->email      = Input::get('email');
            $user->phone = Input::get('phone');
            $user->password   = Hash::make(Input::get('password'));

            $user->save();

            // redirect
            Session::flash('message', 'Successfully created!');
            return Redirect::to('user');
        }
    }


    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('user.edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response

    public function update($id)
    {
        $user = User::find($id);



        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->name = Input::get('name');
        $user->password   = Hash::make(Input::get('password'));
        $user->phone  = Input::get('phone');
        $user->save();

        return Redirect::to('/user');
    }
     */

    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'username' =>'required|min:5',
            'name'       => 'required',
            'email'      => 'required|email|',
            'phone' => 'required|numeric',
            'password'=>'required|min:4'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);



            $user->username   = Input::get('username');
            $user->email      = Input::get('email');
            $user->name = Input::get('name');
            $user->password   = Hash::make(Input::get('password'));
            $user->phone  = Input::get('phone');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated !');
            return Redirect::to('user');
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function show()
    {
       //
    }


    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::to('/user');
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/user');
    }

}