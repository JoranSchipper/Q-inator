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

			<p>
				<img src="{{ $track->album->images[1]->url }}" alt="">
			</p>

			{{ $track->name }}

			<span>By <strong><a href=" {{ url('/artist/' . $track->artists[0]->id) }} " class="">{{ $track->artists[0]->name }}</a></strong></span>
		</div>
	</div>
</div>
</body>
</html>
