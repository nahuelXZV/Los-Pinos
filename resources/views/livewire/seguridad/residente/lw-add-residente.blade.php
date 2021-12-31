<div>
    <x-jet-danger-button class="ml-2 mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open_add',true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Añadir Residente
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Nombre Completo' class="mb-2" />
                <x-jet-input wire:model.defer='nombre' type='text' class="w-full" placeholder="Escriba su nombre" />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Numero de carnet' class="mb-2" />
                <x-jet-input wire:model.defer='numeroDeCarnet' type='text' class="w-full" placeholder="Escriba su numero de carnet"/>
                <x-jet-input-error for="numeroDeCarnet" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Telefono' class="mb-2" />
                <x-jet-input wire:model.defer='telefono' type='text' class="w-full" placeholder="Escriba su telefono"/>
                <x-jet-input-error for="telefono" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Sexo' class="mb-2" />
                <select wire:model.defer='sexo'
                    class="w-full border-gray-300 rounded-lg mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
                <x-jet-input-error for="sexo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Tipo de residente' class="mb-2" />
                <select wire:model.defer='tipoResidente'
                    class="w-full border-gray-300 rounded-lg  mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider"
                    defer='Propietario'>
                    <option value="Propietario">Propietario</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Inquilino">Inquilino</option>
                </select>
                <x-jet-input-error for="tipoResidente" />
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un Numero de casa <br>

                    <select wire:model='idVivienda' class="idVivienda" style='width: 100%'>
                        @foreach ($viviendas as $vivienda)
                            <option value="{{ $vivienda->id }}">{{ $vivienda->nroCasa }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idVivienda" />

                </label>
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



    <script>
        document.addEventListener('livewire:load', function() {
            $('.idVivienda').select2({
                placeholder: "Selecciona un numero de casa",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idVivienda').on('change', function() {
                @this.set('idVivienda', this.value);
            })
        })
    </script>
</div>
