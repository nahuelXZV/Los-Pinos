<div>
    <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open',true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Añadir Motorizado
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Placa del motorizado' class="mb-2" />
                <x-jet-input wire:model.defer='placa' type='text' class="w-full"  placeholder="Escriba la placa"/>
                <x-jet-input-error for="placa" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Descripcion del motorizado' class="mb-2" />
                <textarea
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" wire:model.defer='descripcion' placeholder="Escriba una descripcion del motorizado"></textarea>
            </div>
            <x-jet-label value='Selecciona un propietario' class="mb-2 text-lg font-bold" />
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un Residente <br>
                    <select wire:model='idResidente' class="idResidente" style='width: 100%'>
                        @foreach ($residentes as $residente)
                            <option value="{{ $residente->id }}">{{ $residente->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idResidente" />
                </label>
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un visitante <br>
                    <select wire:model='idVisitante' class="idVisitante" style='width: 100%'>
                        @foreach ($visitantes as $visitante)
                            <option value="{{ $visitante->id }}">{{ $visitante->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idVisitante" />
                </label>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='save()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idResidente').select2({
                placeholder: "Selecciona un propietario",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idResidente').on('change', function() {
                @this.set('idResidente', this.value);
            })
        })
        document.addEventListener('livewire:load', function() {
            $('.idVisitante').select2({
                placeholder: "Selecciona un propietario",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idVisitante').on('change', function() {
                @this.set('idVisitante', this.value);
            })
        })
    </script>
</div>
