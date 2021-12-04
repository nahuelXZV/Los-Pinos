@extends('layouts.plantilla')

@section('title')
    Inventario
@endsection
@section('action')
    <a href="{{ route('equipos') }}" class="hover:underline ">Inventario</a>
@endsection

@section('content')

<<<<<<< HEAD
@livewire('equipo.inventario.show-equipos')
=======
    @livewire('equipo.show-equipos')
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2

@endsection
