@extends('layouts.plantilla')

@section('title')
    Salida de Equipos
@endsection
@section('action')
    <a href="{{ route('salidasEquipo') }}" class="hover:underline "> Salida de Equipos</a>
@endsection

@section('content')

    @livewire('equipo.show-salida-equipos')

@endsection
