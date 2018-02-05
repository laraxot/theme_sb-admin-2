@extends('adm_theme::layouts.app')
@section('page_heading','DashBoard')

@section('content')
@php
    //dd(Auth::User()->areaAdminAreas);
@endphp


    <div>
        @foreach(\Auth::User()->areas as $row)
            <div class="col-lg-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <small>{{ $row->area_define_name }}</small>
                    </div>
                    <div class="panel-body" style="text-align:center;">
                        <a href="{{ $row->url }}">
                            <img src="{{ $row->icon_src }}" style="width:50px;height:50px;"/>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
