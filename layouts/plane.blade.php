<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
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
    {{ Theme::addStyle("/theme/bc/bootstrap/dist/css/bootstrap.min.css") }}

    <!-- MetisMenu CSS -->
    {{ Theme::addStyle("/theme/bc/metisMenu/dist/metisMenu.min.css") }}

    <!-- Custom CSS -->
    {{ Theme::addStyle("/theme/bc/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css")  }}

    <!-- Custom Fonts -->
    {{ Theme::addStyle("/theme/bc/font-awesome/css/font-awesome.min.css") }}


	
	{{ Theme::addStyle('/theme/css/xot.css') }}
	{!! Theme::showStyles(false) !!}
	@stack('styles')
</head>
<body>
	@yield('body')
	{{--  
	<script src="{{ asset("/theme/js/frontend.js") }}" type="text/javascript"></script>
	--}}
	<script>
	base_url="{{ url('/')  }}";
	</script>
	
	{{-- Theme::addScript('/theme/js/frontend.js') --}}
	

	{{ Theme::addScript("/theme/bc/jquery/dist/jquery.min.js") }}

    {{ Theme::addScript("/theme/bc/bootstrap/dist/js/bootstrap.min.js") }}
    {{ Theme::addScript("/theme/bc/metisMenu/dist/metisMenu.min.js") }}

  
    <!-- Custom Theme JavaScript -->
    {{ Theme::addScript("/theme/bc/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js")  }}

	{{ Theme::addScript('/theme/js/xot.js') }}

	{!! Theme::showScripts(false) !!}
	@stack('scripts')
</body>
</html>