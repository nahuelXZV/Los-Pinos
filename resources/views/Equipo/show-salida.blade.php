@extends('layouts.plantilla')

@section('title')
    Salida de Equipos
@endsection
@section('action')
    <a href="{{ route('salidasEquipo') }}" class="hover:underline "> Salida de Equipos</a>&nbsp/&nbsp
    <a href="{{ route('salidasEquipos.show', $salida->id) }}" class="hover:underline "> Detalles de salidas</a>
@endsection

@section('content')
    @livewire('equipo.salida.show-salidas',['salida' => $salida])
@endsection
