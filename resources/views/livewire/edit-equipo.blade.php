<div>
    <a class="btn px-4 py-2 inline-flex mt-5 text-white rounded-full font-bold bg-green-700 hover:bg-green-900"
        wire:click='open()'>Editar Equipo
    </a>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar el equipo {{ $equipo->codigo }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Código del Equipo" />
                <x-jet-input wire:model='codigo' type="text" class=" w-full" readonly="" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre del Equipo" />
                <x-jet-input wire:model='nombre' type="text" class=" w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Modelo del Equipo" />
                <?php
                $cont = 1950;
                ?>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='modelo'>
                    <?php while ($cont <= date('Y')) { ?>
                    <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                    <?php $cont = ($cont +1); } ?>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="Marca del Equipo" />
                <x-jet-input wire:model='marca' type="text" class=" w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción del Equipo" />
                <x-jet-input wire:model='descripcion' type="text" class=" w-full" />
            </div>


            <div class="mb-4">
                <x-jet-label value="Stock del Equipo" />
                <x-jet-input wire:model='stock' type="text" class=" w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Multiplicidad del Equipo" />
                <label class="block text-xs text-gray-400">Seleccione Multiple solamente si tiene varios equipos de este
                    tipo</label>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='multiplicidad'>
                    <option value="Multiple">Multiple</option>
                    <option value="Unico">Unico</option>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado de Servicio del Equipo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='estadoServicio'>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado de Funcionamiento del Equipo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='estadoFuncionamiento'>
                    <option value="Buen Estado">Buen Estado</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Dañado">Dañado</option>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="ID del Almacén del Equipo" />
                <x-jet-input wire:model='idAlmacen' type="text" class=" w-full" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update()"
                wire:loading.attr="disabled" wire:target="update" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
    
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('updateEquipo', 
            equipoCodigo => {

                Livewire.emitTo('edit-equipo', 'update', equipoCodigo)
                
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endpush

</div>
