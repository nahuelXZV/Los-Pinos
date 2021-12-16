@extends('layouts.plantilla')

@section('title')
    Detalles del Reporte de Asistencia
@endsection
@section('action')
    <a href="{{ route('reporte.asistencia') }}" class="hover:underline "> Reporte de Asistencia</a>&nbsp/&nbsp
    <a href="{{ route('reporteAsistencia.show', $reporte->id) }}" class="hover:underline "> Detalles de reporte</a>
@endsection

@section('content')
    @livewire('personal.reporte-asistencia.show-permisos',['reporte' => $reporte])
@endsection
