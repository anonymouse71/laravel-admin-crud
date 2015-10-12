@extends('layouts.master')

@section('title') Create User @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <h1> Add User</h1>

    {{ Form::open(['role' => 'form', 'url' => '/user/']) }}



    <div class='form-group'>
        {{ Form::label('name', ' Name') }}
        {{ Form::text('name') }}
    </div>

    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username') }}
    </div>

    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email') }}
    </div>
    <div class='form-group'>
            {{ Form::label('phone', 'Phone') }}
            {{ Form::number('phone') }}
        </div>

    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
    </div>


    <div class='form-group'>
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation') }}
    </div>

    <div class='form-group'>
          {{ Form::submit('Create Account') }}
    </div>



    {{ Form::close() }}

</div>

@stop