
        <x-table>
            <div class="text-lg font-bold mx-5 my-5">Inventario Disponible</div>
            @if (count($equipos))

            <div class="container mb-2 flex mx-auto w-full items-center justify-center">
                <div class="grid grid-rows-6 grid-flow-col p-4">

                    @foreach ($equipos as $equipo)

                        <div class="prueba border-gray-400">
                            <div
                                class="select-none items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-green-600">
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">
                                        {{ $equipo->nombre }}
                                    </div>
                                </div>
                                <div
                                    class="w-1/4 text-wrap text-center flex flex-col text-white text-bold rounded-full bg-green-500 justify-center items-center mr-10 p-2">
                                    {{ $equipo->stock }}
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </div>
            </div>
        @else

            <div class=" px-6 py-4 flex items-center">
                No hay permisos en el reporte de asistencia.
            </div>

        @endif

        </x-table>