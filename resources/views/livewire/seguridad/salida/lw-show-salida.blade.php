<div>
    <x-table>
        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre la salida:
                {{ $salida->id }}
            </h1>
            <x-jet-danger-button wire:click="datos({{ $salida->id }})"
                class="flex-none bg-green-600 hover:bg-green-500" wire:loading.attr='disabled'>
                Editar Salida
            </x-jet-danger-button>
        </div>
        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    Código de Salida:
                    <label class="font-semibold text-gray-700"> {{ $salida->id }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Fecha:
                    <label class="font-semibold text-gray-700"> {{ $salida->fecha }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Hora:
                    <label class="font-semibold text-gray-700"> {{ $salida->hora }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Motorizado:
                    @if ($salida->motorizado)
                        <label class="font-semibold text-gray-700"> {{ $salida->motorizado->placa }}</label>
                    @else
                        <label class="font-semibold text-gray-700"> Sin motorizado</label>
                    @endif

                </label>
            </div>
        </div>
    </x-table>

    @livewire('seguridad.salida.lw-lista-persona',['salida' => $salida])

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Editar Salida
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value='Fecha' class="mb-2" />
                <x-jet-input wire:model='fecha' type='date' class="w-full" />
                <x-jet-input-error for="fecha" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Hora' class="mb-2" />
                <x-jet-input wire:model='hora' type='time' class="w-full" />
                <x-jet-input-error for="hora" />
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona una motorizado <br>
                    <select wire:model='idMotorizado' class="idMotorizado" style='width: 100%'>
                        @foreach ($motorizados as $motorizado)
                            <option value="{{ $motorizado->id }}">{{ $motorizado->placa }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idMotorizado" />
                </label>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idMotorizado').select2({
                placeholder: "Selecciona un motorizado",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idMotorizado').on('change', function() {
                @this.set('idMotorizado', this.value);
            })
        })
    </script>
</div>
