@extends('layouts.plantilla')

@section('title')
    Regreso de Equipos
@endsection
@section('action')
    <a href="{{ route('regresosEquipo') }}" class="hover:underline "> Regreso de Equipos</a>
@endsection

@section('content')

<<<<<<< HEAD
@livewire('equipo.regreso.show-regreso-equipos')
=======
    @livewire('equipo.show-regreso-equipos')
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2

@endsection
