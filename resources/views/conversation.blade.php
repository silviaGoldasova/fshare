@extends('layouts/prototype')

@section('content')
    @include('includes.message-block')


    <section class="row h-100">
        <div class="col-sm-12">
            <header class="col-sm-4 offset-4 page_heading"><h3>Your Conversation</h3></header>
            <p class="col-sm-4 offset-4 page_subheading">with user {{$offer->user->name}}</p>
            <p class="col-sm-4 offset-4 page_subheading">about offer:</p>
        </div>
    </section>

    <article class="offer" data-offer_id="{{$offer->id}}">
        <div class="card">
            <h5 class="card-header">Neighbour {{$offer->user->name}} is offering {{$offer->commodity}}.</h5>
            <div class="card-body">
                <p card-text>{{$offer->body}}</p>
                <div class="info">
                    Posted by {{$offer->user->name}} on {{$offer->created_at}}
                </div>
            </div>
        </div>
    </article>


    @foreach($me)

    @endforeach




@endsection
