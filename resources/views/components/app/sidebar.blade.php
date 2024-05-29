<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path
                        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                        fill="#4F46E5" />
                    <path
                        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                        fill="url(#logo-a)" />
                    <path
                        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                        fill="url(#logo-b)" />
                </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Decotab - Backend</span>
                </h3>
                <ul class="mt-3">

                    <!-- Inbox -->
                    {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['dashboard'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['dashboard'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('dashboard') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['dashboard'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['dashboard'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Inbox</span>
              </div>
            </a>
          </li> --}}

                    <!-- Messages -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('mensajes.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(2), ['mensajes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(2), ['mensajes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mensajes</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    @if ($mensajes !== 0)
                                        <span
                                            class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">{{ $mensajes }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </li>


                    <!-- Reclamaciones -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['reclamo'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['reclamo'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('reclamo.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(2), ['reclamo'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                            d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(2), ['reclamo'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reclamaciones</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    @if ($reclamo !== 0)
                                        <span
                                            class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">{{ $reclamo }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </li>



                    <!-- Datos generales -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('datosgenerales.edit', 1) }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos
                                    Generales</span>
                            </div>
                        </a>
                    </li>



                    <!-- Politicas de devolucion -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['devolucion'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['devolucion'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('politicas-de-devolucion.edit', 1) }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['devolucion'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['devolucion'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Politicas
                                    de Devolucion</span>
                            </div>
                        </a>
                    </li>

                    <!-- Terminos y Condiciones -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['terminosycondiciones'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['terminosycondiciones'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('terminos-y-condiciones.edit', 1) }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['terminosycondiciones'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['terminosycondiciones'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Terminos
                                    y Condiciones</span>
                            </div>
                        </a>
                    </li>

                    <!-- Servicios -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['servicios'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['servicios'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('servicios.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['servicios'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['servicios'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Servicios</span>
                            </div>
                        </a>
                    </li>


                    <!-- Testimony -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['testimonios'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['testimonios'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('testimonios.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['testimonios'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['testimonios'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Testimonios</span>
                            </div>
                        </a>
                    </li>


                    <!-- Category -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['categorias'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['categorias'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('categorias.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['categorias'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['categorias'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Categoría</span>
                            </div>
                        </a>
                    </li>


                    <!-- Blog -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['blog'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['blog'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('blog.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['blog'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['blog'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Blog</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['logos'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['logos'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('logos.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['logos'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['logos'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Logos
                                    Cliente</span>
                            </div>
                        </a>
                    </li>


                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['staff'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['staff'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('staff.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['staff'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['staff'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Personal</span>
                            </div>
                        </a>
                    </li>

                    

                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['strength'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['strength'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('strength.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['strength'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['strength'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Beneficios</span>
                            </div>
                        </a>
                    </li>



                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['aboutus'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['aboutus'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('aboutus.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['aboutus'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['aboutus'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Nosotros
                                </span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['attributes'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['attributes'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('attributes.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['attributes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['attributes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Atributos</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('valoresattributes.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    Valor de atributo</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['products'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['products'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('products.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['products'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['products'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Productos</span>
                            </div>
                        </a>
                    </li>


                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['prices'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['prices'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('prices.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['prices'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['prices'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Costos
                                    de Envio</span>
                            </div>
                        </a>
                    </li>


                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['tags'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['tags'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('tags.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Etiquetas</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['faqs'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['faqs'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('faqs.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['faqs'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['faqs'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Faqs</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['slider'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['slider'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('slider.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['slider'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['slider'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sliders</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['galerie'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['galerie'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('galerie.index') }}">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['galerie'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                        d="M1 3h22v20H1z" />
                                    <path
                                        class="fill-current @if (in_array(Request::segment(2), ['galerie'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Galeries</span>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>

        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
