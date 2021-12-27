@extends('layouts.plantilla')

@section('title')
    Reporte de Trabajo
@endsection
@section('action')
    <a href="{{ route('reporte.trabajo') }}" class="hover:underline ">Reporte de trabajo </a>
@endsection

@section('content')

    @livewire('personal.reporte-trabajo.show-reporte')

@endsection
