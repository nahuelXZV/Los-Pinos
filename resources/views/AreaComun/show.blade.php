@extends('layouts.plantilla')

@section('title')
    Reserva
@endsection
@section('action')
    Informacion de Equipos Regresados
@endsection

@section('content')
    @livewire('area-comun.lw-show-reserva',['reserva' => $reserva])
@endsection
