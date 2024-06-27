<x-app-layout>


  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $product->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">

          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if (!$product->id)
              Nuevo producto
            @else
              Actualizar producto - {{ $product->producto }}
            @endif
          </h2>
        </header>
        <div class="flex flex-col gap-2 p-3 ">
          <div class="flex gap-2 p-3 ">

            <div class="basis-0 md:basis-3/5">
              <div class="rounded shadow-lg p-4 px-4 border">


                <div id='general' class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 ">

                  <div class="md:col-span-5">

                    <label for="producto">Producto</label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="text" id="producto" name="producto" value="{{ $product->producto }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Producto">


                    </div>
                  </div>
                  <div class="md:col-span-5 mt-2">

                    <label for="extract">Extracto</label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="text" id="extract" name="extract" value="{{ $product->extract }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Extracto">


                    </div>
                  </div>
                  <div class="md:col-span-5">
                    <label for="description">Descripcion</label>
                    <div class="relative mb-2 mt-2">
                      <textarea type="text" rows="2" id="description" name="description" value=""
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción">{{ $product->description }}</textarea>
                    </div>
                  </div>

                  <div class="md:col-span-5 flex items-center justify-center ">
                    <div x-data="{ showAmbiente: false }" @mouseenter="showAmbiente = true" @mouseleave="showAmbiente = false"
                      class="relative flex justify-center items-center h-[300px] w-[240px] border rounded-lg">
                      @if ($product->imagen)
                        <img id="imagen_previewer" x-show="!showAmbiente"
                          x-transition:enter="transition ease-out duration-300 transform"
                          x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-300 transform"
                          x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                          src="{{ asset($product->imagen) }}" alt="{{ $product->name }}"
                          class="w-full h-full object-contain absolute inset-0 rounded-lg" />
                      @else
                        <img id="imagen_previewer" x-show="!showAmbiente"
                          x-transition:enter="transition ease-out duration-300 transform"
                          x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-300 transform"
                          x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                          src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                          class="w-full h-full object-contain absolute inset-0 rounded-lg" />
                      @endif
                      @if ($product->imagen_ambiente)
                        <img id="imagen_ambiente_previewer" x-show="showAmbiente"
                          x-transition:enter="transition ease-out duration-300 transform"
                          x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-300 transform"
                          x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                          src="{{ asset($product->imagen_ambiente) }}" alt="{{ $product->name }}"
                          class="w-full h-full object-cover absolute inset-0 rounded-lg" />
                      @else
                        <img id="imagen_ambiente_previewer" x-show="showAmbiente"
                          x-transition:enter="transition ease-out duration-300 transform"
                          x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-300 transform"
                          x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                          src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                          class="w-full h-full object-cover absolute inset-0 rounded-lg" />
                      @endif
                    </div>
                  </div>

                  <div class="md:col-span-5">
                    <label class="block mb-1" for="imagen">Imagen del producto</label>
                    <input id="imagen" name="imagen"
                      class="mb-2 p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <label class="block mb-1" for="imagen_ambiente">Imagen de ambiente</label>
                    <input id="imagen_ambiente" name="imagen_ambiente"
                      class="mb-2 p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      aria-describedby="user_avatar_help" id="user_avatar" type="file">
                  </div>
                </div>
              </div>
            </div>
            <div class="basis-0 md:basis-2/5">
              <div
                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border mb-2">
                <div class="md:col-span-5 flex flex-wrap flex-4 justify-between">
                  <label class="inline-flex items-center cursor-pointer mb-2">
                    <input id="destacar" name="destacar" type="checkbox" class="sr-only peer"
                      {{ $product->destacar ? 'checked' : '' }}>
                    <div
                      class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Destacar</span>
                  </label>
                  <label class="inline-flex items-center cursor-pointer mb-2">
                    <input id="recomendar" name="recomendar" type="checkbox" class="sr-only peer"
                      {{ $product->recomendar ? 'checked' : '' }}>
                    <div
                      class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Recomendar</span>
                  </label>
                </div>
                <div class="md:col-span-5 flex justify-between gap-4">
                  <div class="w-full">
                    <label for="precio">Precio</label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="number" id="precio" name="precio" value="{{ $product->precio }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="precio">
                    </div>

                  </div>
                  <div class="w-full">
                    <label for="descuento">Precio con descuento</label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="number" id="descuento" name="descuento" value="{{ $product->descuento }}"
                        step="0.1"
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
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                    </div>
                    <input type="number" id="costo_x_art" name="costo_x_art" value="{{ $product->costo_x_art }}"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Costo por articulo">
                  </div>
                </div>
                <div class="md:col-span-5">
                  <label for="categoria_id">Categoria</label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                    </div>
                    <select id="categoria_id" name="categoria_id"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">Seleccionar Categoria </option>
                      @foreach ($categoria as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->categoria_id) selected @endif>
                          {{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="md:col-span-5">
                  <label for="subcategoria_id">Subcategoria</label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                    </div>
                    <select id="subcategoria_id" name="subcategoria_id"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">Seleccionar Categoria </option>
                      @foreach ($subcategories as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->categoria_id) selected @endif>
                          {{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="md:col-span-5 mt-2">
                  <div class=" flex items-end justify-between gap-2 ">
                    <label for="specifications">Especificaciones </label>
                    <button type="button" id="AddEspecifiacion"
                      class="text-blue-500 hover:underline focus:outline-none font-medium">
                      <i class="fa fa-plus"></i>
                      Agregar
                    </button>
                  </div>
                  @foreach ($especificacion as $key => $item)
                    @php
                      $counter = count($especificacion) - $key;
                    @endphp
                    <div class="flex gap-2">
                      <div class="relative mb-2  mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" id="specifications" name="tittle-{{ $counter }}"
                          value="{{ $item->tittle }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Titulo">
                      </div>
                      <div class="relative mb-2  mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" id="specifications" name="specifications-{{ $counter }}"
                          value="{{ $item->specifications }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Especificacion">
                      </div>
                    </div>
                  @endforeach
                </div>


                <div class="md:col-span-5">
                  <label for="producto">Atributos</label>
                  <div class="flex gap-2 mt-2 relative mb-2 ">
                    @foreach ($atributos as $item)
                      <div href="#"
                        class="w-[300px] !important block px-3 py-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                          {{ $item->titulo }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">
                          {{ $item->descripcion }}</p>
                          <div class="flex flex-wrap gap-2">
                            @foreach ($valorAtributo as $value)
                              @if ($value->attribute_id == $item->id)
                                <div class="flex items-center mb-2 ">
                                  <input type="checkbox" id=" {{ $item->titulo }}:{{ $value->valor }} "
                                    name="{{ $item->titulo }}:{{ $value->valor }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for=" {{ $item->titulo }}:{{ $value->valor }} "
                                    class="ml-2">{{ $value->valor }}</label>
                                </div>
                              @endif
                            @endforeach
                          </div>
                        @if ($item->imagen)
                          <img src="{{ asset($item->imagen) }}" class="rounded-lg mb-2 w-1/2" alt="Imagen actual">
                        @endif

                      </div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div
                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border mb-2">
                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                  Inventario</h4>
                <div class="md:col-span-5 flex justify-between gap-4">

                  <div class="w-full">
                    <label for="stock">Existencias

                    </label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="number" id="stock" name="stock" value="{{ $product->stock }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product">


                    </div>
                  </div>
                  <div class="w-full">
                    <label for="peso">Peso

                    </label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="number" id="peso" name="peso" value="{{ $product->peso }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Peso">


                    </div>
                  </div>


                </div>
              </div>

              <div class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border">
                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                  Tags</h4>
                <div class="md:col-span-5 flex justify-between gap-4">

                  <div class="w-full">
                    <div class="relative mb-2  mt-2">
                      <select id="tags_id" name="tags_id[]" multiple class="mt-1 w-full">
                        <option value="">Seleccionar Tag </option>
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}" @if (in_array($tag->id, $product->tags->pluck('id')->toArray())) selected @endif>
                            {{ $tag->name }}</option>
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
              <a href="{{ route('products.index') }}"
                class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
            </div>
            <div class="inline-flex items-end">
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
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
      elemento.setAttribute("placeholder", `${name == 'tittle'? 'Titulo': 'Especificacion'}`);
      elemento.setAttribute("id", `specifications`);

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
      let valorInput = $('[id="specifications"]').length / 2

      tinymce.init({
        selector: 'textarea#description',
        height: 300,
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

        const addButton = document.getElementById("AddEspecifiacion");
        const divFlex = document.createElement("div");
        const dRelative = document.createElement("div");
        const dRelative2 = document.createElement("div");

        divFlex.classList.add('flex', 'gap-2')
        dRelative.classList.add('relative', 'mb-2', 'mt-2')
        dRelative2.classList.add('relative', 'mb-2', 'mt-2')

        const iconContainer = document.createElement("div");
        const icon = `<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
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


      // Dropzone.options.myFormDropzone = {
      //   autoProcessQueue: false,
      //   uploadMultiple: true,
      //   maxFilezise: 10,
      //   maxFiles: 4,
      // }
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
    $('#imagen').on('change', () => {
      const file = document.getElementById('imagen').files[0] ?? null
      const url = URL.createObjectURL(file)
      console.log(url)
      $('#imagen_previewer').attr('src', url)
    })
    $('#imagen_ambiente').on('change', () => {
      const file = document.getElementById('imagen_ambiente').files[0] ?? null
      const url = URL.createObjectURL(file)
      $('#imagen_ambiente_previewer').attr('src', url)
    })
  </script>
</x-app-layout>
