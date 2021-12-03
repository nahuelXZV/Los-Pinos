@extends('layouts.plantilla')

@section('title')
    Usuarios
@endsection
@section('action')
    <a href="{{ route('usuarios') }}" class="hover:underline ">Usuarios</a>

@endsection

@section('content')

    @livewire('sistema.usuario')

@endsection
