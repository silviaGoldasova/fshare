<!--
home blade file
= view for the homepage
- introduces the user to the web app
-->

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @include ('includes.mode_check')
    <style>
        .homepage_body{
            background-image: url("{{asset('src/images/im_darker.jpg')}}");
        }
    </style>
</head>

<body class="homepage_body">
    @include ('includes.header')

    <div class="homepage_container rounded-pill col-md-5">
        <div>
            <p><h1>Food Sharing</h1></p>
        </div>

        <div class="card col-md-12 home_card">
            <div class="card-body">
                <h3 class="card-title">My Goal</h3>
                <p class="card-text">Our planet is being destroyed everyday by the human activity. The least we can do is not to waste the resources that had already cost the nature just too much to get.</p>
                <p class="card-text">Start today to do better and do not waste any more food by leaving it to go inedible. Share any excessive food with your neighbours, and in return, get some back another time.</p>
                <div style="text-align: center">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Sign Up</a>
                    <a href="{{ route('home') }}" class="offset-1 btn btn-outline-secondary">Sign in</a>
                </div>
            </div>
        </div>
    </div>



</body>
</html>


