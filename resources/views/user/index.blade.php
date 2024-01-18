<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dealclinchers Realtors Limited</title>

        <link href="{{ asset('/img/logo.png') }}" rel="icon" type="image/png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link href="{{asset('/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{asset('/dashboard/css/custom.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                font-weight: 500;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="bg-gradient-light sidebar-toggled">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" style="width:150px;"></a>
                <div class="title m-b-md">
                    Deal Clinchers Network Portal
                </div>

                <div>
                    <a href="{{ url('/sign-up') }}"><button type="button" class="btn btn-info">Sign Up</button></a>
                    &nbsp;
                    <a href="{{ url('/home') }}"><button type="button" class="btn btn-info">Login</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
