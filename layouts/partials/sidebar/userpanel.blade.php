{{--  Sidebar user panel (optional) --}}
@if (! Auth::guest())
<div class="user-panel">
	<div class="pull-left image">
		<img src="{{ Auth::user()->gravatar }}" class="img-circle" alt="User Image" />
	</div>
	<div class="pull-left info">
		<p>{{ Auth::user()->name() }}</p>
		<!-- Status -->
		<a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adm_theme::message.online') }}</a>
	</div>
</div>
@endif 