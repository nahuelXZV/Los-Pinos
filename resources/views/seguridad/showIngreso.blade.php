@extends('layouts.plantilla')

@section('title')
    Ingresos
@endsection
@section('action')
    <a href="{{ route('ingresos') }}" class="hover:underline ">Ingresos de la Urbanización </a> &nbsp/&nbsp
    <a href="{{ route('ingresos.show', $ingreso->id) }}" class="hover:underline ">Detalles de ingreso</a>

@endsection

@section('content')
    @livewire('seguridad.ingreso.lw-show-ingreso',['ingreso'=> $ingreso])
@endsection
