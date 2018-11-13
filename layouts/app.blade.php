@include('backend::includes.components')  
@extends('adm_theme::layouts.plane')
@section('body')
 <div id="wrapper">
        @include('adm_theme::layouts.partials.headernav')
        

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
           <div id="div_debug"></div>
			<div class="row">
				@yield('section')
				@yield('content')
            </div>
            <!-- /#page-wrapper -->
        </div>
		@include('pub_theme::layouts.partials.footer')
    </div>
@stop

