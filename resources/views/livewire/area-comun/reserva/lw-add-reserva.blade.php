<div>
    <x-jet-danger-button class="ml-2 mr-2 bg-green-600 hover:bg-green-500" wire:click="open_modal_add()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
        </svg>
        Añadir
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Nueva Reserva
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un área común <br>
                    <select wire:model='codigoAC' class="codigoAC" style='width: 100%'>
                        @foreach ($areas as $area)
                            <option value="{{ $area->codigo }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <x-jet-input-error for="codigoAC" />
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un residente <br>
                    <select wire:model='idResidente' class="idResidente" style='width: 100%'>
                        @foreach ($residentes as $residente)
                            <option value="{{ $residente->id }}">{{ $residente->nombre }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <x-jet-input-error for="idResidente" />
            <div class="mb-4">
                <x-jet-label value='Fecha' />
                <x-jet-input wire:model.defer='fecha' type='date' class="w-full" id="start" />
                <x-jet-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de inicio' />
                <x-jet-input wire:model.defer='horaIni' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaIni" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de final' />
                <x-jet-input wire:model.defer='horaFin' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaFin" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_add',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-secondary-button class="mr-2" wire:click='invitados()' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Añadir invitados
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click='save()' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.codigoAC').select2({
                placeholder: "Selecciona un area comun",
                allowClear: true,
                minimumInputLength: 2,
            });
            $('.codigoAC').on('change', function() {
                @this.set('codigoAC', this.value);
            })
        })
        document.addEventListener('livewire:load', function() {
            $('.idResidente').select2({
                placeholder: "Selecciona un residente",
                allowClear: true,
                minimumInputLength: 2,
            });
            $('.idResidente').on('change', function() {
                @this.set('idResidente', this.value);
            })
        })
    </script>


</div>
