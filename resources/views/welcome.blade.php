<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">

    </head>
    <body>
        <div class="flex-center position-ref overlay full-height">
            <div class="content">
                <div class="title m-b-md">
                    Q-inator
                </div>

                <div class="links">
                    <a href=" {{ url('/spotify/authorization/') }} " class="position-ref">Get Started</a>
                </div>
            </div>
        </div>
    </body>
</html>
