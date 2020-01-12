@extends('layouts.prototype')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-3 offset-2 sign-form">
            <h3>Sign up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-grid {{ $errors->has('email') ? 'has-error' : '' }} ">
                    <label for="email_up">Email address</label>
                    <input class="form-control" type="text" name="email_up" id="email_up" value="{{Request::old('email_up')}}">
                </div>
                <div class="form-grid {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
                </div>
                <div class="form-grid {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_up">Password</label>
                    <input class="form-control" type="password" name="password" id="password_up" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="button_sign btn btn-outline-secondary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-3 offset-1 sign-form">
            <h3>Sign in</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-grid {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email_in">Email adress</label>
                    <input class="form-control" type="text" name="email_in" id="email_in" value="{{Request::old('email_in')}}">
                </div>
                <div class="form-grid {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_in">Password</label>
                    <input class="form-control" type="password" name="password" id="password_in" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="button_sign btn btn-outline-secondary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>

@endsection

