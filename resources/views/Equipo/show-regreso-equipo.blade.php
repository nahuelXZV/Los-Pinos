@extends('layouts.plantilla')

@section('title')
    Regreso de Equipos
@endsection
@section('action')
    Información del Regreso
@endsection

@section('content')
    @livewire('equipo.regreso.show-regreso',['regreso' => $regreso])
@endsection
