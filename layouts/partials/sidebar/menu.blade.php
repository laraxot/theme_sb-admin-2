 <ul class="nav" id="side-menu">
	@php
    	$menus=Theme::getXmlMenu();
	@endphp
    @if(isset($menus[0]))
        @foreach($menus[0] as $el)
            <li @if($el->active) class="active" @endif>
                <a href="#{{$el->id}}" class="vis{{$el->visibility}} "><i class=" fa-fw"></i>{{$el->nome}}
                @if(isset($menus[$el->id])) <span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    @foreach($menus[$el->id] as $sub_el)
                    <li @if($sub_el->active) class="active" @endif><a href="{{$sub_el->url}}">{{$sub_el->nome}}  </a></li>
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach
    @endif
</ul>