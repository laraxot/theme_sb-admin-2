 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('#') }}">@yield('page_heading')</a>
                <a class="navbar-brand" href="{{ url ('/admin') }}"><small>backend</small></a>
                <a class="navbar-brand" href="{{ url ('/') }}" target="_blank"><small>frontend</small></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                {{-- messaggi da implementare
                @include('adm_theme::layouts.dropdown-messages')
                tasks
                @include('adm_theme::layouts.dropdown-tasks')
                alerts
                @include('adm_theme::layouts.dropdown-alerts')
                --}}
                @include('adm_theme::layouts.dropdown-user')
            </ul>
            <!-- /.navbar-top-links -->
            @include('adm_theme::layouts.sidebar')
            <!-- /.navbar-static-side -->
        </nav>