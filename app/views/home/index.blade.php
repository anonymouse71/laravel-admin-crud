@extends('layouts.master')

@section('title') Login @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div >{{ $error }}</div>
        @endforeach
    @endif

    <h1> Login</h1>

    {{ Form::open(['role' => 'form']) }}

    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null) }}
    </div>

    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
    </div>

    <div class='form-group'>
        {{ Form::submit('Login') }}
    </div>

    {{ Form::close() }}

</div>

@stop