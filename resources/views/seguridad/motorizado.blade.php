@extends('layouts.plantilla')

@section('title')
    Motorizados
@endsection
@section('action')
    <a href="{{ route('motorizados') }}" class="hover:underline ">Motorizados </a>
@endsection

@section('content')
    @livewire('seguridad.motorizado.lw-motorizado')
@endsection
