@extends('layouts.plantilla')

@section('title')
    Bitácora
@endsection
@section('action')
    <a href="{{ route('bitacora') }}" class="hover:underline ">Bitácora</a>
@endsection

@section('content')
    @livewire('sistema.lw-bitacora')
@endsection
