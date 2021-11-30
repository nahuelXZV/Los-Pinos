 <!-- Sidebar backdrop -->
 <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
     style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
 <aside x-transition:enter="transition transform duration-300"
     x-transition:enter-start="-translate-x-full opacity-30  ease-in"
     x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
     x-transition:leave-start="translate-x-0 opacity-100 ease-out"
     x-transition:leave-end="-translate-x-full opacity-0 ease-in"
     class="text-white fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-gray-900 border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
     :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">

     <!-- sidebar header -->
     <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
         <span class="p-2 text-lg font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
             <a href="{{ Route('inicio') }}" :class="{'lg:hidden': !isSidebarOpen}">Menú</a>
         </span>
         <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
             <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
     </div>

     <!-- Sidebar links -->
     <nav class="flex-1 overflow-y-scroll hover:overflow-y-auto">
         <ul class="p-2">
             <li>
                 <a href="{{ route('dashboard') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Inicio</span>
                 </a>

                 <!-- MODULO SISTEMA... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-800"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">SISTEMA</span></h1>
                 <!-- MODULO PERSONAL... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-100"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">PERSONAL</span></h1>

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Usuarios</span>
                 </a>

                 <!-- MODULO INVENTARIO... -->

                 <a href="{{ route('usuarios') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M14 5l7 7m0 0l-7 7m7-7H3" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Usuarios</span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Ingreso</span>
                 </a>

                 <a href="{{ route('roles') }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Roles</span>
                 </a>

                 <!-- MODULO PERSONAL... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-800"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">PERSONAL</span></h1>
                                 d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida</span>
                 </a>

                 <!-- MODULO EQUIPOS... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-100"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">EQUIPOS</span></h1>
                 <a href="{{ 'equipos' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Equipos</span>
                 </a>

                 <a href="{{ 'almacenes' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Almacenes</span>
                 </a>

                 <a href="{{ 'salida-equipos' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                         </svg>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida de Equipos</span>
                 </a>

                 <a href="{{ 'regreso-equipos' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                         </svg>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Regreso de Equipos</span>
                 </a>

                 <!-- MODULO PERSONAL... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-100"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">PERSONAL</span></h1>
                 <a href="{{ 'personal' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Personal</span>
                 </a>

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Personal</span>
                 </a>

                 <!-- MODULO INVENTARIO... -->
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-800"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">INVENTARIO</span></h1>

                 <a href="{{ 'inventario' }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Inventario</span>
                 </a>

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M14 5l7 7m0 0l-7 7m7-7H3" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Ingreso</span>
                 </a>

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                 <a href="{{ route('salidas') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida</span>
                 </a>

                 <!-- MODULO SEGURIDAD... -->
                 @can('ingresos')
                     <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-800"> <span
                             :class="{ 'lg:hidden': !isSidebarOpen }">SEGURIDAD</span></h1>
                 @endcan

                 @can('residentes')
                     <a href="{{ route('residentes') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Residentes</span>
                     </a>
                 @endcan
                 @can('visitantes')
                     <a href="{{ route('visitantes') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Visitantes</span>
                     </a>
                 @endcan
                 @can('motorizados')
                     <a href="{{ route('motorizados') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Motorizados</span>
                     </a>
                 @endcan
                 @can('viviendas')
                     <a href="{{ route('viviendas') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Viviendas</span>
                     </a>
                 @endcan
                 @can('ingresos')
                     <a href="{{ route('ingresos') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M14 5l7 7m0 0l-7 7m7-7H3" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Ingreso</span>
                     </a>
                 @endcan
                 @can('salidas')
                     <a href="{{ route('salidas') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida</span>
                     </a>
                 @endcan

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Reportes</span>
                 </a>

                 <!-- MODULO AREA COMUN... -->
                 @can('reserva.all')
                     <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-800"> <span
                             :class="{ 'lg:hidden': !isSidebarOpen }">ÁREA COMÚN</span></h1>
                 @endcan
                 @can('areacomun')
                     <a href="{{ route('areacomun') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Areas comunes</span>
                     </a>
                 @endcan

                 @can('reserva.all')
                     <a href="{{ route('reserva') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Reservas</span>
                     </a>
                 @endcan
                 @can('reserva.list')
                     <a href="{{ route('reserva.list') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-800"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Lista Reservas</span>
                     </a>
                 @endcan

             </li>
             <!-- Sidebar Links... -->
         </ul>
     </nav>



     <!-- Sidebar footer -->
     <div class="flex-shrink-0 p-2 border-t max-h-14 text-black">
         <form method="POST" action="{{ route('logout') }}">
             @csrf

             <button href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();" type="button"
                 class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
                 <span>
                     <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                     </svg>
                 </span>
                 <span :class="{'lg:hidden': !isSidebarOpen}"> Cerrar Sesión </span>
             </button>

         </form>

     </div>
 </aside>
