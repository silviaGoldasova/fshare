<!--
contact blade file
= view for the page showing seller's email
-->

@extends('layouts/prototype')

@section('content')
    @include('includes.message-block')

    <section class="row h-100">
        <div class="col-sm-12">
            <header class="col-sm-4 offset-4 page_heading"><h3>Contact the Seller {{$offer->user->name}}</h3></header>
            <p class="col-sm-4 offset-4 page_subheading">about the offer: </p>
        </div>
    </section>

    <section class="row offers" id="section_seller">
        <div class="col-md-6 offset-3">
            <article class="offer" data-offer_id="{{$offer->id}}">
                <div class="card">
                    <h5 class="card-header card_section">Neighbour {{$offer->user->name}} is offering {{$offer->commodity}}.</h5>
                    <div class="card-body">
                        <p card-text>{{$offer->body}}</p>
                        <div class="info">
                            Posted by {{$offer->user->name}} on {{$offer->created_at}}
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="row" id="section_seller">
        <div class="col-md-6 offset-3 font-italic">
            <h5 class="card-header seller_email_card">You can reach {{$offer->user->name}} at the email address: {{$offer->user->email}}.</h5>
        </div>
    </section>




@endsection
