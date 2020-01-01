@extends('layouts/prototype')

@section('content')
    @include('includes.message-block')
    <section class="row new-offer">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Add a new offer.</h3></header>
            <form action="{{route('offer.create')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-offer" rows="5" placeholder="Your offer"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post offer</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>
    </section>

    <section class="row offers">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Neighbours' offers</h3></header>

            @foreach($offers as $offer)
                <article class="offer">
                    <p>
                        {{$offer->body}}
                    </p>
                    <div class="info">
                        Posted by {{$offer->user->name}} on {{$offer->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#">Show Interest</a>
                        <a href="#">Save For Later</a>
                        <a href="#">Contact The Owner</a>
                        @if(Auth::user() == $offer->user)
                            <a href="#">Edit</a>
                            <a href="{{ route('offer.delete', ['offer_id' => $offer->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Offer</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection


