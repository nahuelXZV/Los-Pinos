@extends('layouts.plantilla')

@section('title')
    Roles
@endsection
@section('action')
    <a href="{{ route('roles') }}" class="hover:underline ">Roles y Cargos</a>

@endsection

@section('content')
    @livewire('sistema.roles')
@endsection
