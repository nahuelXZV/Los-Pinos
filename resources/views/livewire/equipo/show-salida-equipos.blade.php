<div wire:init="loadSalidas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class=" px-4 py-6 flex items-center">

                <div class="flex items-center">
                    <select wire:model="cant"
                        class="mr-2 px-6 py-3 border-gray-300 text-left text-sm rounded-full font-medium text-black-600 uppercase tracking-wider ">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span class="mr-2 font-bold">Paginar</span>
                </div>

                <x-jet-input type="text" placeholder="Introduzca el ID de la Salida del Equipo"
                    wire:model="search" class=" mx-4 mr-4 flex-1 rounded-full w-full">
                </x-jet-input>

                <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="$set('open', true)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Añadir
                </x-jet-danger-button>

            </div>
            @if (count($salidas))

                <table class=" min-w-full divide-y divide-gray-200 ">
                    <thead class=" rounded-3xl bg-green-500 text-white">
                        <tr>

                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
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
                                wire:click="order('codigoPersonal')">
                                Código y Nombre del encargado del Equipo

                                @if ($sort == 'codigoPersonal')
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
                                wire:click="order('fecha')">
                                Fecha

                                @if ($sort == 'fecha')
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
                                wire:click="order('hora')">
                                Hora

                                @if ($sort == 'hora')
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
                                wire:click="order('motivo')">
                                Motivo de la Salida

                                @if ($sort == 'motivo')
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
                                wire:click="order('stockRequerido')">
                                Stock Requerido

                                @if ($sort == 'stockRequerido')
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
                    <tbody class=" bg-white divide-y divide-gray-200">
                        @foreach ($salidas as $salida)
                            <tr>

                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $salida->id }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $salida->personal->codigo }}-{{ $salida->personal->nombre }}
                                </td>


                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $salida->fecha }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $salida->hora }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $salida->motivo }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $salida->stockRequerido }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap flex">
                                        <a class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
                                        href=" {{ route('salidas.show', $salida->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        
                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteSalida', {{ $salida->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                            <!-- More people... -->
                        @endforeach
                    </tbody>
                </table>
                @if ($salidas->hasPages())
                    <div class="px-6 py-3">
                        {{ $salidas->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No hay equipos en el inventario con esas características
                </div>
            @endif
        </x-table>
    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Registrar Salida del Equipo
        </x-slot>

        <x-slot name='content'>
       
            <div class="mb-4">
                <x-jet-label value="Encargado del Equipo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='codigoPersonal'>
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->codigo }}">{{ $personal->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="codigoPersonal" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Nombre y Stock actual del Equipo' />
                <label class="text-gray-500 text-xs">*Si el equipo no tiene Stock, es de multiplicidad Unico</label>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='codigoEquipo'>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->codigo }}">{{ $equipo->nombre }} - {{ $equipo->stock}} </option>
                    @endforeach
                </select>
                <x-jet-input-error for="codigoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Stock Requerido a Sacar' />
                <label class="text-gray-500 text-xs">*Si la multiplicidad del equipo es Unico, el Stock Requerido no se tomará en cuenta</label>
                <p>
                <label class="text-gray-500 text-xs">*Si el Stock Requerido es mayor al Stock Total del Equipo, se sacará todo el Stock disponible</label>
                <x-jet-input wire:model='stockRequerido' type='number' min="0" class="w-full" />
                <x-jet-input-error for="stockRequerido" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Fecha' />
                <x-jet-input wire:model='fecha' type='date' class="w-full" />
                <x-jet-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Hora' />
                <x-jet-input wire:model='hora' type='time' class="w-full" placeholder='hh:mm' />
                <x-jet-input-error for="hora" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Motivo' />
                <x-jet-input wire:model='motivo' type='text' class="w-full" />
                <x-jet-input-error for="motivo" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click='save' wire:loading.attr='disabled'
                class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteSalida',
                salidaID => {
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

                            Livewire.emitTo('equipo.show-salida-equipos', 'delete', salidaID)

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                });
        </script>
    @endpush
</div>
