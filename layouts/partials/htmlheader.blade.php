<head>
	<meta charset="utf-8"/>
	<title>@yield('page_heading')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	{{--
	<link rel="stylesheet" href="{{ asset("/theme/css/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("/theme/css/xot.css") }}" />
	{{ Theme::addScript('/theme/bc/bootstrap/dist/css/bootstrap.css') }}
	--}}
	{{-- Theme::addStyle("/theme/bc/metisMenu/dist/metisMenu.min.css") --}}
	{{--  
    {{ Theme::addStyle("/theme/bc/angular-loading-bar/build/loading-bar.min.css") }}
    {{ Theme::addStyle("/theme/bc/font-awesome/css/font-awesome.min.css") }}
	{{ Theme::addStyle('/theme/css/styles.css') }}
	--}}
	<!-- Bootstrap Core CSS -->

	{{-- Theme::add("/theme/bc/tether/dist/css/tether.min.css") --}}

    {{ Theme::add("/theme/bc/bootstrap/dist/css/bootstrap.min.css") }}

    <!-- MetisMenu CSS -->
    {{ Theme::addStyle("/theme/bc/metisMenu/dist/metisMenu.min.css",2) }}

    <!-- Custom CSS -->
    {{ Theme::addStyle("/theme/bc/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css",3)  }}

    <!-- Custom Fonts -->
    {{ Theme::addStyle("/theme/bc/font-awesome/css/font-awesome.min.css",4) }}


	
	{{ Theme::add('/theme/css/xot.css') }}
	{!! Theme::showStyles(false) !!}
	@stack('styles')
</head>