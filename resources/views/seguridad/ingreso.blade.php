@extends('layouts.plantilla')

@section('title')
    Ingresos
@endsection
@section('action')
    <a href="{{ route('ingresos') }}" class="hover:underline ">Ingresos de la Urbanización </a>
@endsection

@section('content')
    @livewire('seguridad.ingreso.lw-ingreso')
@endsection
