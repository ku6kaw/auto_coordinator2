<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Coordinator</title>
    </head>

    <style>
        body 
        {
            background-image: url("/storage/shirt-g46ba60306_1920.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            margin: 200px auto;
        }

        h1
        {
            text-align:center;
        }

        .container
        {
            justify-content: center;
            align-items: center; 
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 30px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 10% / 50%;
        }

        .title
        {
            background: #FFFFFF;
            margin: 20px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 10px;
        }

        .login
        {
            text-align:center;
            background: #FFFFFF;
            max-width: 360px;
            margin: auto;
            padding: auto;
        }
        a
        {
            margin: 15px;
            color: #1a1a1a;
        }
    </style>

    <body>
        <div class="container">
            <div class="title">
                <h1>Auto Coordinator</h1>
            </div>

            <div class="login">
                @auth
                    <a href="{{ url('/dashboard') }}" >Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>  
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </body>
</html>