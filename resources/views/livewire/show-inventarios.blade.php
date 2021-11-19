<div wire:init="loadEquipos">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class=" px-4 py-6 flex items-center">

                <div class="flex items-center">
                    <select wire:model="cant"
                        class="mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>Entradas</span>
                </div>

                <x-jet-input type="text" placeholder="Introduzca el nombre o la descripción del equipo"
                    wire:model="search" class=" mx-4 mr-4 flex-1 rounded-full w-full">
                </x-jet-input>
                @livewire('create-equipo')

            </div>
            @if (count($equipos))

                <table class="inline-block w-full divide-y divide-gray-200">
                    <thead class="rounded-3xl bg-green-500">
                        <tr class="">
                            <th class="text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                scope="col" wire:click="order('codigo')">
                                Código
                                @if ($sort == 'codigo')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                scope="col" wire:click="order('nombre')">
                                Nombre
                                @if ($sort == 'nombre')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('descripcion')">
                                Descripción
                                @if ($sort == 'descripcion')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('multiplicidad')">
                                Multiplicidad
                                @if ($sort == 'multiplicidad')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('stock')">
                                Stock
                                @if ($sort == 'stock')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('estadoServicio')">
                                Estado de Servicio
                                @if ($sort == 'estadoServicio')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('estadoFuncionamiento')">
                                Estado de funcionamiento
                                @if ($sort == 'estadoFuncionamiento')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                            <th scope="col"
                                class=" text-white px-6 py-3 cursor-pointer text-left text-lg font-bold tracking-wider"
                                wire:click="order('idAlmacen')">
                                ID de Almacen
                                @if ($sort == 'idAlmacen')
                                    @if ($direction == 'desc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
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
                                        class="px-2 inline-flex text-2xl leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $equipo->codigo }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">

                                    <div class="text-base font-medium text-gray-900">
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

                                <td class="px-6 py-4 text-base text-gray-500">
                                    {{ $equipo->multiplicidad }}
                                </td>

                                @if ($equipo->stock == null)
                                    <td class="px-6 py-4 text-base text-gray-500">
                                        Vacío
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-base text-gray-500">
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
                                    <div class="text-base text-gray-500 font-bold">
                                        {{ $equipo->idAlmacen }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                    @livewire('edit-equipo', ['equipo' => $equipo->codigo], key($equipo->codigo))

                                    <a class="btn mt-5 ml-2 inline-flex px-4 py-2 text-white rounded-full font-bold bg-red-700 hover:bg-red-900"
                                        wire:click="$emit('deleteEquipo', {{ $equipo->codigo }})">
                                        Eliminar Equipo
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
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('show-inventarios', 'delete', equipoCodigo)

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
