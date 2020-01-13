@if (empty(Session::get('mode')))
    <link rel="stylesheet" media="screen" href="{{URL::to('src/css/main.css')}}">
@elseif ( Session::get('mode') == "light" )
    <link rel="stylesheet" media="screen" href="{{URL::to('src/css/main.css')}}">
@elseif ( Session::get('mode') == "dark" )
    <link rel="stylesheet" media="screen" href="{{URL::to('src/css/dark.css')}}">
@elseif ( Session::get('mode') == "black" )
    <link rel="stylesheet" media="screen" href="{{URL::to('src/css/black.css')}}">
@elseif ( Session::get('mode') == "larger" )
    <link rel="stylesheet" media="screen" href="{{URL::to('src/css/larger.css')}}">
@endif
