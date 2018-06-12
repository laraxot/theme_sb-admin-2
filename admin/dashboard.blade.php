@extends('adm_theme::layouts.app')
@section('page_heading','DashBoard')

@section('content')
    @foreach(\Auth::User()->areas as $area)
        {!! $area->dashboard_widget() !!}
    @endforeach
@endsection
