<div>
    <x-jet-danger-button class=" ml-2 mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open" class="font-bold">
        <x-slot name="title">
            Crear Nuevo Equipo
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del Equipo" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre"
                    placeholder='Escriba el nombre' />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Modelo del Equipo" />
                <x-jet-input wire:model.defer='modelo' type="text" class=" w-full"
                    placeholder='Escriba el modelo' />
            </div>


            <div class="mb-4">
                <x-jet-label value="Marca del Equipo" />
                <x-jet-input type="text" class="w-full" rows="6" wire:model.defer="marca"
                    placeholder='Escriba la marca' />
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción del Equipo" />
                <textarea wire:model.defer='descripcion'
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" placeholder="Escriba la descripción"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value='Tipo de equipo' class="mb-2" />
                <label class="text-gray-500 text-xs">*Los de tipo Único solo pueden tener una unidad en stock</label>
                <select wire:model.defer='multiplicity'
                    class="w-full border-gray-300 rounded-lg mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    <option value="Único">Único</option>
                    <option value="Múltiple">Múltiple</option>
                </select>
                <x-jet-input-error for="multiplicity" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Stock' />
                <x-jet-input wire:model.defer='stock' type='number' min="0" class="w-full"
                    placeholder='Escriba la cantidad' />
                <x-jet-input-error for="stock" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Estado de Funcionamiento del Equipo' />

                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer='estadoFuncionamiento'>
                    <option value="Buen Estado">Buen Estado</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Dañado">Dañado</option>
                </select>
                <x-jet-input-error for="estadoFuncionamiento" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Estado de Servicio del Equipo' />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer='estadoServicio'>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                <x-jet-input-error for="estadoServicio" />
            </div>


            <div class="mb-4 w-full" wire:ignore>
                <x-jet-label value='Nombre del Almacen' />
                <select wire:model='idAlmacen' class="idAlmacen" style='width: 100%'>
                    @foreach ($almacens as $almacen)
                        <option value="{{ $almacen->id }}">{{ $almacen->nombre }} </option>
                    @endforeach
                </select>
                <x-jet-input-error for="idAlmacen" />
            </div>


        </x-slot>
        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idAlmacen').select2({
                placeholder: "Selecciona un almacen",
                allowClear: true,
                minimumInputLength: 2,
            });
            $('.idAlmacen').on('change', function() {
                @this.set('idAlmacen', this.value);
            })
        })
    </script>

</div>
