@extends('layouts.plantilla')

@section('title')
    Personal
@endsection
@section('action')
    <a href="{{ route('reporte.asistencia') }}" class="hover:underline ">Reporte de asistencia </a>
@endsection

@section('content')

    @livewire('personal.reporte-asistencia.show-reporte')

@endsection
