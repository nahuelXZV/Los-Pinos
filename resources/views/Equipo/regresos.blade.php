@extends('layouts.plantilla')

@section('title')
    Regreso de Equipos
@endsection
@section('action')
    <a href="{{ route('regresosEquipo') }}" class="hover:underline "> Regreso de Equipos</a>
@endsection

@section('content')

    @livewire('equipo.regreso.show-regreso-equipos')

@endsection
