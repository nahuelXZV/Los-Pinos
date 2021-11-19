@extends('layouts.plantilla')

@section('title')
    Visitantes
@endsection
@section('action')
    Visitantes
@endsection

@section('content')
    @livewire('seguridad.visitante.lw-visitante')
@endsection
