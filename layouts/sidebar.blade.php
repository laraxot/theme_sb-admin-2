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
<?php 
    //$menus=XRA\Extend\Library\XMLMENU_OP::get();
    //$menus=XRA\Extend\Library\ARRAY_OP::array_raggruppa([ 'data'=>$menus,'key'=>['id_padre'] ]);
    $menus=Theme::getXmlMenu();
?>
            @if(isset($menus[0]))
            @foreach($menus[0] as $el)
            <li>
                <a href="#{{$el->id}}" class="vis{{$el->visibility}}"><i class="{{-- $el->icons --}} fa-fw"></i>{{$el->nome}}
                @if(isset($menus[$el->id])) <span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    @foreach($menus[$el->id] as $sub_el)
                    <li><a href="{{$sub_el->url}}">{{$sub_el->nome}}</a></li>
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