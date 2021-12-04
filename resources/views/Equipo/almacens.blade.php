@extends('layouts.plantilla')

@section('title')
    Almacenes
@endsection
@section('action')
    <a href="{{ route('almacenes') }}" class="hover:underline ">Almacenes</a>
@endsection

@section('content')

<<<<<<< HEAD
@livewire('equipo.almacen.show-almacens')
=======
    @livewire('equipo.show-almacens')
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2

@endsection
