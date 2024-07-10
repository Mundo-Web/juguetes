@php
    $isIndex = Route::currentRouteName() == 'index';
@endphp

<style>
    nav a .underline-this {
        position: relative;
        overflow: hidden;
        display: inline-block;
        text-decoration: none;
        /* padding-bottom: 4px; */
    }

    nav a .underline-this::before,
    nav a .underline-this::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FF5E14;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    nav a .underline-this::after {
        transform-origin: right;
    }

    nav a:hover .underline-this::before,
    nav a:hover .underline-this::after {
        transform: scaleX(1);
    }

    nav a:hover .underline-this::before {
        transform-origin: left;
    }

    nav li {
        padding: 0 !important;
        margin: 0 !important;
    }

    .jquery-modal.blocker.current {
        z-index: 30;
    }
</style>

<div class="navigation shadow-xl" style="z-index: 9999; background-color: #fff !important">
  <button aria-label="hamburguer" type="button" class="hamburger" id="position" onclick="show()">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18 2L2 18M18 18L2 2" stroke="#272727" stroke-width="2.66667" stroke-linecap="round" />
    </svg>
  </button>
  <nav class="w-full h-full overflow-y-auto p-8" x-data="{ openCatalogo: true, openSubMenu: null }">
    <ul class="space-y-1">
      <li>
        <a href="/"
          class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'index' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Home
          </span>
        </a>
      </li>
      <li>
        <a @click="openCatalogo = !openCatalogo" href="javascript:void(0)"
          class="text-[#272727] flex justify-between items-center font-medium font-poppins text-sm py-2 px-3 hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'catalogo' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
              <path
                d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
              <path
                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
            </svg>
            Catalogo
          </span>
          <span :class="{ 'rotate-180': openCatalogo }"
            class="ms-1 inline-block transform transition-transform duration-300">↓</span>
        </a>
        <ul x-show="openCatalogo" x-transition class="ml-3 mt-1 space-y-1 border-l border-gray-300">
          <li>
            <a href="{{ route('catalogo.all') }}"
              class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
              <span class="underline-this">
                Todas las categorías
              </span>
            </a>
          </li>
          @foreach ($categorias as $category)
            @if (count($category->subcategories()))
              <li>
                <a @click="openSubMenu === {{ $category->id }} ? openSubMenu = null : openSubMenu = {{ $category->id }}"
                  href="javascript:void(0)"
                  class="text-[#272727] flex justify-between items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                  <span class="underline-this">
                    {{ $category->name }}
                  </span>
                  <span :class="{ 'rotate-180': openSubMenu === {{ $category->id }} }"
                    class="ms-1 inline-block transform transition-transform duration-300">↓</span>
                </a>
                <ul x-show="openSubMenu === {{ $category->id }}" x-transition
                  class="ml-3 mt-1 space-y-1 border-l border-gray-300">
                  <li>
                    <a href="/catalogo/{{ $category->slug }}"
                      class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                      <span class="underline-this">
                        Ver todo {{ $category->name }}
                      </span>
                    </a>
                  </li>
                  @foreach ($category->subcategories() as $subcategory)
                    <li>
                      <a href="/catalogo/{{ $category->slug }}/{{ $subcategory->slug }}"
                        class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                        <span class="underline-this">{{ $subcategory->name }}</span>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            @else
              <li>
                <a href="{{ route('catalogo', $category->slug) }}"
                  class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                  <span class="underline-this">
                    {{ $category->name }}
                  </span>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>
      <li>
        <a href="{{ route('contacto') }}"
          class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
              <path
                d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z" />
            </svg>
            Contacto
          </span>
        </a>
      </li>
      <li>
        <a href="{{ route('comentario') }}"
          class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'comentario' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm9 13H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Z" />
              <path d="M6 5H5v1h1V5Z" />
            </svg>
            Comentar
          </span></a>
      </li>
    </ul>
  </nav>

</div>


<header>
    @foreach ($datosgenerales as $item)
        <div class="bg-[#FF3131]">
            <div class="flex justify-between gap-5 w-11/12 mx-auto py-3">
                <div class="text-white font-normal font-poppins text-[14px] text-left hidden md:block w-[70%] pt-[2px]">
                    {{ $item->htop }}
                </div>
                <div class="text-white flex justify-center md:justify-end items-end gap-2 w-full md:w-[30%]">
                    <div class="flex justify-center items-center gap-2">
                        {{-- @if ($general->facebook != null) --}}
                        <a target="_blank" href="#"><img class="w-7 "
                                src="{{ asset('images/svg/jl_facebook_header.svg') }}" alt="facebook"
                                class="cursor-pointer"></a>
                        {{-- @endif --}}

                        {{-- @if ($general->instagram != null) --}}
                        <a target="_blank" href="#"><img class="w-7 "
                                src="{{ asset('images/svg/jl_instagram_header.svg') }}" alt="instagram"
                                class="cursor-pointer"></a>
                        {{-- @endif --}}
                    </div>
                    <a href="{{ route('index') }}"
                        class="font-moderat_Regular text-text14 md:text-text16">JuguetesLúdicos</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="relative">
        <div class="relative">
            <div id="header-menu"
                class="py-3  z-1 {{ $isIndex ? ' ' : 'relative' }} top-0 flex justify-between space-x-2 items-center w-[100%] px-[2%] md:px-[4%] z-20">
                
                <div id="menu-burguer" class="lg:hidden z-10 w-max">
                    <img class="h-auto w-10 cursor-pointer" src="{{ asset('images/img/menu_hamburguer.png') }}"
                        alt="menu hamburguesa" onclick="show()" />
                </div>

                <div
                    class="flex flex-row md:items-center md:w-max ">
                    <a href="{{ route('index') }}">
                        <img id="logo-decotab" class="py-2 w-[90%]"
                            src="{{ asset($isIndex ? 'images/svg/jl_logoap.svg' : 'images/svg/jl_logoap.svg') }}"
                            alt="decotab" />
                    </a>
                </div>

                <div class="hidden lg:flex items-center w-max">
                    <div>
                        <nav id="menu-items"
                            class="{{ $isIndex ? 'text-colorJL' : 'text-colorJL' }} flex gap-2 items-center justify-center text-center"
                            x-data="{ openCatalogo: false, openSubMenu: null }">
                            <a href="{{ route('index') }}"
                                class="py-5  font-medium font-poppins text-text16 px-3 hover:opacity-75 {{ $pagina == 'index' ? 'text-[#FF5E14]' : '' }}">
                                <span class="underline-this">Inicio</span>
                            </a>
                            <div @mouseenter="openCatalogo = true" @mouseleave="openCatalogo = false" class="px-3 py-5">
                                <a href="{{ route('catalogo.all') }}"
                                    class="font-medium font-poppins text-text16 hover:opacity-75 {{ $pagina == 'catalogo' ? 'text-[#FF5E14]' : '' }}"
                                    aria-haspopup="true">
                                    <span class="underline-this">Juguetes</span>
                                </a>
                                <div x-show="openCatalogo"
                                    class="origin-top-right absolute top-full left-0 w-[100vw] mt-0 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 p-8 shadow-lg overflow-hidden grid gap-8 grid-cols-12"
                                    @click.outside="openCatalogo = false" @keydown.escape.window="openCatalogo = false">
                                    <div class="col-span-3">
                                        <span class="h4 text-[#272727] px-3 py-1">Categorias</span>
                                        <hr class="mx-3 my-3">
                                        <ul class="col-span-3">
                                            @foreach ($categorias as $category)
                                                @if (count($category->subcategories()))
                                                    <li>
                                                        <a @click="openSubMenu === {{ $category->id }} ? openSubMenu = null : openSubMenu = {{ $category->id }}"
                                                            href="javascript:void(0)"
                                                            class="text-[#272727] flex justify-between items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                                                            <span class="underline-this">
                                                                {{ $category->name }}
                                                            </span>
                                                            <span
                                                                :class="{ 'rotate-180': openSubMenu === {{ $category->id }} }"
                                                                class="ms-1 inline-block transform transition-transform duration-300">↓</span>
                                                        </a>
                                                        <ul x-show="openSubMenu === {{ $category->id }}" x-transition
                                                            class="ml-3 mt-1 space-y-1 border-l border-gray-300">
                                                            <li>
                                                                <a href="/catalogo/{{ $category->slug }}"
                                                                    class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                                                                    <span class="underline-this">
                                                                        Ver todo {{ $category->name }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            @foreach ($category->subcategories() as $subcategory)
                                                                <li>
                                                                    <a href="/catalogo/{{ $category->slug }}/{{ $subcategory->slug }}"
                                                                        class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                                                                        <span
                                                                            class="underline-this">{{ $subcategory->name }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{ route('catalogo', $category->slug) }}"
                                                            class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
                                                            <span class="underline-this">
                                                                {{ $category->name }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-span-9">
                                        <div class="categories-header swiper">
                                            <div class="swiper-wrapper mt-2 mb-4">
                                                @foreach ($categorias as $category)
                                                    @if ($category->destacar)
                                                        <div class="swiper-slide rounded-2xl">
                                                            <x-category.container :item="$category" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="swiper-scrollbar-categories-header h-2"></div>
                                            <div class="mt-4 text-end">
                                                <button type="button"
                                                    class="swiper-button-prev-categories-header text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                                                    ←
                                                </button>
                                                <button type="button"
                                                    class="swiper-button-next-categories-header text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                                                    →
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('blog')}}"
                                class="py-5  font-medium font-poppins px-3 text-text16 hover:opacity-75 {{ $pagina == 'comentario' ? 'text-[#FF5E14]' : '' }}">
                                <span class="underline-this">Blog</span>
                            </a>

                            <a href="{{ route('post') }}"
                                class="py-5  font-medium font-poppins px-3 text-text16 hover:opacity-75 {{ $pagina == 'comentario' ? 'text-[#FF5E14]' : '' }}">
                                <span class="underline-this">Post</span>
                            </a>

                            <a href="{{ route('contacto') }}"
                                class="py-5  font-medium font-poppins px-3 text-text16 hover:opacity-75 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
                                <span class="underline-this">Contacto</span>
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="flex justify-end w-max md:w-auto md:justify-center items-center gap-0 md:gap-2">

                    <div class="relative w-full  lg:w-[50%] pb-8 lg:py-0 border-b lg:border-0 border-transparent hidden xl:block">
                        <input id="buscarproducto" type="text" placeholder="Buscar..."
                            class="w-full pl-8 pr-10 py-2 border border-transparent lg:border-[#CCCCCC] rounded-2xl focus:outline-none focus:ring-0 focus:border-[#CCCCCC] text-[#082252] placeholder:text-[#082252] lg:placeholder:text-[#CCCCCC]">

                        <span
                            class="absolute inset-y-0 left-0 flex items-start lg:items-center px-2 pb-2 pt-[9px] lg:p-2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.6851 13.6011C14.3544 13.2811 13.8268 13.2898 13.5068 13.6206C13.1868 13.9514 13.1955 14.4789 13.5263 14.7989L14.6851 13.6011ZM16.4206 17.5989C16.7514 17.9189 17.2789 17.9102 17.5989 17.5794C17.9189 17.2486 17.9102 16.7211 17.5794 16.4011L16.4206 17.5989ZM15.2333 9.53333C15.2333 12.6814 12.6814 15.2333 9.53333 15.2333V16.9C13.6018 16.9 16.9 13.6018 16.9 9.53333H15.2333ZM9.53333 15.2333C6.38531 15.2333 3.83333 12.6814 3.83333 9.53333H2.16667C2.16667 13.6018 5.46484 16.9 9.53333 16.9V15.2333ZM3.83333 9.53333C3.83333 6.38531 6.38531 3.83333 9.53333 3.83333V2.16667C5.46484 2.16667 2.16667 5.46484 2.16667 9.53333H3.83333ZM9.53333 3.83333C12.6814 3.83333 15.2333 6.38531 15.2333 9.53333H16.9C16.9 5.46484 13.6018 2.16667 9.53333 2.16667V3.83333ZM13.5263 14.7989L16.4206 17.5989L17.5794 16.4011L14.6851 13.6011L13.5263 14.7989Z"
                                    fill="#CCCCCC" class="fill-fillAzulPetroleo lg:fill-fillPink" />
                            </svg>
                        </span>

                        <div class="bg-white z-60 shadow-2xl top-12 w-full absolute overflow-y-auto max-h-[200px]"
                            id="resultados"></div>
                    </div>

                    @if (Auth::user() == null)
                        <a href="{{ route('login') }}"><img class="bg-white rounded-lg p-1 w-10 "
                                src="{{ asset('images/svg/jl_image_4.svg') }}" alt="user" /></a>
                    @else
                        <div class="relative inline-flex" x-data="{ open: false }">
                            <button class="px-0 md:px-3 py-5 inline-flex justify-center items-center group"
                                aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                <div class="flex items-center truncate">
                                    <span id="username"
                                        class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:opacity-75 dark:group-hover:text-slate-200 {{ $isIndex ? 'text-colorJL' : 'text-colorJL' }}">{{ Str::words(Auth::user()->name, 1, '...') }}</span>
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                        viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </button>
                            <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
                                <ul>
                                    <li class="hover:bg-gray-100">
                                        <a class="font-medium text-sm text-colorJL flex items-center py-1 px-3"
                                            href="{{ route('pedidos') }}" @click="open = false" @focus="open = true"
                                            @focusout="open = false">Mis pedidos</a>
                                    </li>
                                    <li class="hover:bg-gray-100">
                                        <a class="font-medium text-sm text-colorJL flex items-center py-1 px-3"
                                            href="{{ route('direccion') }}" @click="open = false"
                                            @focus="open = true" @focusout="open = false">Dirección</a>
                                    </li>
                                    <li class="hover:bg-gray-100">
                                        <a class="font-medium text-sm text-colorJL flex items-center py-1 px-3"
                                            href="{{ route('micuenta') }}" @click="open = false"
                                            @focus="open = true" @focusout="open = false">Ajustes</a>
                                    </li>
                                    <li class="hover:bg-gray-100">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <button type="submit"
                                                class="font-medium text-sm text-colorJL flex items-center py-1 px-3"
                                                @click.prevent="$root.submit(); open = false">
                                                {{ __('Cerrar sesión') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                
                    <div class="flex justify-center items-center pl-1">
                        <div id="open-cart" class="relative inline-block cursor-pointer" >
                            <span id="itemsCount"
                                class="bg-[#00BF63] text-xs font-medium text-white text-center p-1 leading-none rounded-full px-2 absolute -translate-y-1/2 translate-x-1/2 left-auto top-0 right-2">0</span>
                            <img src="{{ asset('images/svg/header_bag.svg') }}"
                                class="bg-white rounded-lg p-1 max-w-full h-auto cursor-pointer w-10" />
                        </div>
                        {{-- <input type="checkbox" class="bag__modal" id="check" /> --}}
                        <div id="cart-modal"
                            class="bag !fixed top-0 right-0 md:w-[450px] cartContainer border shadow-2xl !rounded-l-2xl !rounded-r-none !p-0 !z-30"
                            style="display: none">
                            <div class="p-4 flex flex-col h-screen justify-between gap-2">
                                <div class="flex flex-col">
                                    <div class="flex justify-between ">
                                        <h2 class="font-medium text-[28px] text-[#151515] pb-5">Carrito</h2>
                                        <div id="close-cart" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke="#272727" stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="overflow-y-scroll h-[calc(100vh-200px)] scroll__carrito">
                                        <table class="w-full">
                                            <tbody id="itemsCarrito">
                                                {{-- <div class="flex flex-col gap-10 align-top" id="itemsCarrito"></div> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="font-poppins flex flex-col gap-2 pt-2">
                                    <div
                                        class="text-[#141718] font-medium text-[20px] flex justify-between items-center">
                                        <p>Total</p>
                                        <p id="itemsTotal">S/ 0.00</p>
                                    </div>
                                    <div>
                                        <a href="/carrito"
                                            class="font-semibold text-base bg-[#74A68D] py-3 px-5 rounded-2xl text-white cursor-pointer w-full inline-block text-center">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="relative w-full pb-3 px-2 md:px-[5%] border-b lg:border-0 border-[transparent] block xl:hidden">
                        <input id="buscarproducto" type="text" placeholder="Buscar..."
                            class="w-full pl-8 pr-10 py-2 border border-[#CCCCCC] lg:border-[#CCCCCC] rounded-2xl focus:outline-none focus:ring-0 focus:border-[#CCCCCC] text-[#082252] placeholder:text-[#082252] lg:placeholder:text-[#CCCCCC]">

                        <span
                            class="absolute inset-y-0 left-0 flex items-center px-3 md:px-[5.5%] pb-4 ">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.6851 13.6011C14.3544 13.2811 13.8268 13.2898 13.5068 13.6206C13.1868 13.9514 13.1955 14.4789 13.5263 14.7989L14.6851 13.6011ZM16.4206 17.5989C16.7514 17.9189 17.2789 17.9102 17.5989 17.5794C17.9189 17.2486 17.9102 16.7211 17.5794 16.4011L16.4206 17.5989ZM15.2333 9.53333C15.2333 12.6814 12.6814 15.2333 9.53333 15.2333V16.9C13.6018 16.9 16.9 13.6018 16.9 9.53333H15.2333ZM9.53333 15.2333C6.38531 15.2333 3.83333 12.6814 3.83333 9.53333H2.16667C2.16667 13.6018 5.46484 16.9 9.53333 16.9V15.2333ZM3.83333 9.53333C3.83333 6.38531 6.38531 3.83333 9.53333 3.83333V2.16667C5.46484 2.16667 2.16667 5.46484 2.16667 9.53333H3.83333ZM9.53333 3.83333C12.6814 3.83333 15.2333 6.38531 15.2333 9.53333H16.9C16.9 5.46484 13.6018 2.16667 9.53333 2.16667V3.83333ZM13.5263 14.7989L16.4206 17.5989L17.5794 16.4011L14.6851 13.6011L13.5263 14.7989Z"
                                    fill="#CCCCCC" class="fill-fillAzulPetroleo lg:fill-fillPink" />
                            </svg>
                        </span>

                        <div class="bg-white z-60 shadow-2xl top-12 w-full absolute overflow-y-auto max-h-[200px]"
                            id="resultados"></div>
            </div>
        </div>
    </div>
</header>



<script>
    $('#open-cart').on('click', () => {
        $('#cart-modal').modal({
            showClose: false,
            fadeDuration: 100
        })
    })
    $('#close-cart').on('click', () => {
        $('.jquery-modal.blocker.current').trigger('click')
    })
</script>
<script>
    function mostrarTotalItems() {
        let articulos = Local.get('carrito')
        let contarArticulos = articulos.reduce((total, articulo) => {
            return total + articulo.cantidad;
        }, 0);

        $('#itemsCount').text(contarArticulos)
    }
    $(document).ready(function() {
        if ({{ $isIndex ? 1 : 0 }}) {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                var categoriasOffset = $('#categorias').offset().top;

                const headerMenu = $('#header-menu')
                const logo = $('#logo-decotab')
                const items = $('#menu-items')
                const username = $('#username')
                const burguer = $('#menu-burguer')
                if (scroll >= categoriasOffset) {
                    headerMenu
                        .removeClass('bg-transparent text-white py-3')
                        .addClass('fixed top-0 bg-white shadow-lg py-1');
                    items
                        .removeClass('text-text16')
                        .addClass('text-sm')
                  //  username
                  //      .removeClass('text-white')
                  //      .addClass('text-[#272727]')
                    // burguer
                    //   .removeClass('absolute')
                    //   .addClass('fixed')
                    //logo.attr('src', 'images/svg/logo_decotab_header.svg')
                    $('#header-menu svg').attr('stroke', '#272727');
                } else {
                    headerMenu
                        .removeClass('fixed bg-white shadow-lg py-1')
                        .addClass('bg-transparent text-white py-3');
                    items
                        .removeClass('text-sm')
                        .addClass('text-text16')
                   //username
                   //     .removeClass('text-[#272727]')
                   //     .addClass('text-white')
                    // burguer
                    //   .removeClass('fixed')
                    //   .addClass('absolute')
                    //logo.attr('src', 'images/svg/logo_decotab_header_light.svg')
                    $('#header-menu svg').attr('stroke', 'white');
                }
            });
        }
        mostrarTotalItems()
    })
</script>
<script src="{{ asset('js/storage.extend.js') }}"></script>
