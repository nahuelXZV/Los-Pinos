@extends('layouts.plantilla')

@section('title')
    Salidas
@endsection
@section('action')
    <a href="{{ route('salidas') }}" class="hover:underline ">Salidas de la Urbanización </a> &nbsp/&nbsp
    <a href="{{ route('salidas.show', $salida->id) }}" class="hover:underline ">Detalles de salida</a>

@endsection

@section('content')
    @livewire('seguridad.salida.lw-show-salida',['salida'=> $salida])
@endsection
