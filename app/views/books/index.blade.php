@extends('layouts.master')

@section('title') Books @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">



    <div class="table-responsive">

        <table class="table table-bordered table-striped">
        <h1>Book Details</h1>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Edition</th>

                    <th>Date/Time Added</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
          <tbody>
                          @foreach ($books as $book)
                          <tr>
                              <td>{{ $book->bname }}</td>
                              <td>{{ $book->bauthor }}</td>
                              <td>{{ $book->bedition }}</td>
                              <td>{{ $book->created_at->format('Y-m-d') }}</td>
                                 <td>
                                 <a href="books/{{ $book->id }}/edit" class="btn"  style="margin-right: 3px;">Edit</a>
                 </td>
                 <td>

                       {{ Form::open(['url' => '/books/' . $book->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete')}}
                         {{ Form::close() }}
                  </td>
                  </tr>

                          @endforeach
                 </tbody>




                  </table>


        </table>

        <a href="/books/create" >Add New Book</a>
    </div>



</div>

@stop