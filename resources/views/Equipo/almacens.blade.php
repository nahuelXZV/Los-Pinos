@extends('layouts.plantilla')

@section('title')
    Almacenes
@endsection
@section('action')
    <a href="{{ route('almacenes') }}" class="hover:underline ">Almacenes</a>
@endsection

@section('content')

    @livewire('equipo.show-almacens')

@endsection
