<div>
    <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open_add',true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Añadir visitante
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Nombre Completo' class="mb-2" />
                <x-jet-input wire:model.defer='nombre' type='text' class="w-full" placeholder='Escriba el nombre completo'/>
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Numero de carnet' class="mb-2" />
                <x-jet-input wire:model.defer='numeroDeCarnet' type='text' class="w-full" placeholder='Escriba el número de carnet' />
                <x-jet-input-error for="numeroDeCarnet" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Sexo' class="mb-2" />
                <select wire:model='sexo'
                    class="w-full border-gray-300 rounded-lg mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
                <x-jet-input-error for="sexo" />
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
