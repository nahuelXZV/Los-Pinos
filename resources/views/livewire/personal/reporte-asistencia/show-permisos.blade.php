<div>

    <x-table>

        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre el reporte de
                Asistencia:
                {{ $reporte->id }}
            </h1>

            <x-jet-danger-button wire:click='openEditReport({{ $reporte->id }})'
                class=" mx-5 bg-green-600 hover:bg-green-500" wire:loading.attr='disabled'>
                Editar Reporte
            </x-jet-danger-button>

        </div>

        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    Código de Reporte:
                    <label class="font-semibold text-gray-700">
                        {{ $reporte->id }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Código del Personal:
                    <label class="font-semibold text-gray-700">
                        {{ $reporte->personal->codigo }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Nombre del Personal:
                    <label class="font-semibold text-gray-700">
                        {{ $reporte->personal->nombre }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Fecha:
                    <label class="font-semibold text-gray-700">
                        {{ $reporte->fecha }}
                    </label>
                </label>
            </div>

        </div>
    </x-table>

    <x-table>

        <div class="flex mt-4 ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">
                Permisos de {{ $reporte->personal->nombre }}</h1>
            <x-jet-danger-button wire:click='openAdd()' class=" mx-5 bg-green-600 hover:bg-green-500"
                wire:loading.attr='disabled'>
                Crear Permiso
            </x-jet-danger-button>
        </div>

        @if (count($permisos))

            <!-- component -->
            <div class="mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                <div class="container mb-2 flex mx-auto items-center justify-center">
                    <ul class="w-min flex flex-col p-4 w-full"
                    rows="1" readonly>
    
                        @foreach ($permisos as $permiso)
    
                            <li class="container border-gray-400 whitespace-normal flex flex-row">
                                <div
                                    class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-green-600">
                                    <div class="flex-1 pl-1 mr-16">
                                        <div class="font-medium">
                                            {{ $permiso->motivo }}
                                        </div>
                                    </div>
                                    <div class="whitespace-nowrap flex">
                                        <a class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
                                            wire:click='openEditPermiso({{ $permiso->id }})'>
    
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                            wire:click="$emit('deletePermiso', {{ $permiso->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
    
                        @endforeach
                    </ul>
                </div>
            </div>
        @else

            <div class=" px-6 py-4 flex items-center">
                No hay permisos en el reporte de asistencia.
            </div>

        @endif

    </x-table>

    @if ($verif == true)
        <x-table>
            <div class="flex mt-4 ">
                <x-jet-danger-button wire:click='verifIngreso()' class="mr-2 mx-5 bg-blue-600 hover:bg-blue-500"
                    wire:loading.attr='disabled'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Ver Ingreso
                </x-jet-danger-button>

                <x-jet-danger-button wire:click='verifSalida()' class="mr-2 mx-5 bg-blue-600 hover:bg-blue-500"
                    wire:loading.attr='disabled'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    Ver Salida
                </x-jet-danger-button>
            </div>

            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span class="mr-2 font-semibold">Buscar</span>
                </div>

                <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba el código del Ingreso"
                    wire:model="search" />

                <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="openAddIngreso()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Añadir
                </x-jet-danger-button>
            </div>

            @if ($ingresos->count())
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
                                class="cursor-pointer text-center px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                                wire:click="order('hora')">
                                Hora de Ingreso

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
                                class="cursor-pointer text-center px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                                wire:click="order('retraso')">
                                Retraso

                                @if ($sort == 'retraso')
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


                            <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ingresos as $ingreso)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <div
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $ingreso->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-center text-gray-900">
                                        {{ $ingreso->hora }}
                                    </div>
                                </td>

                                @if ($ingreso->retraso != null)
                                    <td class="px-6 py-4 ">
                                        <div class="text-sm text-center text-gray-900">
                                            {{ $ingreso->retraso }}
                                        </div>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-center text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-gray-500">
                                            Sin Retraso
                                        </span>
                                    </td>
                                @endif

                                <td class="px-6 py-4 whitespace-nowrap flex">
                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                        wire:click="openEditIngreso({{ $ingreso->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                        wire:click="$emit('deleteIngresoP', {{ $ingreso->id }})">
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
                    No hay ingresos del personal
                </label>
            @endif

        </x-table>
    @else
        <x-table>
            <div class="flex mt-4 ">
                <x-jet-danger-button wire:click='verifIngreso()' class="mr-2 mx-5 bg-blue-600 hover:bg-blue-500"
                    wire:loading.attr='disabled'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Ver Ingreso
                </x-jet-danger-button>

                <x-jet-danger-button wire:click='verifSalida()' class="mr-2 mx-5 bg-blue-600 hover:bg-blue-500"
                    wire:loading.attr='disabled'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    Ver Salida
                </x-jet-danger-button>
            </div>


            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span class="mr-2 font-semibold">Buscar</span>
                </div>

                <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba el código de la Salida"
                    wire:model="search" />

                <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="openAddSalida()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Añadir
                </x-jet-danger-button>
            </div>

            @if ($salidas->count())
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
                                class="cursor-pointer text-center px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                                wire:click="order('hora')">
                                Hora de Salida

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

                            <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($salidas as $salida)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <div
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $salida->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-center text-gray-900">
                                        {{ $salida->hora }}
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap flex">
                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                        wire:click="openEditSalida({{ $salida->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                        wire:click="$emit('deleteSalidaP', {{ $salida->id }})">
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
                    No hay salidas del personal
                </label>
            @endif
        </x-table>
    @endif

    <x-jet-dialog-modal wire:model="open_edit_report">

        <x-slot name="title">
            Editar Reporte de Asistencia
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Fecha del Reporte" />
                <x-jet-input type="date" class="w-full" wire:model="fecha"
                    placeholder="Inserte la fecha del reporte" />
                <x-jet-input-error for="motivo" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit_report', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateReport()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_add_permiso">

        <x-slot name="title">
            Crear permiso
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Motivo del permiso" />
                <textarea wire:model.defer='motivo'
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-"
                    rows="3" placeholder="Escriba el motivo del permiso"></textarea>
                <x-jet-input-error for="motivo" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_add_permiso', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="savePermiso()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit_permiso">

        <x-slot name="title">
            Editar permiso
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Motivo del permiso" />
                <textarea wire:model.defer='motivo'
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-"
                    rows="3" placeholder="Escriba el motivo del permiso"></textarea>
                <x-jet-input-error for="motivo" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit_permiso', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="updatePermiso()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_add_ingreso">

        <x-slot name="title">
            Crear Horario de Ingreso
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value='Hora de Ingreso' />
                <x-jet-input wire:model.defer='hora' type='time' class="w-full" />
                <x-jet-input-error for="hora" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Minutos de Retraso' />
                <x-jet-input wire:model.defer='retraso' type='number' min="0" class="w-full"
                    placeholder='Escriba el tiempo de retraso' />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_add_ingreso', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="saveIngreso()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit_ingreso">

        <x-slot name="title">
            Editar Horario de Ingreso
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value='Hora de Ingreso' />
                <x-jet-input wire:model.defer='hora' type='time' class="w-full" />
                <x-jet-input-error for="hora" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Minutos de Retraso' />
                <x-jet-input wire:model.defer='retraso' type='number' min="0" class="w-full"
                    placeholder='Escriba el tiempo de retraso' />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit_ingreso', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateIngreso()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_add_salida">

        <x-slot name="title">
            Crear Horario de Salida
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value='Hora de Salida' />
                <x-jet-input wire:model.defer='horaSalida' type='time' class="w-full" />
                <x-jet-input-error for="horaSalida" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_add_salida', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="saveSalida()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit_salida">

        <x-slot name="title">
            Editar Horario de Salida
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value='Hora de Salida' />
                <x-jet-input wire:model.defer='horaSalida' type='time' class="w-full" />
                <x-jet-input-error for="horaSalida" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit_salida', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateSalida()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
