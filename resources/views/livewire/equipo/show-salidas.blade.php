<div>
    <x-table>
        <div class="flex ">
            <h1 class="px-6 py-2 font-mono text-xl font-bold uppercase flex-grow ">Información sobre la salida:
                {{ $salida->id }}
            </h1>

        </div>

        <div class="px-6 py-4 w-auto">
            <div>
                <label class="text-sm text-black font-bold">
                    ID de la Salida:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->id }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Código del Personal Encargado:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->personal->codigo }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Nombre del Personal Encargado:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->personal->nombre }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Stock Sacado del Equipo:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->stockRequerido }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Fecha de Salida:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->fecha }}
                    </label>
                </label>
            </div>

            <div>
                <label class="text-sm text-black font-bold">
                    Hora de Salida:
                    <label class="font-semibold text-gray-700">
                        {{ $salida->hora }}
                    </label>
                </label>
            </div>


        </div>
    </x-table>

    <x-table>
        <h1 class="mt-4 px-6 py-2 font-mono text-xl font-bold uppercase">Modificar Equipo Sacado
        </h1>


        @if ($lista->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="rounded-3xl bg-green-500 text-white">
                    <tr>
                        <th scope="col"
                            class="w-32 cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            ID de Salida
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Código del Equipo
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Nombre del Equipo
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Stock Total
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Stock Faltante
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Estado de Salida del Equipo
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
                                    {{ $equipos->saco->idSalidaEquipo }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->codigo }}
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->nombre }}
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->stock }}
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">
                                    {{ $equipos->stockFaltante }}
                                </div>
                            </td>

                            @if ($equipos->saco->estadoSalida == 'Buen Estado')
                                <td class="px-6 py-4 text-sm text-white font-bold">
                                    <span class="px-2 rounded-full inline-flex bg-green-500">
                                        {{ $equipos->saco->estadoSalida }}
                                    </span>
                                </td>
                            @else
                                @if ($equipos->saco->estadoSalida == 'Mantenimiento')
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-gray-500">
                                            {{ $equipos->saco->estadoSalida }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-white font-bold">
                                        <span class="px-2 rounded-full inline-flex bg-red-500">
                                            {{ $equipos->saco->estadoSalida }}
                                        </span>
                                    </td>
                                @endif
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap flex">
                                <a class="ml-2 font-bold text-white rounded cursor-pointer bg-blue-600 hover:bg-blue-500 py-2 px-4 "
                                    wire:click="open_edit({{ $equipos->saco->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a
                                    class="ml-2 font-bold text-white rounded cursor-pointer bg-red-600 hover:bg-red-500 py-2 px-4 "
                                    wire:click="$emit('deleteSalida',{{ $equipos->saco->id }})">
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

    <x-jet-dialog-modal wire:model="open_editar">
        <x-slot name='title'>
            Modificar Equipo Sacado
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value='ID de la Salida' />
                <x-jet-input wire:model='idSalidaEquipo' type='text' class="w-full" readonly />
                <x-jet-input-error for="idSalidaEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Nombre del Equipo' />
                <x-jet-input wire:model='nombreEquipo' type='text' class="w-full" readonly />
                <x-jet-input-error for="codigoEquipo" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Stock Requerido' />
                <label class="text-gray-500 text-xs">*Si el Stock Requerido sobrepasa el Stock Total, se sacará todo el Stock disponible</label>
                <x-jet-input wire:model.refer='stockRequerido' type='number' min="0" class="w-full" />
                <x-jet-input-error for="stockRequerido" />
            </div>

            <div class="mb-4">
                <x-jet-label value='Hora de Salida' />
                <x-jet-input wire:model='horaSalida' type='time' class="w-full" />
                <x-jet-input-error for="horaSalida" />
            </div>
            <div class="mb-4">
                <x-jet-label value='Fecha de salida' />
                <x-jet-input wire:model='fechaSalida' type='date' class="w-full" />
                <x-jet-input-error for="fechaSalida" />
            </div>


            <div class="mb-4">
                <x-jet-label value='Estado de la Salida del Equipo' />
                <label class="text-gray-500 text-xs">*Solo podrá modificar el Estado si el equipo es de multiplicidad Unico</label>
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model='estadoSalida'>
                    <option value="Buen Estado">Buen Estado</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Dañado">Dañado</option>
                </select>
                <x-jet-input-error for="estadoSalida" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_editar',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update()' wire:loading.attr='disabled' class="disabled:opacity-15">
                Actualizar
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

                        Livewire.emitTo('equipo.show-salidas', 'delete', salidaID)

                        Swal.fire(
                            '¡Eliminado!',
                            'La Salida ha sido eliminada.',
                            'success'
                        )
                    }
                })
            });
    </script>
@endpush

</div>
