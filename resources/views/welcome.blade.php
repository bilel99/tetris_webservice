<!DOCTYPE html>
<html>
    <head>
        <title>API Tetris Webservice</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .title {
                position: absolute;
                margin-left: 33%;
                margin-top: 15%;
                font-size: 96px;
                margin-bottom: 40px;
                text-decoration: none;
                color: #B0BEC5;
            }

            a{
                text-decoration:none;
                color:#B0BEC5;
            }
            a:hover{
                color:#B0BEC5;
            }

            .fd{
                position: absolute;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
    <img class="fd" alt="Tetris API" src="{{ asset('img/tetris.jpg') }}">
        <div class="container">
            <div class="content">
                <div class="title"><a href="{{route('api_users')}}">Tetris API</a></div>
            </div>
        </div>
    </body>
</html>
