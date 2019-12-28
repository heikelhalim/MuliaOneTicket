<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Mulia One">
		<meta name="author" content="mindit">
		<link rel="shortcut icon" href="{{{ asset('public/favicon-16x16.png') }}}">
		<title>Mulia One Sdn bhd</title>
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
            }
            .forms {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .forms input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            }
            .forms button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
            }
            .forms button:hover,.form button:active,.form button:focus {
            background: #43A047;
            }
            .forms .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
            }
            .forms .message a {
            color: #4CAF50;
            text-decoration: none;
            }
            .forms .register-form {
            display: none;
            }
            .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
            }
            .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
            }
            .container .info {
            margin: 50px auto;
            text-align: center;
            }
            .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
            }
            .container .info span {
            color: #4d4d4d;
            font-size: 12px;
            }
            .container .info span a {
            color: #000000;
            text-decoration: none;
            }
            .container .info span .fa {
            color: #EF3B3A;
            }
            body {
            background: #76b852; /* fallback for old browsers */
            background: -webkit-linear-gradient(right, #76b852, #8DC26F);
            background: -moz-linear-gradient(right, #76b852, #8DC26F);
            background: -o-linear-gradient(right, #76b852, #8DC26F);
            background: linear-gradient(to left, #76b852, #8DC26F);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;      
            }







            html, body {
                background-image: url('public/images/2.jpeg');
                background-size: 100%;
                color: #05a9fb;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #f7c508;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .version {
                font-size: 0.4em;
                position: absolute;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <!--
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    
                    <br>
                    <img src="{{ asset('/muliaonelogo.jpg') }}"  width="180" height="180" > <br>
                    <strong>{{ config('app.name') }}</strong>
                    {{-- This is not nice --}}
                    {{-- However probably the first you'll do after install, --}}
                    {{-- is to delete this file, so who cares? --}}
                    <?php
                        $packages = collect(json_decode(file_get_contents(base_path('composer.lock')))->packages);
                    ?> 
                    <!-- <span class="version">
                        {{
                            substr($packages->where('name', 'kordy/ticketit')->first()->version, 1)
                        }}
                    </span> -->
                </div>
                <!-- <div class="subtitle m-b-md">
                    Powered by Laravel
                    {{
                        substr($packages->where('name', 'laravel/framework')->first()->version, 1)
                    }}
                </div> -->
                

                <!--
                <div class="links">
                    <a href="">Open A New Ticket</a>                    
                </div>
                -->
                <div class="forms">
                        <form method="POST" action="{{ route('login') }}">
                        <!--
                            <input type="text" placeholder="username"/>
                            <input type="password" placeholder="password"/>
                        -->
                        @csrf

                            <input id="email" placeholder="username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <button>login</button>
                        <!--
                        <p class="message">Not registered? <a href="#">Create an account</a></p>
                        -->
                    </form>
                </div>

                <footer>
                    <div class="container text-center">
                        <p>© 2018 <a href="https://aexis.com.my"></a> Mulia One Sdn Bhd. All Rights Reserved</p>
                    </div>
        		</footer>
            </div>
        </div>
    </body>
</html>
