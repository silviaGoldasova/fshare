<!--
mode blade file
= view for the choosing the preferred mode of the web page
-->

@extends('layouts/prototype')

@section('content')
    @include('includes.message-block')

    <section class="row h-100">
        <div class="col-sm-12">
            <header class="col-sm-4 offset-4 page_heading"><h3>Change visual mode</h3></header>
        </div>
    </section>

    <section class="row offers" id="section_seller">
        <div class="col-md-6 offset-3">
            <form action="{{route('mode.change')}}" method="post">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Available modes:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="light_mode" value="light" @if ( Session::get('mode') == NULL or Session::get('mode') == "light") checked @endif >
                                <label class="form-check-label" for="gridRadios1">
                                    Light mode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="dark_mode" value="dark" @if (Session::get('mode') == "dark") checked @endif >
                                <label class="form-check-label" for="gridRadios2">
                                    Dark mode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="black&white" value="black" @if (Session::get('mode') == "black") checked @endif >
                                <label class="form-check-label" for="gridRadios3">
                                    Black & White mode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="larger" value="larger" @if (Session::get('mode') == "larger") checked @endif >
                                <label class="form-check-label" for="gridRadios3">
                                    Larger text
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-inline">
                    <div class="form-group mx-2">
                        <button type="submit" class="btn btn-outline-secondary submit_button">Post mode</button>
                    </div>
                </div>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>
    </section>


@endsection
