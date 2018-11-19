@if(Theme::getArea()==false)
<ul class="nav" data-widget="tree">
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