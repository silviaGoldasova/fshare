@extends('layouts/prototype')

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

    <section class="row offers">
        <div class="col-md-6 offset-3">
            <header class="offers-header"><h3>Neighbours' offers</h3></header>

            @foreach($offers as $offer)
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
                    <div class="interaction" id="load_interaction_buttons">
                        @if(Auth::user() != $offer->user)
                            <a type="button" class="btn btn-outline-secondary" href="{{ route('contact', ['offer_id' => $offer->id]) }}">Contact The Owner</a>
                        @endif
                        @if(Auth::user() == $offer->user)
                            <a type="button" class="btn btn-outline-secondary" href="{{ route('offer.delete', ['offer_id' => $offer->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <script>
        var token = '{{ Session::token() }}';
    </script>

@endsection


