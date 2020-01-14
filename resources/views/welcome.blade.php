<!--
welcome sign up / sign in blade file
= view for the sign up and sign in forms
-->

@extends('layouts.prototype')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')

    <div class='row bigger_margin'>
        <div class="col-md-6 error offset-3">
            <span class="note" aria-live="polite"></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 offset-2 sign-form">
            <h3>Sign up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-grid {{ $errors->has('email') ? 'has-error' : '' }} ">
                    <label for="email_up">Email address *</label>
                    <input class="form-control" type="text" name="email_up" id="email_up" value="{{Request::old('email_up')}}" required>
                </div>
                <div class="form-grid {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name *</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}" required>
                </div>
                <div class="form-grid {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_up">Password *</label>
                    <input class="form-control" type="password" name="password" id="password_up" value="{{Request::old('password')}}" required>
                </div>
                <button type="submit" class="button_sign btn btn-outline-secondary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-3 offset-1 sign-form">
            <h3>Sign in</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-grid {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email_in">Email adress *</label>
                    <input class="form-control" type="text" name="email_in" id="email_in" value="{{Request::old('email_in')}}" required>
                </div>
                <div class="form-grid {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_in">Password *</label>
                    <input class="form-control" type="password" name="password" id="password_in" value="{{Request::old('password')}}" required>
                </div>
                <button type="submit" class="button_sign btn btn-outline-secondary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    <div class='row bigger_margin' id="wrapper">
        <div class="col-md-3 offset-5">
            <span aria-live="polite">All fields are required.</span>
        </div>
        <div class="col-md-6 error offset-3">
            <span class="row error_js " aria-live="polite"></span>
        </div>
    </div>

    <script src="{{ URL::to('src/js/validation.js') }}"></script>
@endsection

