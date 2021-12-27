<div>
    <x-table>
        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre el Ingreso:
                {{ $ingreso->id }}
            </h1>
            @can('ingresos.edit')
                <x-jet-danger-button wire:click="datos()" class="flex-none bg-green-600 hover:bg-green-500"
                    wire:loading.attr='disabled'>
                    Editar Ingreso
                </x-jet-danger-button>
            @endcan
        </div>
        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    Código de Ingreso:
                    <label class="font-semibold text-gray-700"> {{ $ingreso->id }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Motivo:
                    <label class="font-semibold text-gray-700"> {{ $ingreso->motivo }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Fecha:
                    <label class="font-semibold text-gray-700"> {{ $ingreso->fecha }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Hora:
                    <label class="font-semibold text-gray-700"> {{ $ingreso->hora }}</label>
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Vivienda:
                    @if ($ingreso->vivienda)
                        <label class="font-semibold text-gray-700"> {{ $ingreso->vivienda->nroCasa }}</label>
                    @else
                        <label class="font-semibold text-gray-700"> Sin Vivienda</label>
                    @endif
                </label>
            </div>
            <div>
                <label class="text-sm text-black font-bold">
                    Motorizado:
                    @if ($ingreso->motorizado)
                        <label class="font-semibold text-gray-700"> {{ $ingreso->motorizado->placa }}</label>
                    @else
                        <label class="font-semibold text-gray-700"> Sin motorizado</label>
                    @endif

                </label>
            </div>
        </div>
    </x-table>

    @livewire('seguridad.ingreso.lw-lista-persona',['ingreso' => $ingreso])

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Editar Ingreso
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value='Fecha' class="mb-2" />
                <x-jet-input wire:model.defer='fecha' type='date' class="w-full" />
                <x-jet-input-error for="fecha" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Hora' class="mb-2" />
                <x-jet-input wire:model.defer='hora' type='time' class="w-full" />
                <x-jet-input-error for="hora" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Motivo' class="mb-2" />
                <select wire:model.defer='motivo'
                    class="w-full mr-2 px-6 py-3 border-gray-300 rounded-lg text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    <option value="Visita" selected="selected">Visita</option>
                    <option value="Trabajo">Trabajo</option>
                    <option value="Residente">Residente</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Otro">Otro</option>
                </select>
                <x-jet-input-error for="motivo" />
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona una vivienda <br>
                    <select wire:model='idVivienda' class="idVivienda" style='width: 100%'>
                        @foreach ($viviendas as $vivienda)
                            <option value="{{ $vivienda->id }}">{{ $vivienda->nroCasa }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idVivienda" />
                </label>
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
            <x-jet-secondary-button wire:click="$set('open',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idVivienda').select2({
                placeholder: "Selecciona una vivienda",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idVivienda').on('change', function() {
                @this.set('idVivienda', this.value);
            })
        })
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
