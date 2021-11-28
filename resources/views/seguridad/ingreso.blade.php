@extends('layouts.plantilla')

@section('title')
    Ingresos
@endsection
@section('action')
    Ingresos de la Urbanización
@endsection

@section('content')
    @livewire('seguridad.ingreso.lw-ingreso')
@endsection
