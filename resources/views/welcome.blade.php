@extends('layouts.prototype')

@section('title')
    Welcome!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-grid">
                    <label for="email">Email adress></label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-grid">
                    <label for="name">Name></label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-grid">
                    <label for="password">Password></label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sign in</h3>
            <form action="{{ route('signIp') }}" method="post">
                <div class="form-grid">
                    <label for="email">Email adress></label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-grid">
                    <label for="password">Password></label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection

