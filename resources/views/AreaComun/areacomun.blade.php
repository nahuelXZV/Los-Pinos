@extends('layouts.plantilla')

@section('title')
    Áreas Comunes
@endsection
@section('action')
   <a href="{{route('areacomun')}}" class="hover:underline ">Áreas Comunes </a> 
@endsection
 
@section('content')
    @livewire('area-comun.area-comun.lw-area-comun')
@endsection
