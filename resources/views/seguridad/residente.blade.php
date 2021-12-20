@extends('layouts.plantilla')

@section('title')
    Residentes
@endsection
@section('action')
<a href="{{route('residentes')}}" class="hover:underline ">Residente </a> 
@endsection

@section('content')
    @livewire('seguridad.residente.lw-residente')

@endsection
