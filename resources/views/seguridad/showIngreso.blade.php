@extends('layouts.plantilla')

@section('title')
    Ingresos
@endsection
@section('action')
    Informacion Ingreso
@endsection

@section('content')
    @livewire('seguridad.ingreso.lw-show-ingreso',['ingreso'=> $ingreso])
@endsection
