@extends('layouts.plantilla')

@section('title')
    Inventario
@endsection
@section('action')
    <a href="{{ route('equipo') }}" class="hover:underline ">Inventario</a>
@endsection

@section('content')

    @livewire('area-comun.area-comun.lw-area-comun')
@endsection
