@if(Theme::getArea()==false)
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">Dashboard</li>
@foreach(\Auth::User()->areas as $area)
<li class=" {{ $area->active?'active':'' }}"> 
<a href="{{ $area->url }}" class="" title="{{ $area->area_define_name}}">
	{{--  
	<i class='fa fa-cubes'></i>
	--}}
	<img src="{{ asset($area->icon_src) }}" width="32" />
	{{ $area->area_define_name}}
</a>
</li>
@endforeach
</ul>
@endif
{{--
<a href="#" class="btn" title="Dashboard"><i class='fa fa-cubes'></i></a>
<a href="#"><i class='fa fa-male'></i></a>
<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">Menu</li>
	<li><a href='/admin'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
	<li><a href="#"><i class='fa fa-cubes'></i> <span>Extend</span></a></li>
	<li><a href="#"><i class='fa fa-male'></i> <span>Xra</span></a></li>
	<li><a href="#"><i class='fa fa-edit'></i> <span>Blog</span></a></li>            
	<li class="treeview">
		<a href="#1568" class="vis3 "><i class="fa fa-users"></i>Users
		 <i class="fa fa-angle-left pull-right"></i> </a>
		<ul class="treeview-menu">
								<li><a href="/admin/lu/user?lang=it">Lista Utenti</a></li>
								<li><a href="/admin/lu/right?lang=it">Lista Diritti</a></li>
								<li><a href="/admin/lu/group?lang=it">Lista Gruppi</a></li>
								<li><a href="/admin/lu/area?lang=it">Lista Aree</a></li>
							</ul>
					</li>
	
	<li><a href="#"><i class="fa fa-cutlery"></i> <span>Food</span></a></li>
	<li><a href="#"><i class='fa fa-search'></i> <span>Seo</span></a></li>
	<li><a href="#"><i class='fa fa-globe'></i> <span>Geo</span></a></li>
	<li><a href="#"><i class="fa fa-refresh"></i> <span>Import</span></a></li>
	<li><a href="#"><i class='fa fa-wrench'></i> <span>Impostazioni</span></a></li>     
</ul><!-- /.sidebar-menu -->
--}}