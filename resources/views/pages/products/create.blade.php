<x-app-layout>


    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">

                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">

                        Agregar nuevo producto
                    </h2>
                </header>
                <div class="flex flex-col gap-2 p-3 ">
                  <div class="flex gap-2 p-3 ">

                    <div class="basis-0 md:basis-3/5">
                        <div class="rounded shadow-lg p-4 px-4 ">


                            <div id='general' class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 ">

                                <div class="md:col-span-5 mt-2">

                                    <label for="producto">Producto</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="producto" name="producto" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Producto">


                                    </div>
                                </div>
                                <div class="md:col-span-5 mt-2">

                                    <label for="extract">Extracto</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="extract" name="extract" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Extracto">


                                    </div>
                                </div>
                                <div class="md:col-span-5">
                                    <label for="description">Descripcion</label>
                                    <div class="relative mb-2 mt-2">
                                        <textarea type="text" rows="2" id="description" name="description" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Descripción"></textarea>
                                    </div>
                                </div>




                                <div class="md:col-span-5">
                                    <label for="imagen">Impagen Principal</label>
                                    <div class="relative mb-2  mt-2">
                                        <input id="imagen" name="imagen"
                                            class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    </div>
                                </div>



                                <div class="">

                                    <label for="destacar">Destacar
                                    </label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                        </div>
                                        <input type="checkbox" id="destacar" name="destacar"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">


                                    </div>
                                </div>
                                <div class="">

                                    <label for="recomendar">Recomendar</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                        </div>
                                        <input type="checkbox" id="recomendar" name="recomendar"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="basis-0 md:basis-2/5">
                        <div class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                            <div class="md:col-span-5 flex justify-between gap-4">
                                <div class="w-full">
                                    <label for="precio">Precio</label>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                                height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                        </div>
                                        <input type="number" id="precio" name="precio" value="" step="0.1"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="precio">
                                    </div>

                                </div>
                                <div class="w-full">
                                    <label for="descuento">Descuento</label>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                                height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <input type="number" id="descuento" name="descuento" value="" step="0.1"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="descuento">
                                    </div>

                                </div>


                            </div>
                            <div class="md:col-span-5">

                            </div>
                            <div class="md:col-span-5">
                                <label for="costo_x_art">Costo por articulo</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                            height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    <input type="number" id="costo_x_art" name="costo_x_art" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Costo por articulo">
                                </div>
                            </div>
                            <div class="md:col-span-5">
                                <label for="costo_x_art">Categoria</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                            height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    <select name="categoria_id"
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccionar Categoria </option>
                                        @foreach ($categoria as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="md:col-span-5 mt-2">
                                <div class=" flex items-end justify-between gap-2 ">
                                    <label for="especificacion">Especificacion </label>
                                    <button type="button" id="AddEspecifiacion"
                                        class="text-blue-500 hover:underline focus:outline-none font-medium">
                                        Agregar Especificacion
                                    </button>
                                </div>

                                <div class="flex gap-2">
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="specifications-1" name="tittle-1" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tutulo">

                                    </div>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="specifications" name="specifications-1"
                                            value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Valor">

                                    </div>
                                </div>


                            </div>


                            <div class="md:col-span-5">
                                <label for="producto">Atributos</label>
                                <div class="flex gap-2 mt-2 relative mb-2 ">
                                    @foreach ($atributos as $item)
                                        <div href="#"
                                            class="w-[300px] !important block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">


                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $item->titulo }}
                                            </h5>
                                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                                {{ $item->descripcion }}</p>
                                            @foreach ($valorAtributo as $value)
                                                @if ($value->attribute_id == $item->id)
                                                    <div class="flex items-center mb-2 ">
                                                        <input type="checkbox"
                                                            id=" {{ $item->titulo }}:{{ $value->valor }} "
                                                            name="{{ $item->titulo }}:{{ $value->valor }}"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for=" {{ $item->titulo }}:{{ $value->valor }} "
                                                            class="ml-2">{{ $value->valor }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @if ($item->imagen)
                                                <img src="{{ asset($item->imagen) }}" class="rounded-lg mb-2 w-1/2"
                                                    alt="Imagen actual">
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div
                            class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                            <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                                Inventario</h4>
                            <div class="md:col-span-5 flex justify-between gap-4">

                                <div class="w-full">
                                    <label for="stock">Existencias

                                    </label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="number" id="stock" name="stock" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Product">


                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="peso">Peso

                                    </label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="number" id="peso" name="peso" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Peso">


                                    </div>
                                </div>


                            </div>
                        </div>

                        <div
                            class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                            <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                                Tags</h4>
                            <div class="md:col-span-5 flex justify-between gap-4">

                                <div class="w-full">
                                    <div class="relative mb-2  mt-2">
                                            <select id="tags_id" name="tags_id[]" multiple class="mt-1">
                                            <option value="">Seleccionar Tag </option>
                                                @foreach ($tags as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                    </div>

                  </div> 

                  <div class="md:col-span-5 text-right mt-6 flex justify-between px-4 pb-4">
                      <div class="inline-flex items-end">
                          <a href="{{ URL::previous() }}"
                              class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                      </div>
                      <div class="inline-flex items-end">
                          <button type="submit"
                              class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                              Guardar producto
                          </button>
                      </div>
                  </div>

                </div>
                
                

            </div>
            
        </form>


    </div>
    <script>
        $('#tags_id').select2({
        placeholder: 'Seleccionar Tag...',
        });
        // Obtener los enlaces de pestaña
        const generalTab = document.getElementById('general-tab');
        const attributesTab = document.getElementById('attributes-tab');

        // Obtener los contenedores de contenido
        const generalContent = document.getElementById('general');
        const attributesContent = document.getElementById('Attributes');

        // Agregar event listeners para los enlaces de pestaña
        generalTab.addEventListener('click', function(event) {
            generalTab.classList.add('active', 'dark:bg-slate-900')
            attributesTab.classList.remove('active', 'dark:bg-slate-900')
            // Ocultar el contenido de Attributes
            attributesContent.classList.add('hidden');
            // Mostrar el contenido de General
            generalContent.classList.remove('hidden');
        });

        attributesTab.addEventListener('click', function(event) {
            generalTab.classList.remove('active', 'dark:bg-slate-900')
            attributesTab.classList.add('active', 'dark:bg-slate-900')
            // Ocultar el contenido de General
            generalContent.classList.add('hidden');
            // Mostrar el contenido de Attributes
            attributesContent.classList.remove('hidden');
        });
    </script>



    <script>
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function agregarElementos(elemento, valorInput, name) {
            elemento.setAttribute("type", "text");
            elemento.setAttribute("name", `${name}-${valorInput}`);
            elemento.setAttribute("placeholder", `${capitalizeFirstLetter(name)}`);
            elemento.setAttribute("id", `${name}-${valorInput}`);
            elemento.setAttribute("id", `${name}-${valorInput}`);
            elemento.setAttribute("id", `${name}-${valorInput}`);

            elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
                "rounded-lg",
                "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "pl-10", "p-2.5",
                "dark:bg-gray-700",
                "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
                "dark:focus:ring-blue-500",
                "dark:focus:border-blue-500");

            return elemento
        }
        $('document').ready(function() {
            let valorInput = 1

            tinymce.init({
                selector: 'textarea#description',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'table'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px;}'
            });

            $("#AddEspecifiacion").on('click', function(e) {
                e.preventDefault()
                valorInput++
                console.log('agregando especificacion')
                const addButton = document.getElementById("AddEspecifiacion");
                const divFlex = document.createElement("div");
                const dRelative = document.createElement("div");
                const dRelative2 = document.createElement("div");

                divFlex.classList.add('flex', 'gap-2')
                dRelative.classList.add('relative', 'mb-2', 'mt-2')
                dRelative2.classList.add('relative', 'mb-2', 'mt-2')

                const iconContainer = document.createElement("div");
                const icon = `<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0"
                      y="0" viewBox="0 0 469.336 469.336" style="enable-background:new 0 0 512 512"
                      xml:space="preserve" class="">
                      <g>
                        <path
                          d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                          fill="#9F9F9F" opacity="1" data-original="#000000" class=""></path>
                      </g>
                    </svg>
                  </div>`
                iconContainer.innerHTML = icon;

                // Obtener el nodo del icono
                const iconNode = iconContainer.firstChild;



                const inputTittle = document.createElement("input");
                const inputValue = document.createElement("input");

                let inputT = agregarElementos(inputTittle, valorInput, 'tittle')
                let inputV = agregarElementos(inputValue, valorInput, 'specifications')


                dRelative.appendChild(inputT);
                dRelative2.appendChild(inputV);


                // Agregar el icono como primer hijo de dRelative
                dRelative.insertBefore(iconNode, inputT);

                // Clonar el nodo del icono para agregarlo como primer hijo de dRelative2
                const iconNodeCloned = iconNode.cloneNode(true);
                dRelative2.insertBefore(iconNodeCloned, inputV);


                divFlex.appendChild(dRelative);
                divFlex.appendChild(dRelative2);

                const parentContainer = addButton.parentElement
                    .parentElement; // Obtener el contenedor padre
                parentContainer.insertBefore(divFlex, addButton.parentElement
                    .nextSibling); // Insertar el input antes del siguiente elemento después del botón



            })


            // Note that the name "myFormDropzone" is the camelized
            // id of the form.
            /* Dropzone.options.myFormDropzone = {
                    // Configuration options go here
                  };
             */


            Dropzone.options.myFormDropzone = {
                autoProcessQueue: false,
                uploadMultiple: true,
                maxFilezise: 10,
                maxFiles: 4,
            }
        })
    </script>
    <script>
        const pickr = Pickr.create({
            el: '#colorPicker', // Selector CSS del input
            theme: 'classic', // Tema de Pickr
            default: '#000000', // Color por defecto
            swatches: [ // Colores de muestra
                '#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF'
            ],
            components: {
                preview: true, // Mostrar vista previa
                opacity: true, // Habilitar control de opacidad
                hue: true, // Habilitar control de matiz
                interaction: {
                    input: true, // Permitir entrada manual
                    hex: true,
                    save: true // Permitir guardar
                }
            }
        });
        pickr.on('save', (color, instance) => {

            document.getElementById('color').value = color.toHEXA().toString();

        })
    </script>
    <script>
        function toggleMenu() {
            console.log('cambiando toggle')
            var menuItems = document.getElementById('menu-items');
            var isExpanded = menuItems.classList.contains('hidden');
            menuItems.classList.toggle('hidden', !isExpanded);
            document.getElementById('menu-button').setAttribute('aria-expanded', !isExpanded);
        }
    </script>



</x-app-layout>
