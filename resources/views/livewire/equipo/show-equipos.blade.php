<div wire:init="loadEquipos">
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

                <x-jet-input type="text" placeholder="Introduzca el código o el nombre o la descripción del equipo"
                    wire:model="search" class=" mx-4 mr-4 flex-1 rounded-full w-full">
                </x-jet-input>
                
                @livewire('equipo.create-equipos')

            </div>
            @if (count($equipos))

                <table class=" table table-fixed divide-y divide-gray-200 ">
                    <thead class="rounded-3xl bg-green-500 text-white">
                        <tr class="">

                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                                wire:click="order('codigo')">
                                Código

                                @if ($sort == 'codigo')
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
                            Nombre

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
                            class="w-6/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('descripcion')">
                            Descripción

                            @if ($sort == 'desscripcion')
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
                            
                        </th>
                        <th scope="col"
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('multiplicidad')">
                            Multiplicidad

                            @if ($sort == 'multiplicidad')
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
                           
                        </th>
                        <th scope="col"
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('stock')">
                            Stock

                            @if ($sort == 'stock')
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
                            
                        </th>
                        <th scope="col"
                            class="w-4/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('estadoServicio')">
                            Estado de Servicio

                            @if ($sort == 'estadoServicio')
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
                            
                        </th>
                        <th scope="col"
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('estadoFuncionamiento')">
                            Estado de Funcionamiento

                            @if ($sort == 'estadoFuncionamiento')
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
                            
                        </th>
                        <th scope="col"
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('idAlmacen')">
                            ID de Almacén

                            @if ($sort == 'idAlmacen')
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
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class=" bg-white divide-y divide-gray-200">
                        @foreach ($equipos as $equipo)
                            <tr>

                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $equipo->codigo }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $equipo->nombre }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $equipo->marca }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $equipo->modelo }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $equipo->descripcion }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $equipo->multiplicidad }}
                                </td>

                                @if ($equipo->stock == null)
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        Vacío
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $equipo->stock }}
                                    </td>
                                @endif

                                @if ($equipo->estadoServicio == 'Activo')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-green-500">
                                            {{ $equipo->estadoServicio }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-red-500 ">
                                            {{ $equipo->estadoServicio }}
                                        </span>
                                    </td>
                                @endif


                                @if ($equipo->estadoFuncionamiento == 'Buen Estado')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-green-500">
                                            {{ $equipo->estadoFuncionamiento }}
                                        </span>
                                    </td>
                                @else
                                    @if ($equipo->estadoFuncionamiento == 'Mantenimiento')
                                        <td class="px-6 py-4 text-sm text-white font-bold">
                                            <span class="px-2 rounded-full inline-flex bg-gray-500">
                                                {{ $equipo->estadoFuncionamiento }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 text-sm text-white font-bold">
                                            <span class="px-2 rounded-full inline-flex bg-red-500">
                                                {{ $equipo->estadoFuncionamiento }}
                                            </span>
                                        </td>
                                    @endif
                                @endif

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">
                                        {{ $equipo->idAlmacen }}
                                    </div>
                                </td>
                                
                                <td class=" my-9 inline-flex justify-center px-6 py-4 whitespace-nowrap flex">
                                    @livewire('equipo.edit-equipos', ['equipo' => $equipo->codigo],
                                    key($equipo->codigo))

                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteEquipo', {{ $equipo->codigo }})">
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
                @if ($equipos->hasPages())
                    <div class="px-6 py-3">
                        {{ $equipos->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No hay equipos en el inventario con esas características
                </div>
            @endif
        </x-table>
    </div>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteEquipo',
                equipoCodigo => {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Los datos se borrarán permanentemente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '!Sí, eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('equipo.show-equipos', 'delete', equipoCodigo)

                            Swal.fire(
                                'Eliminado!',
                                'El equipo ha sido eliminado.',
                                'success'
                            )
                        }
                    })
                });
        </script>
    @endpush

</div>
