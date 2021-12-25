@extends('layouts.plantilla')

@section('title')
    Salidas
@endsection
@section('action')
    <a href="{{ route('salidas') }}" class="hover:underline ">Salidas de la Urbanización </a>
@endsection

@section('content')
    @livewire('seguridad.salida.lw-salida')
@endsection
