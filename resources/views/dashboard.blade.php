<!--
dashboard blade file
= view for the page with functions:
    - create an offer
    - show all offers
    - edit an existing own offer
    - show interest
    - save an offer for later
    - contact a seller
    - delete own offer
-->

@extends('layouts/prototype')

@section('head')
    <noscript>
        <meta http-equiv="refresh" content="0; URL='{{route('dashboardWoJS')}}'">
    </noscript>
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row new-offer">
        <div class="col-md-6 offset-3">
            <header><h3>Add a new offer.</h3></header>
            <form action="{{route('offer.create')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-offer" rows="5" placeholder="Your offer"><?php echo htmlspecialchars(Request::old('body'));?></textarea>
                </div>

                <div class="form-inline">
                    <div class="form-group col-md-7">
                        <label for="commodity">Commodity: </label>
                        <input type="text" class="form-control mx-2 col-md-8" name="commodity" id="commodity" placeholder="Commodity Name" value="{{Request::old('commodity')}}">
                    </div>
                    <div class="form-group mx-2">
                        <button type="submit" class="btn btn-outline-secondary submit_button">Post offer</button>
                    </div>
                </div>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>
    </section>

    <section>
        <div class='row bigger_margin' id="wrapper">
            <div class="col-md-3 offset-5">
                <span aria-live="polite">All fields are required.</span>
            </div>
            <div class="col-md-6 error offset-3">
                <span class="row error_js " aria-live="polite"></span>
            </div>
        </div>
    </section>

    <section class="row">
        <div class='col-md-6 offset-3'>
            <header class="offers-header"><h3>Apply a filter to the posted offers</h3></header>
            <form action="{{route('filter.date')}}" method="post">
                <div class="form-group">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-7 col-form-label"><h5>Show offers added after the date: </h5></label>
                        <div class="col-5">
                            <input class="form-control" type="date" value="2020-01-20" id="example-date-input" name="example-date-input" pattern="\d{4}-\d{2}-\d{2}">
                        </div>
                    </div>
                    <div class="interaction row filter" id="load_interaction_buttons">
                        <button type="submit" class="col-md-4 offset-8 btn btn-outline-secondary submit_button">Apply the date filter</button>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </div>
                </div>
            </form>
            <form action="{{route('order.offers.alphabet')}}" method="post">
                <div class="form-group">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-8 col-form-label"><h5>Show offers in the alphabetical order: </h5></label>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </div>
                    <button type="submit" class="col-md-4 offset-8 btn btn-outline-secondary submit_button">Order offers (aphabet)</button>
                </div>
            </form>
            <form action="{{route('order.offers.date')}}" method="post">
                <div class="form-group">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-8 col-form-label"><h5>Show offers according to the date created: </h5></label>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </div>
                    <button type="submit" class="col-md-4 offset-8 btn btn-outline-secondary submit_button">Order offers (date)</button>
                </div>
            </form>
        </div>
    </section>

    <section class="row offers">
        <div class="col-md-6 offset-3">
            <header class="offers-header"><h3>Neighbours' offers</h3></header>

            @foreach($offers as $offer)
                <article class="offer" data-offer_id="{{$offer->id}}">
                    <div class="card">
                        <h5 class="card-header">Neighbour {{$offer->user->name}} is offering {{$offer->commodity}}.</h5>
                        <div class="card-body">
                            <p class="card-text">{{$offer->body}}</p>
                            <div class="info">
                                Posted by {{$offer->user->name}} on {{$offer->created_at}}, <div id="{{$offer->id}}"> {{$offer->num_of_interested }}  {{ $offer->num_of_interested == 1 ? "person is" : "people are" }} interested in the offer </div>
                            </div>
                        </div>
                    </div>
                    <div class="interaction" id="load_interaction_buttons">
                        @if(Auth::user() != $offer->user)
                            <a type="button" data-offer_id="{{$offer->id}}" data-user_id="{{Auth::user()->id}}" class="interest_button btn btn-outline-secondary">Show Interest</a>
                            <a type="button" data-offer_id="{{$offer->id}}" data-user_id="{{Auth::user()->id}}" class="saved_button btn btn-outline-secondary">Save For Later</a>
                            <a type="button" class="btn btn-outline-secondary" href="{{ route('contact', ['offer_id' => $offer->id]) }}">Contact The Owner</a>
                        @endif
                        @if(Auth::user() == $offer->user)
                            <a type="button" class="btn btn-outline-secondary edit" data-offer_id="{{$offer->id}}" data-offer_body="{{$offer->body}}" href="#edit-offer">Edit</a>
                            <a type="button" class="btn btn-outline-secondary" href="{{ route('offer.delete', ['offer_id' => $offer->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
            <section class="row">
                <div class="col-md-12">
                    {{ $offers->links() }}
                </div>
                    * Pagination can be used only if not no filter was used
            </section>
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


