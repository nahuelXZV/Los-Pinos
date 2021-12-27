@extends('layouts.plantilla')

@section('title')
    Reserva
@endsection
@section('action')
    <a href="{{ route('reserva.list') }}" class="hover:underline ">Lista de reservas</a> &nbsp/&nbsp
    <a href="{{ route('reserva.show', $reserva->id) }}" class="hover:underline ">Detalles de reserva</a>
@endsection

@section('content')

    @livewire('area-comun.reservas.lw-show-reservas', ['reserva' => $reserva])

@endsection
