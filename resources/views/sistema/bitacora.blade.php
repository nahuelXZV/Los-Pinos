@extends('layouts.plantilla')

@section('title')
    Bitácora
@endsection
@section('action')
    Gestionar bitácora
@endsection

@section('content')
    @livewire('sistema.lw-bitacora')
@endsection
