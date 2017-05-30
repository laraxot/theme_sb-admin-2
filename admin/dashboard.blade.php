@extends('adm_theme::layouts.app')
@section('page_heading','DashBoard')

@section('content')
    <div>
        @foreach(\Auth::User()->areas()->get() as $row)
            <div class="col-lg-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <small>{{$row->area_define_name}}</small>
                    </div>
                    <div class="panel-body" style="text-align:center;">
                        <a href="{{ $row->a_href() }}">
                            <img src="{{$row->controller_path}}/menu/icon.png" style="width:50px;height:50px;"/>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
