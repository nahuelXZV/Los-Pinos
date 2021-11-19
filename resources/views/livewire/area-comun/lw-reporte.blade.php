<div>
    <x-table>
        <div class="flex mt-4 ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">
                Reporte</h1>
            <x-jet-danger-button wire:click="$set('open_rep',true)" class="flex-grow ml-2" wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Crear reporte
            </x-jet-danger-button>

        </div>

        <div class="mb-4 pl-4 pr-4 flex flex-wrap">

            @if ($reportes->count())
                <x-jet-label value='Descripcion de los reportes' class="text-lg" />
            @else
                <x-jet-label value='No hay reportes disponibles' class="text-lg" />
            @endif

            @foreach ($reportes as $report)
                <textarea
                    class="mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="1">{{ $report->reporte }}</textarea>

                <a class="mb-4 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4"
                    wire:click="edit({{ $report->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <a class="mb-4 ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                    wire:click="$emit('deleteReporte',{{ $report }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </a>
            @endforeach
        </div>
    </x-table>

    <x-jet-dialog-modal wire:model="open_rep">
        <x-slot name='title'>
            Crear Reporte
        </x-slot>

        <x-slot name='content'>
            <x-jet-label value='Descripcion del reporte' class="text-lg" />
            <textarea wire:model='descripcion'
                class="mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                rows="4"></textarea>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_rep',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='save()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Crear Reporte
        </x-slot>

        <x-slot name='content'>
            <x-jet-label value='Descripcion del reporte' class="text-lg" />
            <textarea wire:model='descripcion'
                class="mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                rows="4"></textarea>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
