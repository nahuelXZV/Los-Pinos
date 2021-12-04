<div>
    <div>
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">

            @can('residentes')
                <a href="{{ route('residentes') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $CResidente }} </p>
                        <p>Residentes</p>
                    </div>
                </a>
            @endcan

            @can('visitantes')
                <a href="{{ route('visitantes') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $CVisitantes }}</p>
                        <p>Visitantes</p>
                    </div>
                </a>
            @endcan

            @can('personal')
                <a href="#"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $Cpersonal }} </p>
                        <p>Empleados Activos</p>
                    </div>
                </a>
            @endcan

            @can('motorizados')
                <a href="{{ route('motorizados') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $CMotorizados }} </p>
                        <p>Motorizados</p>
                    </div>
                </a>
            @endcan

            @can('viviendas')
                <a href="{{ route('viviendas') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $CViviendas }} </p>
                        <p>Viviendas</p>
                    </div>
                </a>
            @endcan

            @can('areacomun')
                <a href="{{ route('areacomun') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"> {{ $CAreasComunes }} </p>
                        <p>Áreas Comunes</p>
                    </div>
                </a>
            @endcan

            @can('reserva.list')
                <a href="{{ route('reserva.list') }}"
                    class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 dark:border-gray-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl">{{ $CReservas }}</p>
                        <p>Reservas Activas</p>
                    </div>
                </a>
            @endcan

        </div>

        <!-- ./Statistics Cards -->

        <!-- Recent Activities -->
        @can('reserva.list')
            <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">
                                Reservas del dia</h3>
                        </div>
                        <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                            <a class="bg-green-500 dark:bg-gray-100 text-white active:bg-green-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" href="{{ route('reserva.list') }}">Ver todas</a>
                        </div>
                    </div>
                    @if ($Reservas->count())
                        <div class="block w-full">
                            <ul class="my-1">
                                @foreach ($Reservas as $reserva)
                                    <li class="flex px-4">
                                        <div
                                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                                            <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div
                                            class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100 py-2">
                                            <div class="flex-grow flex justify-between items-center">
                                                <div class="self-center">
                                                    <label class="text-sm text-black font-semibold">
                                                        {{ $reserva->title }}</label>
                                                    <label class="text-sm text-gray">
                                                        Reservo @if ($reserva->VareaComun->codigo == 107) el @else la @endif</label>
                                                    <label class="text-sm text-black font-semibold">
                                                        {{ $reserva->VareaComun->nombre }}</label>
                                                    <label class="text-sm text-gray">
                                                        para las </label>
                                                    <label class="text-sm text-black font-semibold">
                                                        {{ $reserva->horaIni }}</label>
                                                    <label class="text-sm text-gray">
                                                        hasta las </label>
                                                    <label class="text-sm text-black font-semibold">
                                                        {{ $reserva->horaFin }}</label>
                                                </div>

                                                <div class="flex-shrink-0 ml-2">
                                                    <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                        href="{{ route('reserva.show', $reserva->id) }}"
                                                        style="outline: none;">
                                                        Ver
                                                        <span>
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="currentColor"
                                                                class="transform transition-transform duration-500 ease-in-out">
                                                                <path fill-rule="evenodd"
                                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="block w-full mb-4">
                            <label class="text-sm text-black font-semibold ml-4">
                                No hay reservas para el dia de hoy</label>
                        </div>
                    @endif
                </div>
            </div>
        @endcan
        <!-- ./Recent Activities -->

        <!-- Empleados Table -->
        <!-- ./Empleados Table -->

    </div>
</div>
