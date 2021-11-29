@extends('layouts.plantilla')

@section('title')
    Salida de Equipos
@endsection
@section('action')
    Información de la Salida
@endsection

@section('content')
    @livewire('equipo.show-salidas',['salida' => $salida])
@endsection
