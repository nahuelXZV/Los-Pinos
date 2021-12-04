@extends('layouts.plantilla')

@section('title')
    Salida de Equipos
@endsection
@section('action')
    <a href="{{ route('salidasEquipo') }}" class="hover:underline "> Salida de Equipos</a>
@endsection

@section('content')

<<<<<<< HEAD
@livewire('equipo.salida.show-salida-equipos')
=======
    @livewire('equipo.show-salida-equipos')
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2

@endsection
