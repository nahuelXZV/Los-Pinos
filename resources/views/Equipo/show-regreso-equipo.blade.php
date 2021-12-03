@extends('layouts.plantilla')

@section('title')
    Regreso de Equipos
@endsection
@section('action')
    <a href="{{ route('regresosEquipo') }}" class="hover:underline "> Regreso de Equipos</a>&nbsp/&nbsp
    <a href="{{ route('regresosEquipos.show', $regreso->id) }}" class="hover:underline "> Detalles de regresos</a>
@endsection

@section('content')
    @livewire('equipo.show-regreso',['regreso' => $regreso])
@endsection
