@extends('layouts/prototype')

@section('content')
    @include('includes.message-block')


    <section class="row h-100">
        <div class="col-sm-12">
            <header class="col-sm-4 offset-4 page_heading"><h3>My profile</h3></header>
            <p class="col-sm-4 offset-4 page_subheading">user {{Auth::user()->name}}</p>
        </div>
    </section>


    <section class="row">
        <div class="col-md-6 offset-3">
            <header><h3>Go to:</h3></header>
            <div class="list-group">
                <a href="#saved_offers_header" class="list-group-item list-group-item-action">Saved Offers</a>
                <a href="#my_offers_header" class="list-group-item list-group-item-action">My Offers</a>
                <a href="#my_conversations_header" class="list-group-item list-group-item-action">My conversations</a>
            </div>
        </div>
    </section>

    <section class="row offers">
        <div class="col-md-6 offset-3">
            <header class="offers-header" id="saved_offers_header"><h3>Saved offers</h3></header>
            @foreach($saved_offers as $offer)
                <article class="offer" data-offer_id="{{$offer->id}}">
                    <div class="card">
                        <h5 class="card-header">Neighbour {{$offer->user->name}} is offering {{$offer->commodity}}.</h5>
                        <div class="card-body">
                            <p card-text>{{$offer->body}}</p>
                            <div class="info">
                                Posted by {{$offer->user->name}} on {{$offer->created_at}}, <div id="{{$offer->id}}"> {{$offer->num_of_interested }}  {{ $offer->num_of_interested == 1 ? "person is" : "people are" }} interested in the offer </div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction">
                        <a type="button" data-offer_id="{{$offer->id}}" data-user_id="{{Auth::user()->id}}" class="interest_button btn btn-outline-secondary">Show Interest</a>
                        <a type="button" data-offer_id="{{$offer->id}}" data-user_id="{{Auth::user()->id}}" class="saved_button btn btn-outline-secondary">Save For Later</a>
                        <a type="button" class="btn btn-outline-secondary" href="#">Contact The Owner</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="row offers">
        <div class="col-md-6 offset-3">
            <header class="offers-header" id="my_offers_header"><h3>My offers</h3></header>
            @foreach($my_offers as $offer)
                <article class="offer" data-offer_id="{{$offer->id}}">
                    <div class="card">
                        <h5 class="card-header">Neighbour {{$offer->user->name}} is offering {{$offer->commodity}}.</h5>
                        <div class="card-body">
                            <p card-text>{{$offer->body}}</p>
                            <div class="info">
                                Posted by {{$offer->user->name}} on {{$offer->created_at}}, <div id="{{$offer->id}}"> {{$offer->num_of_interested }}  {{ $offer->num_of_interested == 1 ? "person is" : "people are" }} interested in the offer </div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction">
                        <a type="button" class="btn btn-outline-secondary edit" data-offer_id="{{$offer->id}}" data-offer_body="{{$offer->body}}" href="#edit-offer">Edit</a>
                        <a type="button" class="btn btn-outline-secondary" href="{{ route('offer.delete', ['offer_id' => $offer->id]) }}">Delete</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="row">
        <div class="col-md-6 offset-3">
            <header class="offers-header" id="my_conversations_header"><h3>My conversations</h3></header>
            <!-- for each conversation foreach($saved_offers as $offer)
        <article> -->
            <div class="card">
                <h5 class="card-header">Header</h5>
                <div class="card-body">
                    <p card-text></p>
                    <a href="#" class="to_conversation">-> Go to the conversation</a>
                </div>
            </div>

        </div>
    </section>


    <!-- Edit Modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Offer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="offer-edit-body">Edit the Offer</label>
                            <textarea class="form-control" name="offer-edit-body" id="offer-edit-body" autofocus rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlInterestLoad = '{{ route('interest.load') }}';
        var urlInterestUpdate = '{{ route('interest.update') }}';
        var urlSavedLoad = '{{ route('saved.load') }}';
        var urlSavedUpdate = '{{ route('saved.update') }}';
    </script>

@endsection


