 <!-- Sidebar backdrop -->
 <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
     style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
 <aside x-transition:enter="transition transform duration-300"
     x-transition:enter-start="-translate-x-full opacity-30  ease-in"
     x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
     x-transition:leave-start="translate-x-0 opacity-100 ease-out"
     x-transition:leave-end="-translate-x-full opacity-0 ease-in"
     class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-gray-50 border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
     :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
     <!-- sidebar header -->
     <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
         <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
             <span :class="{'lg:hidden': isSidebarOpen}" class="">P</span>
             <span :class="{'lg:hidden': !isSidebarOpen}">Los Pinos</span>
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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

                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-100"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">SEGURIDAD</span></h1>
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
                 <h1 class="items-center p-2 space-x-2 rounded-md hover:bg-gray-100"> <span
                         :class="{ 'lg:hidden': !isSidebarOpen }">ÁREA COMÚN</span></h1>

                 <a href="{{route('areacomun')}}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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

                 <a href="{{route('reserva')}}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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

                 <a href="{{route('reserva.list')}}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
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
             </li>

             <!-- Sidebar Links... -->
         </ul>
     </nav>
     <!-- Sidebar footer -->
     <div class="flex-shrink-0 p-2 border-t max-h-14">
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
