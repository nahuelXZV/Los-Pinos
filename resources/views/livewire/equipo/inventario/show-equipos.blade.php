<div>
    <x-table>
        <div class=" px-4 py-6 flex items-center">
            <div class="flex items-center">
                <span class="mr-2 font-bold ">Paginar</span>
                <select wire:model='cant'
                    class="mr-2 px-6 py-3 border-gray-300 text-left text-sm rounded-full font-medium text-black-600 uppercase tracking-wider ">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="mr-2 font-bold">Buscar</span>
            </div>

            <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder="Escriba lo que esta buscando"
                wire:model="search" />

            @can('equipos.add')
                @livewire('equipo.inventario.create-equipos')
            @endcan
        </div>

        @if (count($equipos))

            <table class=" table table-fixed divide-y divide-gray-200 ">
                <thead class="rounded-3xl bg-green-500 text-white">
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
                            class="w-6/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('descripcion')">
                            Descripción

                            @if ($sort == 'descripcion')
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
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('multiplicidad')">
                            Tipo de equipo

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
                        <th scope="col"
                            class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider"
                            wire:click="order('idAlmacen')">
                            Nombre almacen

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

                        @if (auth()->user()->can('equipos.edit') ||
    auth()->user()->can('equipos.delete'))
                            <th scope="col" class="w-20 px-6 py-4 text-xs font-bold uppercase tracking-wider">
                                Acciones
                            </th>
                        @endif

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
                                @if ($equipo->descripcion == '')
                                    Sin Descripción
                                @else
                                    {{ $equipo->descripcion }}
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-white font-bold ">
                                @if ($equipo->multiplicidad == 'Único')
                                    <span class="px-2 rounded-full inline-flex bg-green-500">
                                        {{ $equipo->multiplicidad }}
                                    </span>
                                @else
                                    <span class="px-2 rounded-full inline-flex bg-blue-500">
                                        {{ $equipo->multiplicidad }}
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 font-bold">
                                @if ($equipo->stock == null)
                                    <span class="px-2 rounded-full inline-flex text-white bg-gray-500">
                                        Vacio
                                    </span>
                                @else
                                    {{ $equipo->stock }}
                                @endif
                            </td>


                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">
                                    {{ $equipo->almacen->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-white font-bold">
                                @if ($equipo->estadoServicio == 'Activo')
                                    <span class="px-2 rounded-full inline-flex bg-green-500">
                                        {{ $equipo->estadoServicio }}
                                    </span>
                                @else
                                    <span class="px-2 rounded-full inline-flex bg-red-500 ">
                                        {{ $equipo->estadoServicio }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-white font-bold">
                                @if ($equipo->estadoFuncionamiento == 'Buen Estado')

                                    <span class="px-2 rounded-full inline-flex bg-green-500">
                                        {{ $equipo->estadoFuncionamiento }}
                                    </span>

                                @else
                                    @if ($equipo->estadoFuncionamiento == 'Mantenimiento')
                                        <span class="px-2 rounded-full inline-flex bg-gray-500">
                                            {{ $equipo->estadoFuncionamiento }}
                                        </span>
                                    @else
                                        <span class="px-2 rounded-full inline-flex bg-red-500">
                                            {{ $equipo->estadoFuncionamiento }}
                                        </span>
                                    @endif
                                @endif
                            </td>


                            @if (auth()->user()->can('equipos.edit') ||
    auth()->user()->can('equipos.delete'))
                                <td class=" my-3 inline-flex justify-center px-6 py-4 whitespace-nowrap flex">
                                    @can('equipos.edit')

                                        <div class="whitespace-nowrap flex">
                                            <a class="font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4"
                                                wire:click='open({{ $equipo->codigo }})'>

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>

                                    @endcan

                                    @can('equipos.delete')
                                        <a class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                            wire:click="$emit('deleteEquipo', {{ $equipo->codigo }})">
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


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar el equipo:
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del Equipo" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre"
                    placeholder='Escriba el nombre' />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Modelo del Equipo" />
                <x-jet-input wire:model.defer='modelo' type="text" class=" w-full"
                    placeholder='Escriba el modelo' />
            </div>


            <div class="mb-4">
                <x-jet-label value="Marca del Equipo" />
                <x-jet-input type="text" class="w-full" rows="6" wire:model.defer="marca"
                    placeholder='Escriba la marca' />
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción del Equipo" />
                <textarea wire:model.defer='descripcion'
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" placeholder="Escriba la descripción"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value='Tipo de equipo' />
                <label class="text-gray-500 text-xs">*Los de tipo Único solo pueden tener una unidad en stock</label>
                <br>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer='multiplicidad'>
                    <option value="Único">Único</option>
                    <option value="Múltiple">Múltiple</option>
                </select>
                <x-jet-input-error for="multiplicidad" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Stock' />
                <x-jet-input wire:model.defer='stock' type='number' min="0" class="w-full"
                    placeholder='Escriba la cantidad' />
                <x-jet-input-error for="stock" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Estado de Funcionamiento del Equipo' />

                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer='estadoFuncionamiento'>
                    <option value="Buen Estado">Buen Estado</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Dañado">Dañado</option>
                </select>
                <x-jet-input-error for="estadoFuncionamiento" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Estado de Servicio del Equipo' />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer='estadoServicio'>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                <x-jet-input-error for="estadoServicio" />
            </div>


            <div class="mb-4 w-full" wire:ignore>
                <x-jet-label value='Nombre del Almacen' />
                <select wire:model='idAlmacen' class="idAlmacen" style='width: 100%'>
                    @foreach ($almacens as $almacen)
                        <option value="{{ $almacen->id }}">{{ $almacen->nombre }} </option>
                    @endforeach
                </select>
                <x-jet-input-error for="idAlmacen" />
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

    <script>
        document.addEventListener('livewire:load', function() {
            $('.idAlmacen').select2({
                placeholder: "Selecciona un almacen",
                allowClear: true,
                minimumInputLength: 1,
            });
            $('.idAlmacen').on('change', function() {
                @this.set('idAlmacen', this.value);
            })
        })
    </script>

 
    @push('js')
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

                            Livewire.emitTo('equipo.inventario.show-equipos', 'delete', equipoCodigo)
                        }
                    })
                });
        </script>
    @endpush

</div>
