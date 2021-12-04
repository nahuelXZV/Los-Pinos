@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection
@section('action')
    <a href="{{ route('inicio') }}" class="hover:underline ">Los Pinos</a>
@endsection

@section('content')
    @livewire('inicio.dashboard')
@endsection
