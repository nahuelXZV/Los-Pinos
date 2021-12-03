@extends('layouts.plantilla')

@section('title')
    Reserva
@endsection
@section('action')
    Información de reservas
@endsection

@section('content')
    @livewire('area-comun.reserva.lw-show-reserva',['reserva' => $reserva])
@endsection
