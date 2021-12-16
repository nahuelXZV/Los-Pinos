<div>
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

                <x-jet-input type="text" placeholder="Introduzca el código o el nombre del personal" wire:model="search"
                    class=" mx-4 mr-4 flex-1 rounded-full w-full">
                </x-jet-input>

                @livewire('personal.personal.create-personal')

            </div>
            @if (count($personals))

                <table class=" min-w-full divide-y divide-gray-200 ">
                    <thead class=" rounded-3xl bg-green-500 text-white">
                        <tr>

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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                                wire:click="order('sexo')">
                                Sexo

                                @if ($sort == 'sexo')
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
                                wire:click="order('email')">
                                Email

                                @if ($sort == 'email')
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
                                wire:click="order('cargo')">
                                Cargo
                                @if ($sort == 'cargo')
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
                                wire:click="order('estado')">
                                Estado
                                @if ($sort == 'estado')
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
                        @foreach ($personals as $persona)
                            <tr>

                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $persona->codigo }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">

                                    <div class="text-sm text-gray-900 font-bold">
                                        {{ $persona->nombre }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        CI:{{ $persona->carnet }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Telf.:{{ $persona->telefono }}
                                    </div>
                                </td>


                                @if ($persona->sexo == 'M')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-blue-500">
                                            {{ $persona->sexo }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-pink-500 ">
                                            {{ $persona->sexo }}
                                        </span>
                                    </td>
                                @endif

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $persona->email }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $persona->cargo }}
                                </td>


                                @if ($persona->estado == 'Activo')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-green-500">
                                            {{ $persona->estado }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-red-500 ">
                                            {{ $persona->estado }}
                                        </span>
                                    </td>
                                @endif


                                <td class=" my-3 px-6 py-4 whitespace-nowrap flex">
                                    <a
                                        class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
                                        wire:click='openModal({{ $persona->codigo }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a
                                        class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                        wire:click="$emit('deletePersonal', {{ $persona->codigo }})">
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
                @if ($personals->hasPages())
                    <div class="px-6 py-3">
                        {{ $personals->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No hay equipos en el inventario con esas características
                </div>
            @endif
        </x-table>

        <x-jet-dialog-modal wire:model="open">

            <x-slot name="title">
                Editar al miembro del personal
            </x-slot>

            <x-slot name="content">

                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" class="w-full" wire:model="nombre" 
                    placeholder="Escriba el nombre del Personal"/>

                    <x-jet-input-error for="nombre" />

                </div>

                <div class="mb-4">
                    <x-jet-label value="Carnet de Identidad" />
                    <x-jet-input type="text" class="w-full" wire:model="carnet" 
                    placeholder="Escriba el número de carnet"/>
                    <x-jet-input-error for="carnet" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Número de Teléfono" />
                    <x-jet-input type="text" class="w-full" wire:model="telefono" 
                    placeholder="Escriba el número de teléfono"/>
                </div>


                <div class="mb-4">
                    <x-jet-label value="Dirección de domicilio" />
                    <textarea wire:model.defer='direccion'
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-"
                        rows="2" placeholder="Escriba la dirección del domicilio"></textarea>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Fecha de Nacimiento" />
                    <x-jet-input type="date" class="w-full" wire:model="fechaNac" 
                    placeholder="Inserte la fecha de Nacimiento"/>
                    <x-jet-input-error for="fechaNac" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Nacionalidad" />
                    <x-jet-input type="text" class="w-full" wire:model="nacionalidad" 
                    placeholder="Escriba la nacionalidad"/>
                    <x-jet-input-error for="nacionalidad" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Sexo" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="sexo">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Estado Civil" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="estadoCivil">
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                    </select>
                </div>


                <div class="mb-4">
                    <x-jet-label value="Correo Electrónico" />
                    <x-jet-input type="email" class="w-full" wire:model="email" 
                    placeholder="Escriba el correro electrónico"/>
                    <x-jet-input-error for="email" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Cargo" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="cargo">
                        <option value="Ninguno">Ninguno</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Guardia">Guardia</option>
                        <option value="Portero">Portero</option>
                        <option value="Jardinero">Jardinero</option>
                        <option value="Limpieza">Limpieza</option>
                    </select>
                    <x-jet-input-error for="cargo" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Estado" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="estado">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click="update()" wire:loading.attr="disabled" wire:target="update"
                    class="disabled:opacity-25">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>
</div>