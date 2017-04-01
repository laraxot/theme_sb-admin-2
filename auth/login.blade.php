@extends('adm_theme::layouts.app')

@section('content')
<div class="container">
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
            @section ('login_panel_title','Please Sign In')
            @section ('login_panel_body')

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
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
                    <label class="control-label">Username/Email</label>
                    <input class="form-control" placeholder="Username/Email" name="user_email" type="text" value="{!! old('user_email') !!}" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                    <input name="remember" type="checkbox" value="Remember Me" @if(old('remember')) checked @endif>Remember Me
                    </label>
                    <label style="float: right;">
                        <a href="{{route('password.request', csrf_token())}}">Forgot your password?</a>
                    </label>
=======
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
>>>>>>> d850bae32f2a79f6fc9cfd64028e0f03f67ad823
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
