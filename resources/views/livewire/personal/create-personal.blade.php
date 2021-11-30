<div>
    <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title" class="font-bold">
            Crear Nuevo miembro del Personal
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />

                <x-jet-input-error for="nombre" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Carnet de Identidad" />
                <x-jet-input type="text" class="w-full" wire:model="carnet" />
                <x-jet-input-error for="carnet" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Número de Teléfono" />
                <x-jet-input type="text" class="w-full" wire:model="telefono" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Dirección de domicilio" />
                <x-jet-input type="text" class="w-full" wire:model="direccion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Nacimiento" />
                <x-jet-input type="date" class="w-full" wire:model="fechaNac" />
                <x-jet-input-error for="fechaNac" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nacionalidad" />
                <x-jet-input type="text" class="w-full" wire:model="nacionalidad" />
                <x-jet-input-error for="nacionalidad" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Sexo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="sexo">
                    <option class="text-gray-50 text-small">Seleccione uno...</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado Civil" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="estadoCivil">
                    <option class="text-gray-50 text-small">Seleccione uno...</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
            </div>


            <div class="mb-4">
                <x-jet-label value="Correo Electrónico" />
                <x-jet-input type="email" class="w-full" wire:model="email" />
                <x-jet-input-error for="email" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="cargo" />
                <x-jet-input-error for="cargo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="estado">
                    <option class="text-gray-50 text-small">Seleccione uno...</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>

        </x-slot>
        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Crear miembro
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>


</div>
