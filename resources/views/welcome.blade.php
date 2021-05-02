<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vajra Vastra</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>
        
        <div class="container-fluid text-center heading-custom">
        <img src="/img/vajra.png" alt="logo" width="500" height="500">

            <!-- <a class="btn btn-primary" href="{{ route('register') }}">User Registration</a> -->
            
            
        </div>
        <div class="container-fluid text-center heading-custom">

        <a class="btn btn-primary " href="{{ route('login') }}">Click Here to Login</a>

        </div>

        {{-- js --}}
        <link rel="stylesheet" href="{{ asset('js/app.js') }}">
        <link rel="stylesheet" href="{{ asset('js/style.js') }}">
    </body>
</html>
