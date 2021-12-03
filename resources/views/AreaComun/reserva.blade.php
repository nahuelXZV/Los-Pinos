@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    Reserva de Áreas Comunes
@endsection

@section('content')
    <script src="{{ asset('js/reserva.js') }}" defer></script>
    @livewire('area-comun.calendario.lw-reserva-calendario',['areas' => $areas ,'residentes' => $residentes])
    <div id='calendar'></div>
@endsection
