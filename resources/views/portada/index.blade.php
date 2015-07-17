<html>
    <head>
        <title>Sportime</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

                <div class="title">{{ trans('messages.welcome') }}</div>

                    <div class="quote"><a href="{{ url('/auth/login') }}">{{ trans('messages.login')  }}</a></div>

                <a href="{{ url('/lang/es')}}">
                    <img height="65px" width="65px" src="/img/es.png">
                </a>

                <a href="{{ url('/lang/it')}}">
                    <img height="70px" width="70px" src="img/it.png">
                </a>
                <a href="{{ url('/lang/en')}}">
                    <img height="65px" width="65px" src="img/en.png">
                </a>



            </div>
        </div>
    </body>
</html>
