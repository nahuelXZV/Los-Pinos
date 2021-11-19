<div>
    <a href="#" class=" inline-block px-4 py-2 text-white rounded-full font-bold bg-blue-700 hover:bg-blue-900"
        wire:click="$set('open', true)">

        Crear Nuevo Equipo
    </a>

    <x-jet-dialog-modal wire:model="open" class="font-bold">
        <x-slot name="title">
            Crear Nuevo Equipo
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del Equipo" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />
                
                <x-jet-input-error for="nombre"/>

            </div>

            <div class="mb-4">
                <x-jet-label value="Modelo del Equipo" />
                <?php
                $cont = 1950;
                ?>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                        wire:model.defer="modelo">
                    <?php while ($cont <= date('Y')) { ?>
                    <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                    <?php $cont = ($cont +1); } ?>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="Marca del Equipo" />
                <x-jet-input type="text" class="w-full" rows="6" wire:model="marca" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción del Equipo" />
                <x-jet-input type="text" class="w-full" rows="6" wire:model="descripcion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Id de Almacén del Equipo" />
                <x-jet-input type="number" min="0" class="w-full" wire:model="idAlmacen" />
            
                <x-jet-input-error for="idAlmacen"/>
            
            </div>

        </x-slot>
        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear Equipo
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
