@if (\Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
    {{--<li><a href="{{ url('/register') }}">Register</a></li> --}}
@else
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-user fa-fw"></i>   {{ Auth::user()->name() }} <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="{{ url('/admin/profile/'.Auth::user()->auth_user_id) }}"><i class="fa fa-user fa-fw"></i> {{ trans('adm_theme::message.profile') }}</a></li>
        {{--  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li> --}}
        <li class="divider"></li>
        {{--  
        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        --}}
        <li>
        <a href="{{ url('/logout') }}" 
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out fa-fw"></i> Logout
        </a>
         <form id="logout-form" 
                action="{{ url('/logout') }}" 
            method="POST" 
            style="display: none;">
                        {{ csrf_field() }}
          </form>
        </li>

    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
@endif