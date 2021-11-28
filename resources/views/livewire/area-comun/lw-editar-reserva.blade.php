<div>

    <x-jet-danger-button wire:click='openModal()' class="flex-none bg-green-600 hover:bg-green-500"
        wire:loading.attr='disabled'>
        Editar reserva
    </x-jet-danger-button>

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
                <x-jet-input wire:model='fecha' type='date' class="w-full" id="start" />
                <x-jet-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de inicio' />
                <x-jet-input wire:model='horaIni' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaIni" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de final' />
                <x-jet-input wire:model='horaFin' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaFin" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Cantidad de personas' />
                <x-jet-input wire:model='cantsPers' type='number' class="w-full"
                    placeholder='Cantidad de personas' />
                <x-jet-input-error for="cantsPers" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click='update()' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
