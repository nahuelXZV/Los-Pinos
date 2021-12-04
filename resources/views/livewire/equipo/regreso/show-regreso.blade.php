<div>
    <x-table>
        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre el regreso:
                {{ $regreso->id }}
            </h1>

            <x-jet-danger-button wire:click='open_editReg({{ $regreso->id }})'
                class="flex-none bg-green-600 hover:bg-green-500" wire:loading.attr='disabled'>
                Editar Regreso
            </x-jet-danger-button>

        </div>

        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    ID del Regreso:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->id }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Código del Personal Encargado:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->personal->codigo }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Nombre del Personal Encargado:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->personal->nombre }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Fecha de Regreso:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->fecha }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Hora de Regreso:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->hora }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    ID de salida:
                    <label class="font-semibold text-gray-700">
                        {{ $regreso->idSalidaEquipo }}
                    </label>
                </label>
            </div>

        </div>
    </x-table>

    <x-table>
        <h1 class="mt-4 px-6 py-2 font-mono text-xl font-bold uppercase">Lista de Equipos Regresados
        </h1>
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-semibold">Buscar</span>
            </div>

            <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba lo que esta buscando"
                wire:model="search" />
        </div>

        @if ($lista->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-green-500 text-white">
                    <tr>
                        <th scope="col"
                            class="w-32 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('id')">
                            ID

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
                            wire:click="order('nombreEquipo')">
                            Nombre del Equipo

                            @if ($sort == 'nombreEquipo')
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
                            wire:click="order('stockRegresado')">
                            Cantidad Sacada
                            @if ($sort == 'stockRegresado')
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
                            wire:click="order('stockRegresado')">
                            Stock Regresado Disponible
                            @if ($sort == 'stockRegresado')
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
                            wire:click="order('stockRegresadoDañado')">
                            Stock Regresado Dañado
                            @if ($sort == 'stockRegresadoDañado')
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
                            wire:click="order('fechaRegreso')">
                            Fecha de Regreso
                            @if ($sort == 'fechaRegreso')
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
                            wire:click="order('horaRegreso')">
                            Hora de Regreso
                            @if ($sort == 'horaRegreso')
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
                            wire:click="order('estadoDevolucion')">
                            Estado de Devolución
                            @if ($sort == 'estadoDevolucion')
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

                        <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($lista as $equipos)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div
                                    class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                    @if ($equipos->regreso)
                                        {{ $equipos->regreso->id }}
                                    @else
                                        nulo
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->nombre }}
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->regreso->cantidadSacada }}
                                </div>
                            </td>


                            @if ($equipos->regreso->stockRegresado != null)
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $equipos->regreso->stockRegresado }}
                                    </div>
                                @else
                                <td class="px-6 py-4 text-sm text-white font-bold">
                                    <span class="px-2 rounded-full inline-flex bg-gray-500">
                                        Vacio
                                    </span>
                                </td>
                            @endif

                            @if ($equipos->regreso->stockRegresadoDañado != null)
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $equipos->regreso->stockRegresadoDañado }}
                                    </div>
                                </td>
                            @else
                                <td class="px-6 py-4 text-sm text-white font-bold">
                                    <span class="px-2 rounded-full inline-flex bg-gray-500">
                                        Vacio
                                    </span>
                                </td>
                            @endif


                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->regreso->fechaRegreso }}
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->regreso->horaRegreso }}
                                </div>
                            </td>


                            @if ($equipos->regreso->estadoDevolucion == 'Buen Estado')
                                <td class="px-6 py-4 text-sm text-white font-bold">
                                    <span class="px-2 rounded-full inline-flex bg-green-500">
                                        {{ $equipos->regreso->estadoDevolucion }}
                                    </span>
                                </td>
                            @else
                                @if ($equipos->regreso->estadoDevolucion == 'Mantenimiento')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-gray-500">
                                            {{ $equipos->regreso->estadoDevolucion }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-red-500">
                                            {{ $equipos->regreso->estadoDevolucion }}
                                        </span>
                                    </td>
                                @endif
                            @endif



                            <td class="px-6 py-4 whitespace-nowrap flex">
                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                    wire:click="open_edit({{ $equipos->regreso->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteRegreso',{{ $equipos->regreso->id }})">
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
            <label class="text-sm text-black font-semibold mt-4 ml-4 mb-10">
                No hay equipos sacados
            </label>
        @endif

    </x-table>


    <x-jet-dialog-modal wire:model="open_editreg">
        <x-slot name='title'>
            Modificar Horario del Regreso
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='ID del Regreso' />
                <x-jet-input wire:model='idRegresoEquipo' type='text' class="w-full" readonly />
                <x-jet-input-error for="idRegresoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Hora de Regreso' />
                <x-jet-input wire:model='horaRegreso' type='time' class="w-full" />
                <x-jet-input-error for="horaRegreso" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Fecha de Regreso' />
                <x-jet-input wire:model='fechaRegreso' type='date' class="w-full" />
                <x-jet-input-error for="fechaRegreso" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_editreg',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='updateRegreso()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>



    <x-jet-dialog-modal wire:model="open_editar">
        <x-slot name='title'>
            Modificar Equipo Regresado
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='ID' />
                <x-jet-input wire:model='idRegresoEquipo' type='text' class="w-full" readonly />
                <x-jet-input-error for="idRegresoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Nombre del Equipo' />
                <x-jet-input wire:model='nombreEquipo' type='text' class="w-full" readonly />
                <x-jet-input-error for="nombreEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Stock Regresado Disponible' />
                <x-jet-input wire:model='stockRegresado' type='number' min="0" class="w-full" />
                <x-jet-input-error for="stockRegresado" />
            </div>

            <div class="mb-4 mt-2">
                <x-jet-label value='Stock Regresado Dañado' />
                <x-jet-input wire:model='stockRegresadoDañado' type='number' min="0" class="w-full" />
                <x-jet-input-error for="stockRegresadoDañado" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Fecha de Regreso' />
                <x-jet-input wire:model='fechaRegresoEquipo' type='date' class="w-full" />
                <x-jet-input-error for="fechaRegresoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Hora de Regreso' />
                <x-jet-input wire:model='horaRegresoEquipo' type='time' class="w-full" />
                <x-jet-input-error for="horaRegresoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Estado de Devolución del Equipo' />
                <label class="text-gray-500 text-xs">*Solo podrá modificar el Estado si el equipo es de
                    multiplicidad
                    Unico</label>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='estadoDevolucion'>
                    <option value="Buen Estado">Buen Estado</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Dañado">Dañado</option>
                </select>
                <x-jet-input-error for="estadoDevolucion" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_editar',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='updateEquipo()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>


    <script>
        document.addEventListener('livewire:load', function() {
            $('.codigoEquipo').select2({
                placeholder: "Selecciona un miembro del Personal",
                allowClear: true,
                minimumInputLength: 2,
            });
            $('.codigoEquipo').on('change', function() {
                @this.set('codigoEquipo', this.value);
            })
        })
    </script>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteRegreso',
                regresoID => {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Los datos se borrarán permanentemente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('equipo.regreso.show-regreso', 'delete', regresoID)

                            Swal.fire(
                                '¡Eliminado!',
                                'El regreso ha sido eliminado.',
                                'success'
                            )
                        }
                    })
                });
        </script>
    @endpush

</div>
