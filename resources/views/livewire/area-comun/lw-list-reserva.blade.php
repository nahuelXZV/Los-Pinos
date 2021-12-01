<div>
    <x-table>
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-bold ">Paginar</span>
                <select wire:model='pagination'
                    class="mr-2 px-6 py-3 border-gray-300 text-left text-sm rounded-full font-medium text-black-600 uppercase tracking-wider ">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="mr-2 font-bold">Buscar</span>
            </div>
            <x-jet-input type="text" class="flex-1 mr-2 rounded-full"
                placeholder="Escriba el codigo de reserva que esta buscando" wire:model="search" />
            <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="openModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
                Añadir
            </x-jet-danger-button>
        </div>

        @if ($reservas->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-green-500 text-white">
                    <tr>
                        <th scope="col"
                            class="w-32 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('id')">
                            Código

                            @if ($sort == 'idR')
                                @if ($direction == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                    </svg>
                                @endif
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            @endif

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-fond uppercase tracking-wider"
                            wire:click="order('idResidente')">
                            Nombre Residente
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('codigoAC')">
                            Área Común

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('fecha')">
                            Fecha
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('horaIni')">
                            Hora Inicio
                        </th>
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>


                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div
                                    class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $reserva->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $reserva->Vresidente->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $reserva->VareaComun->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $reserva->fecha }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $reserva->horaIni }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap flex">
                                <a class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
                                    href=" {{ route('reserva.show', $reserva->id) }}">
                                    <svg xmlns=" http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </a>

                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteReserva',{{ $reserva }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        @else
            <div class="px-6 py-4">
                <label class="text-sm text-black font-semibold">
                    No hay registros</label>
            </div>
        @endif

        @if ($reservas->hasPages())
            <div class="px-6 py-3">
                {{ $reservas->links() }}
            </div>
        @endif
    </x-table>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Nueva Reserva
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Codigo de Reserva' />
                <x-jet-input wire:model='idR' type='text' class="w-full" readonly />
                <x-jet-input-error for="idR" />
            </div>
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un área común <br>
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
                <x-jet-input wire:model='fecha' type='date' class="w-full" id="start" />
                <x-jet-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de inicio' />
                <x-jet-input wire:model='horaIni' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaIni" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de final' />
                <x-jet-input wire:model='horaFin' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="horaFin" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Cantidad de personas' />
                <x-jet-input wire:model='cantsPers' type='number' class="w-full"
                    placeholder='Cantidad de personas' />
                <x-jet-input-error for="cantsPers" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-secondary-button class="mr-2" wire:click='invitados' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Añadir invitados
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click='save' wire:loading.attr='disabled'
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
