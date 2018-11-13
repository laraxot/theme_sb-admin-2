@extends ('adm_theme::layouts.plane')
@section ('body')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
            @section ('login_panel_title','Please Sign In')
            @section ('login_panel_body')

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
            {!!Form::open(['url'=>'/login','class'=>'form form-horizontal'])!!}
            <fieldset>
                <div class="form-group">
                    <label class="control-label">Ente</label>
                    <input class="form-control" placeholder="Ente" name="ente" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Matricola</label>
                    <input class="form-control" placeholder="matricola" name="matr" type="text" autofocus>
                </div>
                {{--
                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                </div>
                --}}
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                {!!Form::submit('Login',['class'=>'btn btn-lg btn-success btn-block'])!!}
                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                Ridammi la Password !
                </a>
            </fieldset>
            {!!Form::close()!!}
            @endsection
            @include('adm_theme::widgets.panel', array('as'=>'login', 'header'=>true))
        </div>
    </div>
</div>
@stop