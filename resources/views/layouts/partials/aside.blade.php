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
<<<<<<< HEAD
                 <!-- component -->

                 <a href="{{ route('dashboard') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
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
=======
                 @can('inicio')
                     <a href="{{ route('dashboard') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Inicio</span>
                     </a>
                 @endcan
>>>>>>> 12effd9874cf3614b1269e38296d0fc86738a9e2

                 <a href="{{ route('profile.show') }}"
                     class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                     :class="{'justify-center': !isSidebarOpen}">
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                         </svg>
                     </span>
                     <span :class="{ 'lg:hidden': !isSidebarOpen }">Perfil</span>
                 </a>

                 <!-- MODULO SISTEMA... -->
                 @if (auth()->user()->can('usuarios') ||
    auth()->user()->can('roles') ||
    auth()->user()->can('bitacora'))
                     <h1 class="flex items-center space-x-2" :class="{'justify-center': !isSidebarOpen}">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">SISTEMA</span>
                     </h1>
                 @endif

                 @can('usuarios')
                     <a href="{{ route('usuarios') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Usuarios</span>
                     </a>
                 @endcan
                 @can('roles')
                     <a href="{{ route('roles') }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
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
                 @endcan
                 @can('bitacora')
                     <a href="{{ route('bitacora') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                         </svg>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Bitácora</span>
                     </a>
                 @endcan


                 <!-- MODULO EQUIPOS... -->
                 @if (auth()->user()->can('equipos') ||
    auth()->user()->can('almacenes') ||
    auth()->user()->can('salidaEquipos') ||
    auth()->user()->can('regresoEquipos'))
                     <h1 class="flex items-center space-x-2" :class="{'justify-center': !isSidebarOpen}">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">EQUIPOS</span>
                     </h1>
                 @endif

                 @can('equipos')
                     <a href="{{ route('equipos') }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Equipos</span>
                     </a>
                 @endcan

                 @can('almacenes')
                     <a href="{{ route('almacenes') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Almacenes</span>
                     </a>
                 @endcan

                 @can('salidaEquipos')
                     <a href="{{ route('salidasEquipo') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida Equipos</span>
                     </a>
                 @endcan

                 @can('regresoEquipos')
                     <a href="{{ route('regresosEquipo') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Regreso Equipos</span>
                     </a>
                 @endcan


                 <!-- MODULO PERSONAL... -->
                 @if (auth()->user()->can('personal') ||
    auth()->user()->can('trabajos') ||
    auth()->user()->can('seccion') ||
    auth()->user()->can('reporteAsistencia') ||
    auth()->user()->can('reporteTrabajo'))
                     <h1 class="flex items-center space-x-2" :class="{'justify-center': !isSidebarOpen}">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">PERSONAL</span>
                     </h1>
                 @endif
                 @can('personal')
                     <a href="{{ route('personal') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Personal</span>
                     </a>
                 @endcan
                 @can('trabajos')
                     <a href="{{ route('trabajos') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Trabajos</span>
                     </a>
                 @endcan
                 @can('seccion')
                     <a href="{{ route('seccion') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Sección</span>
                     </a>
                 @endcan
                 @can('reporteAsistencia')
                     <a href="{{ route('reporte.asistencia') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M14 5l7 7m0 0l-7 7m7-7H3" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Reportes de asistencia</span>
                     </a>
                 @endcan
                 @can('reporteTrabajo')
                     <a href="{{ route('reporte.trabajo') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700" <a
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Reporte de trabajo</span>
                     </a>
                 @endcan



                 <!-- MODULO SEGURIDAD... -->
                 @if (auth()->user()->can('residentes') ||
    auth()->user()->can('visitantes') ||
    auth()->user()->can('motorizados') ||
    auth()->user()->can('viviendas') ||
    auth()->user()->can('ingresos') ||
    auth()->user()->can('salidas'))
                     <h1 class="flex items-center space-x-2" :class="{'justify-center': !isSidebarOpen}">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">SEGURIDAD</span>
                     </h1>
                 @endif
                 @can('residentes')
                     <a href="{{ route('residentes') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Ingreso</span>
                     </a>
                 @endcan
                 @can('salidas')
                     <a href="{{ route('salidas') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">Salida</span>
                     </a>
                 @endcan


                 <!-- MODULO AREA COMUN... -->
                 @if (auth()->user()->can('areacomun') ||
    auth()->user()->can('reserva.all') ||
    auth()->user()->can('reserva.list'))
                     <h1 class="flex items-center space-x-2" :class="{'justify-center': !isSidebarOpen}">
                         <span :class="{ 'hidden': isSidebarOpen }">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                             </svg>
                         </span>
                         <span :class="{ 'lg:hidden': !isSidebarOpen }">ÁREA COMÚN</span>
                     </h1>
                 @endif
                 @can('areacomun')
                     <a href="{{ route('areacomun') }}"
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                         class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700"
                         :class="{'justify-center': !isSidebarOpen}">
                         <span>
                             <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
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
