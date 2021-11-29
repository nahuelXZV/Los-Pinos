<div>
    <div class="whitespace-nowrap flex">
        <a class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
            wire:click='open()'>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
    </div>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar la Salida {{ $salida->id }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Calle" />
                <x-jet-input type="text" class="w-full" wire:model="calle" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Manzano" />
                <x-jet-input type="number" min="1" class="w-full" wire:model="manzano" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
