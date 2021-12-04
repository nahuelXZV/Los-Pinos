@extends('layouts.plantilla')

@section('title')
    Inventario
@endsection
@section('action')
    Inventario
@endsection

@section('content')

@livewire('equipo.inventario.show-equipos')

@endsection
