<div>
    <x-table>
        <div class="px-6 py-4">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre"
                    placeholder="Escriba el nombre del Personal" />
    
                <x-jet-input-error for="nombre" />
    
            </div>
    
            <div class="mb-4">
                <x-jet-label value="Carnet de Identidad" />
                <x-jet-input type="text" class="w-full" wire:model="carnet"
                    placeholder="Escriba el número de carnet" />
                <x-jet-input-error for="carnet" />
            </div>
    
            <div class="mb-4">
                <x-jet-label value="Número de Teléfono" />
                <x-jet-input type="text" class="w-full" wire:model="telefono"
                    placeholder="Escriba el número de teléfono" />
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
                    placeholder="Inserte la fecha de Nacimiento" />
                <x-jet-input-error for="fechaNac" />
            </div>
    
            <div class="mb-4">
                <x-jet-label value="Nacionalidad" />
                <x-jet-input type="text" class="w-full" wire:model="nacionalidad"
                    placeholder="Escriba la nacionalidad" />
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
                    placeholder="Escriba el correro electrónico" />
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
    
            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                href=" {{ route('personal') }}">
                Volver Atrás
            </a>
            <x-jet-danger-button wire:click="update()" wire:loading.attr="disabled" wire:target="update"
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
    

        </div>
       
    </x-table>

    <x-table>

        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-semibold">Buscar</span>
            </div>

            <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba el código de Horario"
                wire:model="search" />

            <x-jet-danger-button class="mr-2 bg-green-600 hover:bg-green-500" wire:click="openAdd()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
                Añadir
            </x-jet-danger-button>
        </div>

        @if ($horarios->count())
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
                            wire:click="order('idHorario')">
                            Código de Horario

                            @if ($sort == 'idHorario')
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
                    @foreach ($horarios as $hora)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div
                                    class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $hora->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-center text-gray-900">
                                    {{ $hora->idHorario }}
                                </div>
                            </td>


                            <td class="px-6 py-4 whitespace-nowrap flex">
                                <a
                                    class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                    wire:click='openEdit({{ $hora->id }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a
                                    class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteHorarioPersonal', {{ $hora->id }})">
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
                No hay horarios del personal
            </label>
        @endif

    </x-table>

    <x-jet-dialog-modal wire:model="open_add">

        <x-slot name="title">
            Crear Horario del Personal
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Horario de Trabajo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="horario">
                    @foreach ($horas as $horario)
                        <option value="{{ $horario->id }}">{{$horario->dia}} - {{ $horario->horaInicio }} - {{ $horario->horaFinal }}
                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="horario" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_add', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save()" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar Horario del Personal
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Horario de Trabajo" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="horario">
                    @foreach ($horas as $horario)
                        <option value="{{ $horario->id }}">{{$horario->dia}} - {{ $horario->horaInicio }} - {{ $horario->horaFinal }}
                        </option>
                    @endforeach
                </select>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateHorario()" wire:loading.attr="disabled" wire:target="updateHorario"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
