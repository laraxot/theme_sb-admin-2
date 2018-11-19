<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
        {{-- campo search .. piu' avanti
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>  
        --}}
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
    </div>
    <!-- /.sidebar-collapse -->
</div>

