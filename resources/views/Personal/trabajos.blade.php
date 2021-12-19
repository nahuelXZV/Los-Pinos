@extends('layouts.plantilla')

@section('title')
    Trabajos
@endsection
@section('action')
<a href="{{ route('trabajos') }}" class="hover:underline ">Trabajos </a>
@endsection

@section('content')
    @livewire('personal.trabajo.lw-trabajos')
@endsection
