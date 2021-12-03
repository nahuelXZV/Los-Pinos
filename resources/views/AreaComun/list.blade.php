@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    <a href="{{ route('reserva.list') }}" class="hover:underline ">Lista de reservas</a>
@endsection

@section('content')
    @livewire('area-comun.reserva.lw-reserva')
@endsection
