<<<<<<< HEAD
@extends('adm_theme::layouts.app')
@section('content')


@foreach(Auth::User()->Areas()->get() as $area)
	<br/><a href="{{ $area->url() }}">{{ $area->area_define_name }}</a>
@endforeach

@endsection
=======
welcome !
>>>>>>> 3f0a51e1be8370f7d35ce98fd39108fa6144e867
