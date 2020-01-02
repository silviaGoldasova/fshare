<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
    <style>
        .homepage_body{
            background-image: url("{{asset('src/images/im_darker.jpg')}}");
        }
    </style>
</head>

<body class="homepage_body">
    @include ('includes.header')

    <div class="homepage_container rounded-pill col-md-4">
        <div>
            <p><h1>Food Sharing</h1></p>
        </div>
    </div>

</body>
</html>


