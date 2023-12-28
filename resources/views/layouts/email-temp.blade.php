<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="x-apple-disable-message-reformatting">

        <title></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #222;
                font-family: 'Poppins', sans-serif;
                font-weight: 200;
                height: 100% !important;
                width: 90% !important;
                margin: 0 auto !important;
            }
            a{ color: #3490DC;}
            #container{
                text-align: center;

            }
            .header, .footer{
                background-color: #333;
                color: #eee;
                padding: 20px 10px;
                font-size: 12px;
            }
            .content{
                font-size: 14px;
                padding: 50px 20px;
                background-color: #fcfcfc;
            }
            strong{
                font-weight: 500;
            }
            .footer a{
                color:#fafafa;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div class="header" style="background-color: #ddd;">
                <img src="{{ asset('/img/logo.png') }}" alt="Dealclinchers" width="120">
            </div>
            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                <p>© {{ date('Y') }} Dealclinchers Realtors Limited. All rights reserved.</p>
                <p><strong>Email:</strong> <a href="mailto:info@curvesandcurvatures.com">info@dealclinchersltd.com</a></p>
            </div>
        </div>
    </body>
</html>
