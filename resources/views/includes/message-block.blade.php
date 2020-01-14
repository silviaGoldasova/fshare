<!--
message-block blade file
- specifies the errors and notes displayed as a result of the user's actions
-->

@if(count($errors) > 0)
    <div class='row'>
        <div class="col-md-4 offset-4 error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
        <div class='row'>
            @if(Session::has('is_error'))
                <div class="col-md-4 offset-4 error">
                    {{Session::get('message')}}
                </div>
            @else
                <div class="col-md-4 offset-4 success">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>
@endif

