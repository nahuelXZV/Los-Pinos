@extends('layouts.plantilla')

@section('title')
    Detalles del Reporte de Trabajo
@endsection
@section('action')
    <a href="{{ route('reporte.trabajo') }}" class="hover:underline "> Reporte de Trabajo</a>&nbsp/&nbsp
    <a href="{{ route('reporteTrabajo.show', $reporte->id) }}" class="hover:underline "> Detalles de reporte</a>
@endsection

@section('content')
    @livewire('personal.reporte-trabajo.show-realizo',['reporte' => $reporte])
@endsection
