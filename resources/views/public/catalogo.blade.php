@extends('components.public.matrix')

@section('css_importados')

@stop


@section('content')

  <div class="w-full md:w-11/12 md:mx-auto">
    <div style="background-image: url('{{ asset('images/img/header_catalogo.png') }}')"
      class="bg-cover bg-center bg-no-repeat min-h-[600px] flex flex-col justify-center items-center">
      <div class="flex justify-start py-10 md:py-16 w-11/12 mx-auto">
        <div class="text-white font-poppins flex flex-col gap-10 text-center">
          <h1 class="font-semibold text-[32px] md:text-[48px] leading-none md:leading-tight">
            Armo Tu Proyecto Con Deco Tab
          </h1>
          <p class="font-normal text-[16px] md:text-[18px]">
            Descubre la variedad de productos que tenemos para ti. Contamos con la mejor calidad en Wall Panel, Paneles de
            Piedra Cincelada, UV Mármol y más. ¡Te ayudaremos a crear un entorno más acogedor y confortable!
          </p>
        </div>
      </div>
    </div>
  </div>

  <main class="z-[70]">
    <div class="flex flex-col md:flex-row md:gap-10 w-11/12 mx-auto mt-10 font-poppins">
      <aside class="flex flex-col gap-5">
        <div class="flex gap-3 open">
          <div>
            <img src="{{ asset('images/svg/catalogo_filtro_icon.svg') }}" alt="logo_filtros" />
          </div>
          <p class="font-semibold text-[20px]">Filtros</p>
        </div>

        <div class="hidden-categoria-precio">
          <div class="hidden md:flex flex-col gap-5 show-categoria-precio">
            <div class="flex flex-col gap-5">
              <p class="font-semibold text-[16px]">Categorías</p>
              <a href="/catalogo/0"
                class="{{ $filtro == 0 ? 'font-semibold text-[14px] underline' : 'text-[#6C7275]' }}">Todas</a>

              <div>
                <div
                  class="overflow-y-scroll lg:overflow-y-hidden flex flex-col h-[150px] lg:h-full scroll__categorias items-start font-semibol text-[14px] text-[#6C7275] gap-2">
                  <ul class="flex flex-col gap-2">

                    @foreach ($categorias as $item)
                      <a href="/catalogo/{{ $item->id }}">
                        <li
                          class="w-full mr-44 cursor-pointer @if ($filtro == 0) @else

                                             {{ $item->id == $categoria->id ? 'font-semibold text-[14px] underline text-black' : '' }} @endif ">
                          {{ $item->name }}</li>
                      </a>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            {{--   --}}
            {{-- <div class="flex flex-col gap-5">
              <p class="font-semibold text-[16px]">Precio</p>
              <a href="#" class="font-semibold text-[14px] underline">Todos los precios</a>
              <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">

                  <a href="/catalogo/{{ $filtro }}?rangefrom=0&rangeto=99.99">
                    <li
                      class=" text-[14px] list-none
                                        
                                        @if ($rangefrom == 0 && $rangeto == 99.99) font-semibold
                                        @else
                                            font-normal @endif
                                        
                                        "
                      for="precio_0">s/ 0.00 - s/99.99</li>
                  </a>
              
                </div>
                <div class="flex justify-between items-center">
                  <a href="/catalogo/{{ $filtro }}/?rangefrom=100&rangeto=199.99">
                    <li
                      class="text-[14px] list-none
                                        @if ($rangefrom == 100 && $rangeto == 199.99) font-semibold
                                        @else
                                            font-normal @endif
                                        "
                      for="precio_1">s/ 100.00 - s/199.99</li>
                  </a>
                 
                </div>

                <div class="flex justify-between items-center">
                  <a href="/catalogo/{{ $filtro }}/?rangefrom=200&rangeto=299.99">
                    <li
                      class="text-[14px] list-none

                                        @if ($rangefrom == 200 && $rangeto == 299.99) font-semibold
                                        @else
                                            font-normal @endif

                                        "
                      for="precio_2">s/ 200.00 - s/299.99</li>
                  </a>
                 
                </div>

                <div class="flex justify-between items-center">
                  <a href="/catalogo/{{ $filtro }}/?rangefrom=300&rangeto=399.99">
                    <li
                      class="text-[14px] list-none
                                    
                                    @if ($rangefrom == 300 && $rangeto == 399.99) font-semibold
                                    @else
                                        font-normal @endif

                                    "
                      for="precio_3">s/ 300.00 - s/399.99</li>
                  </a>
                 
                </div>

                <div class="flex justify-between items-center">
                  <a href="/catalogo/{{ $filtro }}/?rangefrom=400&rangeto=100000">
                    <li
                      class="text-[14px] list-none
                                     @if ($rangefrom == 400 && $rangeto == 100000) font-semibold
                                    @else
                                        font-normal @endif
                                        "
                      for="precio_4">s/ 400.00 +</li>
                  </a>
                  
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </aside>
      <!-- modal filtros -->
      <!-- <a class="mostrar-modal">Filtrossss</a> -->
      <div class="modal-filtros z-[100]">
        <div class="modal__mostrar-filtro">
          <div class="flex justify-end">
            <a href="#" class="modal__close-filtro">
              <img src="{{ asset('/images/svg/close.svg') }}" alt="close" />
            </a>
          </div>

          <div class="addCategoriaPrecio"></div>
        </div>
      </div>
      <!-- --- -->
      <section class="font-poppins my-10 w-full">
        <div class="flex flex-col gap-2">

          @if ($filtro == 0)
            <h2 class="font-medium text-[40px]">Productos</h2>
          @else
            <h2 class="font-medium text-[40px]">Productos - {{ $categoria->name }}</h2>
          @endif


          <p class="font-normal text-[18px]">
            En Deco Tab, somos especialistas en <b>Wall Panel</b>, <b>mármol UV</b> y <b>piedra PU</b>. Revisa las mejores
            imágenes y precios de estos productos que son la mejor opción para decorar tus ambientes.
          </p>
        </div>

        <!-- GRILLA PRODUCTOS -->
        <div>
          <div class="grid grid-cols-2 lg:grid-cols-3 my-5 gap-10">

            @foreach ($productos as $item)
              <div class="flex flex-col relative">

                <div
                  class="bg-colorBackgroundProducts rounded-2xl py-12 md:pb-8 px-5 product_container basis-4/5 flex flex-col justify-center relative">
                  <a
                    class=" font-semibold text-[8px] lg:text-[12px] bg-[#EB5D2C] py-2 px-2 flex-initial w-24 text-center text-white rounded-[5px] absolute top-[18px]">
                    Nuevo
                  </a>
                  <div>
                    <div class="relative">
                      {{-- <img src="{{ asset($item->imagen) }}" alt="cusco" class="w-full h-[100%]" /> --}}
                      @if ($item->imagen)
                        <img src="{{ asset($item->imagen) }}" alt="{{ $item->name }}"
                          class="w-full h-30 object-contain py-10" />
                      @else
                        <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                          class="w-full h-30 object-contain py-10" />
                      @endif
                    </div>

                    <!-- ------ -->
                    <div class="addProduct2 text-center flex justify-center">
                      <a href="{{ route('producto', $item->id) }}"
                        class="font-semibold text-[10px] xl:text-[16px] bg-[#74A68D] px-1 py-2 md:py-3 lg:px-5 flex-initial w-52 text-center text-white rounded-3xl">
                        Ver producto
                      </a>
                    </div>
                  </div>
                </div>

                <div class="my-2 flex flex-col items-start gap-2 basis-1/5 -mt-6">
                  <div class="flex items-center gap-2 ">
                    <div class="flex gap-2 py-6 ">
                      {{-- <img src="./images/svg/start.svg" alt="estrella" />
                                            <img src="./images/svg/start.svg" alt="estrella" />
                                            <img src="./images/svg/start.svg" alt="estrella" />
                                            <img src="./images/svg/start_sin_color.svg" alt="estrella" />
                                            <img src="./images/svg/start_sin_color.svg" alt="estrella" /> --}}
                    </div>
                    {{-- <p class="font-semibold text-[14px] text-[#6C7275]">(35)</p> --}}
                  </div>
                  <h2 class="font-semibold text-[16px] text-[#141718]">
                    {{ $item->producto }}
                  </h2>
                  <p class="font-semibold text-[14px] text-[#121212] flex gap-5 ">
                    @if ($item->descuento == 0)
                      <span>{{ $item->precio }}</span>
                    @else
                      <span>{{ $item->descuento }}</span>
                      <span class="font-normal text-[14px] text-[#6C7275] line-through">{{ $item->precio }}</span>
                    @endif
                  </p>
                </div>

              </div>
            @endforeach

          </div>
        </div>

        <div class="flex justify-center items-center mt-12">

          {{ $productos->appends(['rangefrom' => $rangefrom, 'rangeto' => $rangeto])->links() }}

          {{-- <a href="catalogo.html"
                        class="font-semibold text-[16px] bg-white md:duration-500 py-4 px-5 rounded-3xl border-[1px] border-colorBorder flex-initial text-center w-full md:w-56">
                        Cargar más
                    </a> --}}
        </div>
      </section>
    </div>

    <!-- FAQS -->

    @if ($faqs->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes faqs visibles</div>
            </div> --}}
    @else
      <section class="my-12">
        <div class="bg-[#F5F5F5] font-poppins">
          <div class="relative bg-[#F5F5F5] px-6 pt-10 pb-8 mt-8 ring-gray-900/5 sm:mx-auto sm:rounded-lg sm:px-10">
            <div class="mx-auto px-5">
              <div class="flex flex-col items-center">
                <h2 class="font-semibold text-[40px] text-[#151515] text-center leading-none md:leading-tight">
                  Preguntas Frecuentes
                </h2>
              </div>
              <div class="mx-auto mt-8 grid max-w-[900px] divide-y divide-neutral-200">

                @foreach ($faqs as $faq)
                  <div class="py-5">
                    <details class="group">
                      <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                        <span class="font-bold text-[20px] text-[#151515]">
                          {!! $faq->pregunta !!}</span>
                        <span class="transition group-open:rotate-180">
                          <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                              stroke="#EB5D2C" stroke-width="3.33333" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </span>
                      </summary>
                      <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                        {{ $faq->respuesta }}
                      </p>
                    </details>
                  </div>
                @endforeach


              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    @endif


    <!-- Testimonios -->

    @if ($testimonie->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes testimonios visibles</div>
            </div> --}}
    @else
      <section class="font-poppins text-[#151515] w-full testimoniosRelative">
        <h2 class="w-11/12 mx-auto font-semibold text-[40px] text-center md:text-left">
          Testimonios
        </h2>

        <div class="swiper myTestimonios mt-5">
          <div class="swiper-pagination-testimonios"></div>
          <div class="swiper-wrapper mb-12 md:mt-[80px]">
            @foreach ($testimonie as $item)
              <div class="swiper-slide">
                <div class="carousel-cell bg-[#F5F5F5] p-10">
                  {{-- <div class="flex gap-2 py-2">
                                <img src="./images/svg/start.svg" alt="estrella" />
                                <img src="./images/svg/start.svg" alt="estrella" />
                                <img src="./images/svg/start_sin_color.svg" alt="estrella" />
                                <img src="./images/svg/start_sin_color.svg" alt="estrella" />
                            </div> --}}
                  <div class="flex gap-5 items-center">
                    <p class="font-bold text-[20px]">{{ $item->name }}</p>
                    <img src="{{ asset('/images/svg/check.svg') }}" alt="check" />
                  </div>
                  <p class="font-normal text-[16px]">
                    {{ $item->testimonie }}
                  </p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>

    @endif


  </main>


@section('scripts_importados')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Captura el click de abrir
      /*  const openModal = document.querySelector(".mostrar-modal"); */
      // Captura al modal que se quiere mostrar
      const modal = document.querySelector(".modal-filtros");
      //Captura el evento de cierre
      const closeModal = document.querySelector(".modal__close-filtro");
      // Captura el body para bloqueo
      const body = document.querySelector(".body");

      const hiddenCategoriaPrecio = document.querySelector(
        ".hidden-categoria-precio"
      );

      const open = document.querySelector(".open");
      const showCategoriaPrecio = document.querySelector(".show-categoria-precio");
      const addCategoriaPrecio = document.querySelector(".addCategoriaPrecio");
      let openModal = null;

      function getWidth() {
        // Corregir el modal !importante
        let width = window.innerWidth;
        if (width < 768) {
          //Habilita el click para modal
          open.classList.add("mostrar-modal", "cursor-pointer");
          openModal = document.querySelector(".mostrar-modal");
          openModal.addEventListener("click", showModal);
          hiddenCategoriaPrecio.innerHTML = "";
        } else {
          // Quita la opcion de click
          open.classList.remove("mostrar-modal", "cursor-pointer");
          if (openModal) {
            openModal.removeEventListener("click", showModal);
            showCategoriaPrecio.classList.remove("hidden");
            hiddenCategoriaPrecio.innerHTML = showCategoriaPrecio.innerHTML;
          }
        }
      }

      function showModal(e) {
        e.preventDefault();

        addCategoriaPrecio.innerHTML = showCategoriaPrecio.innerHTML;
        hiddenCategoriaPrecio.innerHTML = "";

        modal.classList.add("modal--show-filtro");
        body.classList.add("overflow-hidden");
        
        modal.style.display = "flex";
      }

      getWidth(); // Se ejecuta por primera vez
      window.addEventListener("resize", getWidth);

      closeModal.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.remove("modal--show-filtro");
        body.classList.remove("overflow-hidden");
      });

      // Función para cerrar el modal
      function closeModa(event) {
        if (event.target === modal) {
          modal.classList.remove("modal--show-filtro");
          body.classList.remove("overflow-hidden");

          /* hiddenCategoriaPrecio.innerHTML = addCategoriaPrecio.innerHTML; */
        }
      }

      window.addEventListener("click", closeModa);
    });
  </script>

  <script>
    $(document).ready(function() {


      function capitalizeFirstLetter(string) {
        string = string.toLowerCase()
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    })
    $('#disminuir').on('click', function() {
      console.log('disminuyendo')
      let cantidad = Number($('#cantidadSpan span').text())
      if (cantidad > 0) {
        cantidad--
        $('#cantidadSpan span').text(cantidad)
      }


    })
    // cantidadSpan
    $('#aumentar').on('click', function() {
      console.log('aumentando')
      let cantidad = Number($('#cantidadSpan span').text())
      cantidad++
      $('#cantidadSpan span').text(cantidad)

    })
  </script>
  <script>
    let articulosCarrito = [];


    function deleteOnCarBtn(id, operacion) {
      console.log('Elimino un elemento del carrito');
      console.log(id, operacion)
      const prodRepetido = articulosCarrito.map(item => {
        if (item.id === id && item.cantidad > 0) {
          item.cantidad -= Number(1);
          return item; // retorna el objeto actualizado 
        } else {
          return item; // retorna los objetos que no son duplicados 
        }

      });
      Local.set('carrito', articulosCarrito)
      limpiarHTML()
      PintarCarrito()


    }

    function calcularTotal() {
      let articulos = Local.get('carrito')
      console.log(articulos)
      let total = articulos.map(item => {
        let monto
        if (Number(item.descuento) !== 0) {
          monto = item.cantidad * Number(item.descuento)
        } else {
          monto = item.cantidad * Number(item.precio)

        }
        return monto

      })
      const suma = total.reduce((total, elemento) => total + elemento, 0);

      $('#itemsTotal').text(`S/. ${suma} `)

    }

    function addOnCarBtn(id, operacion) {
      console.log('agrego un elemento del cvarrio');
      console.log(id, operacion)

      const prodRepetido = articulosCarrito.map(item => {
        if (item.id === id) {
          item.cantidad += Number(1);
          return item; // retorna el objeto actualizado 
        } else {
          return item; // retorna los objetos que no son duplicados 
        }

      });
      console.log(articulosCarrito)
      Local.set('carrito', articulosCarrito)
      // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
      limpiarHTML()
      PintarCarrito()


    }

    function deleteItem(id) {
      console.log('borrando elemento')
      articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

      Local.set('carrito', articulosCarrito)
      limpiarHTML()
      PintarCarrito()
    }

    var appUrl = <?php echo json_encode($url_env); ?>;
    console.log(appUrl);
    $(document).ready(function() {
      articulosCarrito = Local.get('carrito') || [];

      PintarCarrito();
    });

    function limpiarHTML() {
      //forma lenta 
      /* contenedorCarrito.innerHTML=''; */
      $('#itemsCarrito').html('')


    }



    function PintarCarrito() {
      console.log('pintando carrito ')

      let itemsCarrito = $('#itemsCarrito')

      articulosCarrito.forEach(element => {
        let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
          <div class="flex justify-center items-center gap-5">
            <div class="bg-[#F3F5F7] rounded-md p-4">
              <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
            </div>
            <div class="flex flex-col gap-3 py-2">
              <h3 class="font-semibold text-[14px] text-[#151515]">
                ${element.producto}
              </h3>
              <p class="font-normal text-[12px] text-[#6C7275]">
                
              </p>
              <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
                <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
                  <span  class="text-[20px]">-</span>
                </button>
                <div class="w-8 h-8 flex justify-center items-center">
                  <span  class="font-semibold text-[12px]">${element.cantidad }</span>
                </div>
                <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
                  <span class="text-[20px]">+</span>
                </button>
              </div>
            </div>
          </div>
          <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
            <p class="font-semibold text-[14px] text-[#151515]">
              S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
            </p>
            <div class="flex items-center">
              <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
              </button>

            </div>
          </div>
        </div>`

        itemsCarrito.append(plantilla)

      });

      calcularTotal()
    }






    $('#btnAgregarCarrito').on('click', function() {
      let url = window.location.href;
      let partesURl = url.split('/')
      let item = partesURl[partesURl.length - 1]
      let cantidad = Number($('#cantidadSpan span').text())
      item = item.replace('#', '')



      // id='nodescuento'


      $.ajax({

        url: `{{ route('carrito.buscarProducto') }}`,
        method: 'POST',
        data: {
          _token: $('input[name="_token"]').val(),
          id: item,
          cantidad

        },
        success: function(success) {
          console.log(success)
          let {
            producto,
            id,
            descuento,
            precio,
            imagen,
            color
          } = success.data
          let cantidad = Number(success.cantidad)
          let detalleProducto = {
            id,
            producto,
            descuento,
            precio,
            imagen,
            cantidad,
            color

          }
          let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
          if (existeArticulo) {
            //sumar al articulo actual 
            const prodRepetido = articulosCarrito.map(item => {
              if (item.id === detalleProducto.id) {
                item.cantidad += Number(detalleProducto.cantidad);
                return item; // retorna el objeto actualizado 
              } else {
                return item; // retorna los objetos que no son duplicados 
              }

            });
          } else {
            articulosCarrito = [...articulosCarrito, detalleProducto]

          }

          Local.set('carrito', articulosCarrito)
          let itemsCarrito = $('#itemsCarrito')
          let ItemssubTotal = $('#ItemssubTotal')
          let itemsTotal = $('#itemsTotal')
          limpiarHTML()
          PintarCarrito()

        },
        error: function(error) {
          console.log(error)
        }

      })



      // articulosCarrito = {...articulosCarrito , detalleProducto }
    })
    $('#openCarrito').on('click', function() {
      console.log('abriendo carrito ');
      $('.main').addClass('blur')
    })
    $('#closeCarrito').on('click', function() {
      console.log('cerrando  carrito ');

      $('.cartContainer').addClass('hidden')
      $('#check').prop('checked', false);
      $('.main').removeClass('blur')


    })
  </script>

  <script src="{{ asset('js/storage.extend.js') }}"></script>


@stop

@stop
