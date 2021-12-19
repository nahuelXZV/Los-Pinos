@extends('layouts.plantilla')

@section('title')
    Horario
@endsection
@section('action')
    <a href="{{ route('horario') }}" class="hover:underline ">Horario </a>
@endsection

@section('content')

    @livewire('personal.horario.lw-horario')

@endsection
