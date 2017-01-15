<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">

    </head>
    <body>
        <div class="flex-center position-ref overlay full-height">
            <div class="content">
                <div class="title m-b-md">
                    Q
                    <sub>-inator</sub>
                </div>
                <a href=" {{ url('/queue') }} " role="button" class="btn btn--proceed">
                    <span class="icon-spotify"></span>
                    Host your own play queue
                </a>
            </div>
        </div>
    </body>
</html>
