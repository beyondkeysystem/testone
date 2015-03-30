<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ $title or "Doručuji" }}</title>

	<link href="{{ elixir('css/all.css') }}" rel="stylesheet">
	<link href="https://fontastic.s3.amazonaws.com/4MppbU9Xy22dySFmq2FzRk/icons.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="{{ $bodyClasses or "" }}">

	@yield('content')

	<script src="{{ elixir('js/all.js') }}"></script>

</body>
</html>
