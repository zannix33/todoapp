<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

		@include('partials.navigation.index')
		<header class="bg-white shadow">
		  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			<h1 class="text-3xl font-bold leading-tight text-gray-900">
			  Dashboard
			</h1>
		  </div>
		</header>
		<main>
		  	<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

				<div class="px-4 py-6 sm:px-0">
		  			<div class="border-4 border-dashed border-gray-200 rounded-lg h-auto">
						<div id="app" class="flex items-center justify-start px-4 py-4">
							@yield('content')
						</div>
					</div>
				</div>
				<!-- /End replace -->
	  		</div>
		</main>

</body>
</html>
