@extends('layouts.plantilla')

@section('title')
    Detalles del Personal
@endsection
@section('action')
    <a href="{{ route('personal') }}" class="hover:underline "> Personal</a>&nbsp/&nbsp
    <a href="{{ route('personal.show', $personal->codigo) }}" class="hover:underline "> Detalles del personal</a>
@endsection

@section('content')
    @livewire('personal.personal.show-datos',['personal' => $personal])
@endsection
