@extends('adm_theme::layouts.app')
@section('content')


@foreach(Auth::User()->areas as $area)
	<br/><a href="{{ $area->url }}">{{ $area->area_define_name }}</a>
@endforeach

@endsection
