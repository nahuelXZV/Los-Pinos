@extends('layouts.plantilla')

@section('title')
    Viviendas
@endsection
@section('action')
    <a href="{{ route('viviendas') }}" class="hover:underline ">Viviendas </a>
@endsection

@section('content')
    @livewire('seguridad.vivienda.lw-vivienda')
@endsection
