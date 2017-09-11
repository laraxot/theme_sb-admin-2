@extends('adm_theme::layouts.app')
@section('page_heading','DashBoard')

@section('content')
    <div>
        @php
            //$rows=\Auth::User()->areas();

            //dd($rows->with(['area'])->get());
            //dd($rows);
            //echo '<pre>';print_r($rows->toSql());echo '</pre>';
            //echo '<pre>';print_r($rows->get()->toArray());echo '</pre>';
            //dd();
        @endphp  
        @foreach(\Auth::User()->areas as $row)
            @php
                //echo '<pre>';print_r($row->Area->first());echo '</pre>';
            @endphp
            <div class="col-lg-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <small>{{ $row->area_define_name }}</small>
                    </div>
                    <div class="panel-body" style="text-align:center;">
                        <a href="{{ $row->a_href() }}">
                            <img src="{{ $row->icon_src() }}" style="width:50px;height:50px;"/>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
