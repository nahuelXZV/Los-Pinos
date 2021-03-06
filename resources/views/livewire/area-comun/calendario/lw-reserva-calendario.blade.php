<div>

    <x-jet-danger-button wire:click="open_modal_add()">
        Añadir reservación
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Nueva Reserva
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un Área Común <br>
                    <select wire:model='codigoAC' class="codigoAC" style='width: 100%'>
                        @foreach ($areas as $area)
                            <option value="{{ $area->codigo }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="codigoAC" />
                </label>
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un residente <br>
                    <select wire:model='idResidente' class="idResidente" style='width: 100%'>
                        @foreach ($residentes as $residente)
                            <option value="{{ $residente->id }}">{{ $residente->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idResidente" />
                </label>
            </div>
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

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar Reserva
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Codigo de Reserva' />
                <x-jet-input wire:model='idR' type='text' class="w-full" readonly />
                <x-jet-input-error for="idR" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Área común' />
                <x-jet-input wire:model='NareaComun' type='text' class="w-full" readonly />
                <x-jet-input-error for="NareaComun" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Nombre del residente' />
                <x-jet-input wire:model='Nresidente' type='text' class="w-full" readonly />
                <x-jet-input-error for="Nresidente" />
            </div>
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
            <x-jet-secondary-button wire:click="$set('open_edit',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click="$emit('deleteReservaC',{{ $idR }})"
                wire:loading.attr='disabled' class="disabled:opacity-15">
                Eliminar
            </x-jet-danger-button>
            <x-jet-danger-button class="mr-2" wire:click='update()' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Actualizar
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
