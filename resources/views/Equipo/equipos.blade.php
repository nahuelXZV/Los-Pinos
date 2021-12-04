@extends('layouts.plantilla')

@section('title')
    Inventario
@endsection
@section('action')
    <a href="{{ route('equipos') }}" class="hover:underline ">Inventario</a>
@endsection

@section('content')

    @livewire('equipo.inventario.show-equipos')

@endsection
