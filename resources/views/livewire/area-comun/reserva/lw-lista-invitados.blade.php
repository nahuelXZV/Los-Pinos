<div>
    <x-table>
        <h1 class="mt-4 px-6 py-2 font-mono text-xl font-bold uppercase">Lista de Invitados
        </h1>
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-semibold">Buscar</span>
            </div>

            <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba lo que esta buscando"
                wire:model="search" />

<<<<<<< HEAD:resources/views/livewire/area-comun/lw-show-reserva.blade.php
            @livewire('area-comun.lw-add-visitante',['codigoRes' => $reserva->id])
            
            <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open_add',true)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
                Añadir
            </x-jet-danger-button>
=======
            @can('visitantes.add')
                @livewire('area-comun.reserva.lw-new-visitante',['codigoRes' => $reserva->id])
            @endcan

            @can('reserva.invitado.add')
                <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open_add',true)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Añadir
                </x-jet-danger-button>
            @endcan
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2:resources/views/livewire/area-comun/reserva/lw-lista-invitados.blade.php
        </div>

        @if ($lista->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-green-500 text-white">
                    <tr>
                        <th scope="col"
                            class="w-32 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('id')">
                            Código

                            @if ($sort == 'id')
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('nombre')">
                            Nombre Visitante

                            @if ($sort == 'nombre')
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('nroCarnet')">
                            Numero de carnet

                            @if ($sort == 'nroCarnet')
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

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('horaIngreso')">
                            Hora Ingreso

                            @if ($sort == 'horaIngreso')
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('horaSalida')">
                            Hora de salida
                            @if ($sort == 'horaSalida')
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
                            @if (auth()->user()->can('reserva.invitado.edit') ||
    auth()->user()->can('reserva.invitado.delete'))
                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
        @endif

        </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $visitantes)
                <tr>
                    <td class="px-6 py-4 ">
                        <div
                            class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $visitantes->id }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="text-sm text-gray-900">
                            {{ $visitantes->nombre }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="text-sm text-gray-900">
                            {{ $visitantes->nroCarnet }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="text-sm text-gray-900">
                            {{ $visitantes->invitado->horaIngreso }}
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="text-sm text-gray-900">
                            {{ $visitantes->invitado->horaSalida }}
                        </div>
                    </td>
                    @if (auth()->user()->can('reserva.invitado.edit') ||
    auth()->user()->can('reserva.invitado.delete'))
                        <td class="px-6 py-4 whitespace-nowrap flex">
                            @can('reserva.invitado.edit')
                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                    wire:click="open_modal_edit({{ $visitantes->invitado->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            @endcan
                            @can('reserva.invitado.delete')
                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteInvitado',{{ $visitantes->invitado->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            @endcan
                        </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
        </table>
    @else
        <label class="text-sm text-black font-semibold mt-4 ml-4 mb-10">
            No hay invitados
        </label>
        @endif

    </x-table>

    <x-jet-dialog-modal wire:model="open_add">
        <x-slot name='title'>
            Añadir invitado
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un invitado <br>
                    <select wire:model='idVisitante' class="idVisitante" style='width: 100%'>
                        @foreach ($listVisitante as $personas)
                            <option value="{{ $personas->id }}">{{ $personas->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="idVisitante" />
                </label>
            </div>
            <x-jet-input-error for="idVisitante" />
            <div class="mb-4">
                <x-jet-label value='Hora de ingreso' />
                <x-jet-input wire:model.defer='horaIngreso' type='time' class="w-full" placeholder='hh::mm' />
                <x-jet-input-error for="horaIngreso" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de salida' />
                <x-jet-input wire:model.defer='horaSalida' type='time' class="w-full" placeholder='hh::mm' />
                <x-jet-input-error for="horaSalida" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_add',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='save()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Añadir
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Registrar Ingreso o Salida
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Codigo Visitante' />
                <x-jet-input wire:model='idVisitante' type='text' class="w-full" readonly />
                <x-jet-input-error for="idVisitante" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Nombre' />
                <x-jet-input wire:model='nombre' type='text' class="w-full" readonly />
                <x-jet-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Numero de Carnet' />
                <x-jet-input wire:model='nroCarnet' type='text' class="w-full" readonly />
                <x-jet-input-error for="nroCarnet" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de ingreso' />
                <x-jet-input wire:model.defer='horaIngreso' type='time' class="w-full" placeholder='hh::mm' />
                <x-jet-input-error for="horaIngreso" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora de salida' />
                <x-jet-input wire:model.defer='horaSalida' type='time' class="w-full" placeholder='hh::mm' />
                <x-jet-input-error for="horaSalida" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idVisitante').select2({
                placeholder: "Selecciona un invitado",
                allowClear: true,
                minimumInputLength: 2,
            });
            $('.idVisitante').on('change', function() {
                @this.set('idVisitante', this.value);
            })
        })
    </script>
</div>
