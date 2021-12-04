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
            Nuevo usuario
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un empleado <br>
                    <select wire:model='codigoPersonal' class="codigoPersonal" style='width: 100%'>
                        @foreach ($personal as $persona)
                            <option value="{{ $persona->codigo }}">{{ $persona->nombre }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <x-jet-input-error for="codigoPersonal" class="mb-1 " />

            <div class="mb-4">
                <x-jet-label value='Selecciona un rol' class="mb-2" />
                <select wire:model.defer='idRol'
                    class="w-full border-gray-300 rounded-lg mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="idRol" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Correo Electrónico' class="mb-2" />
                <x-jet-input wire:model.defer='email' type='email' class="w-full" placeholder="Escriba su correo electrónico"/>
                <x-jet-input-error for="email" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Contraseña' class="mb-2" />
                <x-jet-input wire:model.defer='contra' type='password' class="w-full" placeholder='Escriba su contraseña'/>
                <x-jet-input-error for="contra" />
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
            $('.codigoPersonal').select2({
                placeholder: "Selecciona un empleado",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.codigoPersonal').on('change', function() {
                @this.set('codigoPersonal', this.value);
            })
        })
    </script>
</div>
