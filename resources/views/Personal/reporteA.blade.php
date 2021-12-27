@extends('layouts.plantilla')

@section('title')
    Reporte de Asistencia
@endsection
@section('action')
    <a href="{{ route('reporte.asistencia') }}" class="hover:underline ">Reporte de asistencia </a>
@endsection

@section('content')

    @livewire('personal.reporte-asistencia.show-reporte')

@endsection
