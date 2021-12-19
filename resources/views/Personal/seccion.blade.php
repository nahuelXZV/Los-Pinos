@extends('layouts.plantilla')

@section('title')
    Seccion
@endsection
@section('action')
<a href="{{ route('seccion') }}" class="hover:underline ">Sección </a>
@endsection

@section('content')

@livewire('personal.seccion.lw-seccion')

@endsection
