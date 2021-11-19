@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    Lista de reservas
@endsection

@section('content')
    @livewire('area-comun.lw-list-reserva')
@endsection
