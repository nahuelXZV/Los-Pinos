@extends('layouts.plantilla')

@section('title')
    Reserva
@endsection
@section('action')
    <a href="{{ route('reserva.list') }}" class="hover:underline ">Lista de reservas</a> &nbsp/&nbsp
    <a href="{{ route('reserva.show', $reserva->id) }}" class="hover:underline ">Detalles de reserva</a>
@endsection

@section('content')

    <x-table>
        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre la reserva:
                {{ $reserva->id }}
            </h1>
            @can('reserva.edit')
                <x-jet-danger-button wire:click='open_modal_edit()' class="flex-none bg-green-600 hover:bg-green-500"
                    wire:loading.attr='disabled'>
                    Editar reserva
                </x-jet-danger-button>
            @endcan
        </div>

        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    Código de Reserva:
                    <label class="font-semibold text-gray-700"> {{ $reserva->id }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Nombre del residente:
                    <label class="font-semibold text-gray-700"> {{ $reserva->Vresidente->nombre }}</label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Nombre del área común:
                    <label class="font-semibold text-gray-700"> {{ $reserva->VareaComun->nombre }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Fecha:
                    <label class="font-semibold text-gray-700"> {{ $reserva->fecha }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Hora de inicio:
                    <label class="font-semibold text-gray-700"> {{ $reserva->horaIni }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Hora de final:
                    <label class="font-semibold text-gray-700"> {{ $reserva->horaFin }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Cantidad de invitados:
                    <label class="font-semibold text-gray-700"> {{ $reserva->cantsPers }}</label>
                </label>
            </div>
        </div>
    </x-table>

@endsection
