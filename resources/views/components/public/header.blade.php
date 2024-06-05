<div class="navigation z-20">
  <button aria-label="hamburguer" type="button" class="hamburger" id="position" onclick="show()">
    <!-- <div id="bar1" class="bar"></div>
      <div id="bar2" class="bar"></div>
      <div id="bar3" class="bar"></div> -->

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 2L2 18M18 18L2 2" stroke="white" stroke-width="2.66667" stroke-linecap="round" />
        </svg>
    </button>
    <nav class="menu-list">
        <ul>
            <li>
                <a href="/" class="{{$pagina == 'index' ? 'text-[#FF5E14]' : ''}}">Home</a>
            </li>
            <li>
                <a href="{{ route('catalogo', 0) }}" >Catálogo</a>
            </li>
            <li>
                <a href="{{ route('contacto') }}" class="{{$pagina == 'contacto' ? 'text-[#FF5E14] ' : ''}}">Contacto</a>
            </li>
            <li>
                <a href="{{ route('comentario') }}" class="">Comentar</a>
            </li>
        </ul>
    </nav>
</div>


<header>
  <div class="absolute z-10 md:hidden top-[65px] left-[10px]">

    <button aria-label="hamburguer" class="hamburger" onclick="show()">
      <img src="{{ asset('images/img/menu_hamburguer.png') }}" alt="menu hamburguesa" class="w-44" />
    </button>

    </div>
    @foreach ($datosgenerales as $item)
        <div class="bg-colorBackgroundHeader">
            <div class="flex justify-center md:justify-end gap-5 w-11/12 mx-auto py-4">
                <div class="text-white font-normal font-poppins text-[14px] text-center w-full">
                    {{ $item->htop }}
                </div>
            </div>
        </div>
    @endforeach
    <div>
        <div class="flex justify-between items-center w-11/12 mx-auto my-5">
            <div class="hidden md:block">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('images/svg/logo_decotab_header.svg') }}" alt="decotab" />
                </a>

        <!--  <p class="font-medium text-[24px] font-poppins">DecoTab</p> -->
      </div>
      <div class="hidden md:block">
        <div>
          <nav class="text-black flex gap-5">
            <a href="{{ route('index') }}" class="font-medium font-poppins text-[14px]  hover:bg-slate-300 {{$pagina == 'index' ? 'text-[#FF5E14]' : ''}}">Home
            </a>
            <a href="{{ route('catalogo', 0) }}"
              class="font-medium font-poppins text-[14px] hover:bg-slate-300 {{$pagina == 'catalogo' ? 'text-[#FF5E14]' : ''}}">Catálogo
            </a>
            <a href="{{ route('contacto') }}" class="font-medium font-poppins text-[14px] hover:bg-slate-300 {{$pagina == 'contacto' ? 'text-[#FF5E14]' : ''}}">Contacto
            </a>

            <a href="{{ route('comentario') }}" class="font-medium font-poppins text-[14px] hover:bg-slate-300 {{$pagina == 'comentario' ? 'text-[#FF5E14]' : ''}}">Comentar
            </a>
          </nav>
        </div>

        <!-- <div class="sm:hidden">
            <button
              aria-label="hamburguer"
              class="hamburger"
              onclick="show()"
            >
              <div id="bar1" class="bar"></div>
              <div id="bar2" class="bar"></div>
              <div id="bar3" class="bar"></div>
            </button>
          </div> -->
      </div>

      <div class="flex justify-end w-full md:w-auto md:justify-center items-center gap-5">
        {{-- <a href="{{route('catalogo')}}"><img src="{{ asset('images/svg/search_header.svg') }}" alt="buscar" /></a> --}}
        @if (Auth::user() == null)
          <a href="{{ route('login') }}"><img src="{{ asset('images/svg/header_user.svg') }}" alt="user" /></a>
        @else
          <div class="relative inline-flex" x-data="{ open: false }">
            <button class="inline-flex justify-center items-center group" aria-haspopup="true"
              @click.prevent="open = !open" :aria-expanded="open">
              <div class="flex items-center truncate">
                <span
                  class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">{{ Auth::user()->name }}</span>
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                  <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
              </div>
            </button>
            <div
              class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
              @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
              <ul>
                <li class="hover:bg-gray-100">
                  <a class="font-medium text-sm text-black flex items-center py-1 px-3" href="{{ route('pedidos') }}"
                    @click="open = false" @focus="open = true" @focusout="open = false">Mis pedidos</a>
                </li>
                <li class="hover:bg-gray-100">
                  <a class="font-medium text-sm text-black flex items-center py-1 px-3" href="{{ route('direccion') }}"
                    @click="open = false" @focus="open = true" @focusout="open = false">Dirección</a>
                </li>
                <li class="hover:bg-gray-100">
                  <a class="font-medium text-sm text-black flex items-center py-1 px-3" href="{{ route('micuenta') }}"
                    @click="open = false" @focus="open = true" @focusout="open = false">Ajustes</a>
                </li>
                <li class="hover:bg-gray-100">
                  <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" class="font-medium text-sm text-black flex items-center py-1 px-3"
                      href="{{ route('logout') }}" @click.prevent="$root.submit(); open = false">
                      {{ __('Cerrar sesión') }}
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        @endif







        <div class="bg-[#EB5D2C] flex justify-center items-center rounded-full w-7 h-7">
          <span id="itemsCount" class="text-white"></span>
        </div>

        <div class="flex justify-center items-center pl-2">
          <label for="check" class="inline-block cursor-pointer">
            <img src="{{ asset('images/svg/header_bag.svg') }}" alt="bag"
              class="max-w-full h-auto cursor-pointer" id="openCarrito" />
          </label>
          <!-- ----- carritos  148 sad -->

          <input type="checkbox" class="bag__modal" id="check" />
          <!-- bag hidden  absolute -->
          <div
            class="bag hidden absolute top-0 right-0 z-[200] md:w-[450px] cartContainer border  shadow-2xl rounded-xl  ">
            <!-- class="h-screen overflow-y-scroll " -->
            <div class="p-4 flex flex-col h-screen justify-between">
              <div class="flex justify-between ">
                <h2 class="font-medium text-[28px] text-[#151515] pb-5">
                  Carrito
                </h2>
                <div id="closeCarrito" class="cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>

                </div>


              </div>

              <div>

              </div>
              <div class="overflow-y-scroll h-auto scroll__carrito">
                <div class="flex flex-col gap-10" id="itemsCarrito">



                </div>
              </div>

              <div class="font-poppins flex flex-col gap-2 pt-24">

                <div class="text-[#141718] font-medium text-[20px] flex justify-between items-center">
                  <p>Total</p>
                  <p id="itemsTotal">S/ 0.00</p>
                </div>
                <div>
                  <a href="/carrito"
                    class="font-semibold text-base bg-[#74A68D] py-3 px-5 rounded-2xl text-white cursor-pointer w-full inline-block text-center">
                    Checkout
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<script>
  function mostrarTotalItems() {
    let articulos = Local.get('carrito')
    let contarArticulos = articulos.reduce((total, articulo) => {
      return total + articulo.cantidad;
    }, 0);

    $('#itemsCount').text(contarArticulos)
  }
  $(document).ready(function() {
    mostrarTotalItems()
  })
</script>
<script src="{{ asset('js/storage.extend.js') }}"></script>
