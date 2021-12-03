@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    Lista de reservas
@endsection

@section('content')
    @livewire('area-comun.reserva.lw-reserva')
@endsection
