<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebScope TODO List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
        <style>
            html, body {
                background: #e96443;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #904e95, #e96443);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #904e95, #e96443); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .content {
                text-align: center;
                width: 80%;
                height: 80vh;
                background-color: #fff;
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .links > a {
                width: 160px;
                color: #636b6f;
                font-weight: 300;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 100px;
                margin-top: 10%;
                font-size: 84px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="m-b-md">
                    Webscope TODO List
                </div>
                <div class="links">
                    <a href="{{ route('login') }}" class="button is-large is-info">Login</a>
                    <a href="{{ route('register') }}" class="button is-large is-outlined">Register</a>
                </div>
            </div>
        </div>
    </body>
</html>
