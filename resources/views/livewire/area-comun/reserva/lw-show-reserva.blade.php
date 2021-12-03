<div>
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
                    Cantidad aproximada de invitados:
                    <label class="font-semibold text-gray-700"> {{ $reserva->cantsPers }}</label>
                </label>
            </div>
        </div>
    </x-table>

    @can('reserva.reporte')
        @livewire('area-comun.reserva.lw-reporte-reserva',['reserva' => $reserva->id])
    @endcan

    @can('reserva.invitado')
        @livewire('area-comun.reserva.lw-lista-invitados',['reserva' => $reserva->id])
    @endcan

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar Reserva
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Codigo de Reserva' />
                <x-jet-input wire:model='idR' type='text' class="w-full" readonly />
                <x-jet-input-error for="idR" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Fecha' />
                <x-jet-input wire:model.defer='fecha' type='date' class="w-full" id="start" />
                <x-jet-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de inicio' />
                <x-jet-input wire:model.defer='horaIni' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaIni" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de final' />
                <x-jet-input wire:model.defer='horaFin' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaFin" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click='update()' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
