@extends('layouts.plantilla')

@section('title')
    Personal
@endsection
@section('action')
<a href="{{ route('personal') }}" class="hover:underline ">Personal </a>
@endsection

@section('content')

@livewire('personal.personal.show-personal')

@endsection
