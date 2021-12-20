<div>

    <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="open_modal_add()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Nuevo Horario
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Dia' />
                <x-jet-input wire:model.defer='dia' type='text' class="w-full"
                    placeholder="Ingrese el dia" />
                <x-jet-input-error for="dia" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de inicio' />
                <x-jet-input wire:model.defer='horaInicio' type='time' class="w-full"
                    placeholder="Ingrese la hora de inicio" />
                <x-jet-input-error for="horaInicio" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de final' />
                <x-jet-input wire:model.defer='horaFinal' type='time' min='0' class="w-full"
                    placeholder="Ingrese la hora final" />
                <x-jet-input-error for="horaFinal" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_add',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='save()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>