@extends('layouts.plantilla')

@section('title')
    Visitantes
@endsection
@section('action')
<a href="{{route('visitantes')}}" class="hover:underline ">Visitante </a> 
@endsection

@section('content')
    @livewire('seguridad.visitante.lw-visitante')
@endsection
