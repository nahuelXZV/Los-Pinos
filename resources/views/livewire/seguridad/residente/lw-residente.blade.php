<div>
    <x-table>
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-bold ">Paginar</span>
                <select wire:model='pagination'
                    class="mr-2 px-6 py-3 border-gray-300 rounded-full text-left text-sm  font-medium text-black-600 uppercase tracking-wider ">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="mr-2 font-bold">Buscar</span>
            </div>
            <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba lo que esta buscando"
                wire:model="search" />
            <a class="font-bold text-white rounded cursor-pointer bg-green-600 hover:bg-green-500 py-2 px-4 "
                @if ($search == '')
                href="{{ route('listaResidente.pdf', ['_@_', $sort, $direction]) }}"
            @else
                href="{{ route('listaResidente.pdf', [$search, $sort, $direction]) }}"
                @endif>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                </svg>
            </a>

            @can('residentes.add')
                @livewire('seguridad.residente.lw-add-residente')
            @endcan
        </div>

        @if ($residentes->count())
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
                            wire:click="order('nroCarnet')">
                            Número de Carnet

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
                            wire:click="order('telefono')">
                            Teléfono

                            @if ($sort == 'telefono')
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
                            wire:click="order('tipoResidente')">
                            Tipo de residente

                            @if ($sort == 'tipoResidente')
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
                            wire:click="order('idVivienda')">
                            Código de casa

                            @if ($sort == 'idVivienda')
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
                        @if (auth()->user()->can('residentes.edit') ||
    auth()->user()->can('residentes.delete'))
                            <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                                Acciones
                            </th>
                        @endif

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($residentes as $persona)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div
                                    class="px-2 inline-flex text-lx leading-10 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $persona->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $persona->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $persona->nroCarnet }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-white font-bold ">
                                @if ($persona->sexo == 'M')
                                    <span class="text-center px-2 py-0.5 rounded-full inline-flex bg-blue-500">
                                        Hombre
                                    </span>
                                @else
                                    <span class="text-center px-2 py-0.5 rounded-full inline-flex bg-red-500 ">
                                        Mujer
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $persona->telefono }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-white font-bold">
                                @if ($persona->tipoResidente == 'Propietario')
                                    <span class="text-center px-2 py-0.5 rounded-full inline-flex bg-green-500">
                                        {{ $persona->tipoResidente }}
                                    </span>
                                @else
                                    @if ($persona->tipoResidente == 'Inquilino')
                                        <span class="text-center px-2 py-0.5 rounded-full inline-flex bg-blue-500 ">
                                            {{ $persona->tipoResidente }}
                                        </span>
                                    @else
                                        <span class="text-center px-2 py-0.5 rounded-full inline-flex bg-red-500 ">
                                            {{ $persona->tipoResidente }}
                                        </span>
                                    @endif

                                @endif
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    @if ($persona->Vvivienda != null)
                                        {{ $persona->Vvivienda->nroCasa }}
                                    @else
                                        <label class="text-sm text-black font-bold">
                                            Sin domicilio</label>

                                    @endif
                                </div>
                            </td>
                            @if (auth()->user()->can('residentes.edit') ||
    auth()->user()->can('residentes.delete'))
                                <td class="px-6 py-4 whitespace-nowrap flex">
                                    @can('residentes.edit')
                                        <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                            wire:click="datos({{ $persona->id }})">
                                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                    @endcan
                                    @can('residentes.delete')
                                        <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                            wire:click="$emit('deleteResidente',{{ $persona }})">
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
            <div class="px-6 py-4">
                No hay registros
            </div>
        @endif

        @if ($residentes->hasPages())
            <div class="px-6 py-3">
                {{ $residentes->links() }}
            </div>
        @endif
    </x-table>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar Residente
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='Nombre Completo' class="mb-2" />
                <x-jet-input wire:model.defer='nombre' type='text' class="w-full" />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Numero de carnet' class="mb-2" />
                <x-jet-input wire:model.defer='numeroDeCarnet' type='text' class="w-full" />
                <x-jet-input-error for="numeroDeCarnet" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Telefono' class="mb-2" />
                <x-jet-input wire:model.defer='telefono' type='text' class="w-full" />
                <x-jet-input-error for="telefono" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Sexo' class="mb-2" />
                <select wire:model.defer='sexo'
                    class="w-full mr-2 px-6 py-3 border-gray-300 rounded-lg text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
                <x-jet-input-error for="sexo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Tipo de residente' class="mb-2" />
                <select wire:model.defer='tipoResidente'
                    class="w-full border-gray-300 rounded-lg mr-2 px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider"
                    defer='Propietario'>
                    <option value="Propietario">Propietario</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Inquilino">Inquilino</option>
                </select>
                <x-jet-input-error for="tipoResidente" />
            </div>

            <div class="mb-4 w-full" wire:ignore>
                <label for="id_label_single">
                    Selecciona un Numero de casa <br>

                    <select wire:model='idVivienda' class="idVivienda" style='width: 100%'>
                        @foreach ($viviendas as $vivienda)
                            <option value="{{ $vivienda->id }}">{{ $vivienda->nroCasa }}</option>
                        @endforeach
                    </select>

                </label>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)" wire:loading.attr='disabled'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idVivienda').select2({
                placeholder: "Selecciona un numero de casa",
                minimumInputLength: 2,
                allowClear: true
            });
            $('.idVivienda').on('change', function() {
                @this.set('idVivienda', this.value);
            })
        })
    </script>
</div>
