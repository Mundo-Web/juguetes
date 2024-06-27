@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop


@section('content')

  <main class="z-[15]">


    <!------Slider Header ------>
    @if ($slider->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes sliders visibles</div>
            </div> --}}
    @else
      <div class="swiper header-slider">
        <div class="swiper-wrapper">
          @foreach ($slider as $item)
            <div class="swiper-slide rounded-2xl">
              <div
                style="height: calc(100vh - 53px); background-image: 
                                @if ($item->name_image) url('{{ asset($item->url_image . $item->name_image) }}')
                                @else
                                 url('{{ asset('images/img/noimagenslider.jpg') }}') @endif"
                class="bg-cover bg-center bg-no-repeat min-h-[700px] flex flex-col items-start py-16 md:justify-center bg-colorBackgroundHeader ">
                <div class="flex justify-start items-center md:py-16 w-11/12 mx-auto">
                  <div class="text-white font-poppins flex flex-col gap-10">
                    <h1 data-aos="zoom-in"
                      class="font-semibold text-[32px] md:text-[48px] leading-none md:leading-tight pt-16">
                      {{ $item->title }}
                    </h1>
                    <h2 data-aos="zoom-in" class="font-normal text-[16px] md:text-[18px]">
                      {{ $item->description }}
                    </h2>

                    <div class="flex flex-col md:flex-row gap-5 md:gap-10 items-center">
                      @if (!empty($item->botontext1) && !empty($item->link1))
                        <a href="{{ $item->link1 }}"
                          class="font-semibold text-[16px] bg-[#74A68D] text-white py-2 px-5 rounded-3xl md:duration-500 transform transition-all hover:scale-105 animate-slideInFromBottom w-full text-center md:w-auto">
                          {{ $item->botontext1 }}</a>
                      @endif

                      @if (!empty($item->botontext2) && !empty($item->link2))
                        <a href="{{ $item->link2 }}"
                          class="font-semibold text-[16px] border-2 border-white bg-transparent text-white py-2 px-5 rounded-3xl transform transition-all hover:scale-105 animate-slideInFromBottom w-full md:w-auto text-center">
                          {{ $item->botontext2 }}</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach


        </div>

      </div>
    @endif

    <div id="categorias"></div>

    <!------Valores agregados------>
    <section class="hidden lg:block focus-within:group">
      <div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
          <div
            class="group bg-colorBackgroundMainTop hover:bg-white p-14 md:duration-1000 transform transition-transform hover:scale-105 hover:z-10 transition-opacity duration-500 ease-out group-focus-within:opacity-100 focus-within:animate-slideInFromLeft">
            <div class="pb-5 flex justify-center items-center md:justify-start">
              <svg width="44" height="40" viewBox="0 0 44 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M26 34V10M26 34H30M26 34H16M26 10C26 5.58172 22.4183 2 18 2H10C5.58172 2 2 5.58172 2 10V26C2 29.7304 4.55333 32.8645 8.00769 33.7499M26 10H32.4182C33.4344 10 34.4126 10.3868 35.154 11.0819L40.7358 16.3148C41.5424 17.071 42 18.1273 42 19.2329V30C42 32.2091 40.2091 34 38 34M38 34C38 36.2091 36.2091 38 34 38C31.7909 38 30 36.2091 30 34M38 34C38 31.7909 36.2091 30 34 30C31.7909 30 30 31.7909 30 34M16 34C16 36.2091 14.2091 38 12 38C9.79086 38 8 36.2091 8 34C8 33.916 8.00259 33.8326 8.00769 33.7499M16 34C16 31.7909 14.2091 30 12 30C9.87484 30 8.13677 31.6573 8.00769 33.7499"
                  stroke="white" stroke-width="2.5" class="group-hover:stroke-[#151515]" />
              </svg>
            </div>
            <div data-aos="fade-left"
              class="font-poppins text-center md:text-left transform transition-transform group-hover:scale-105">
              <h2 class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]">
                Envío gratis
              </h2>
              <p class="text-white group-hover:text-colorTextBlack font-normal text-[16px]">
                compras superior a s/200
              </p>
            </div>
          </div>
          <div
            class="group bg-colorBackgroundMainTop hover:bg-white p-14 md:duration-1000 transform transition-transform hover:scale-105 hover:z-10 transition-opacity duration-500 ease-out group-focus-within:opacity-100 focus-within:animate-slideInFromLeft">
            <div class="pb-5 flex justify-center items-center md:justify-start">
              <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4.33398" y="8" width="40" height="32" rx="4" stroke="white" stroke-width="2.5"
                  class="group-hover:stroke-[#151515]" />
                <circle cx="4" cy="4" r="4" transform="matrix(1 0 0 -1 20.334 28)" stroke="white"
                  stroke-width="2.5" class="group-hover:stroke-[#151515]" />
                <circle cx="2" cy="2" r="2" transform="matrix(1 0 0 -1 34.334 26)" fill="white"
                  class="group-hover:stroke-[#151515]" />
                <circle cx="2" cy="2" r="2" transform="matrix(1 0 0 -1 10.334 26)" fill="white"
                  class="group-hover:stroke-[#151515]" />
              </svg>
            </div>
            <div data-aos="fade-left"
              class="font-poppins text-center md:text-left transform transition-transform group-hover:scale-105">
              <h2 class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]">
                Devolución de dinero
              </h2>
              <p class="text-white group-hover:text-colorTextBlack font-normal text-[16px]">
                Garantía de 30 días
              </p>
            </div>
          </div>

          <div
            class="group bg-colorBackgroundMainTop hover:bg-white p-14 md:duration-1000 transform transition-transform hover:scale-105 hover:z-10 transition-opacity duration-500 ease-out group-focus-within:opacity-100 focus-within:animate-slideInFromRight">
            <div class="pb-5 flex justify-center items-center md:justify-start">
              <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M32.666 16H16.666M32.666 16C37.0843 16 40.666 19.5817 40.666 24V36C40.666 40.4183 37.0843 44 32.666 44H16.666C12.2477 44 8.66602 40.4183 8.66602 36V24C8.66602 19.5817 12.2477 16 16.666 16M32.666 16V12C32.666 7.58172 29.0843 4 24.666 4C20.2477 4 16.666 7.58172 16.666 12V16M24.666 32V28"
                  stroke="white" stroke-width="2.5" stroke-linecap="round" class="group-hover:stroke-[#151515]" />
              </svg>
            </div>
            <div data-aos="fade-right"
              class="font-poppins text-center md:text-left transform transition-transform group-hover:scale-105">
              <h2 class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]">
                Pagos seguros
              </h2>
              <p class="text-white group-hover:text-colorTextBlack font-normal text-[16px]">
                Asegurado por...
              </p>
            </div>
          </div>

          <div
            class="group bg-colorBackgroundMainTop hover:bg-white p-14 md:duration-1000 transform transition-transform hover:scale-105 hover:z-10 transition-opacity duration-500 ease-out group-focus-within:opacity-100 focus-within:animate-slideInFromRight">
            <div class="pb-5 flex justify-center items-center md:justify-start">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M42 38V34.7081C42 33.0725 41.0042 31.6017 39.4856 30.9942L35.4173 29.3669C33.4857 28.5943 31.2844 29.4312 30.354 31.292L30 32C30 32 25 31 21 27C17 23 16 18 16 18L16.708 17.646C18.5688 16.7156 19.4057 14.5143 18.6331 12.5827L17.0058 8.51444C16.3983 6.99581 14.9275 6 13.2919 6H10C7.79086 6 6 7.79086 6 10C6 27.6731 20.3269 42 38 42C40.2091 42 42 40.2091 42 38Z"
                  stroke="white" stroke-width="2.5" stroke-linejoin="round" class="group-hover:stroke-[#151515]" />
              </svg>
            </div>
            <div data-aos="fade-right"
              class="font-poppins text-center md:text-left transform transition-transform group-hover:scale-105">
              <h2 class="text-white group-hover:text-colorTextBlack font-semibold text-[24px]">
                Soporte 24/7
              </h2>
              <p class="text-white group-hover:text-colorTextBlack font-normal text-[16px]">
                Soporte telefónico y por correo electrónico
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!------Categorias destacadas - Grilla------>

    @if (!$category->isEmpty())
      <section class="mt-20">
        <h2 class="block lg:hidden font-poppins font-semibold text-[40px] w-11/12 mx-auto">
          Categorías
        </h2>
        <div>
          @if (count($category->take(4)) == 1)

            <section class="mt-10 hidden lg:block relative">

              <div class="grid grid-cols-1 gap-4 w-10/12 mx-auto" data-aos="fade-up">

                @foreach ($category->take(1) as $index => $slide)
                  <div class="col-span-2 row-span-2">
                    <div class="bg-[#F3F5F7] flex flex-row h-full rounded-xl">
                      <div class="flex justify-start items-center basis-1/2">
                        @if ($slide->name_image)
                          <img src="{{ asset($slide->url_image . $slide->name_image) }}" alt="{{ $slide->name }}"
                            class="w-full h-30 object-contain" />
                        @else
                          <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                            class="w-full h-30 object-contain" />
                        @endif
                      </div>

                      <div class="font-poppins basis-1/2 p-4 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px]">
                          {{ $slide->name }}
                        </h2>
                        <p class="my-2 font-normal text-[16px] mb-4">
                          {{ $slide->description }}
                        </p>

                        <div>
                          <a href="/catalogo/{{ $slide->slug }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-2 px-8 rounded-3xl border-[1px] border-colorBorder">
                            Ver categoría
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>

            </section>
          @elseif(count($category->take(4)) == 2)
            <section class="mt-10 hidden lg:block relative">

              <div class="grid grid-cols-4 gap-4 w-10/12 mx-auto">

                @foreach ($category->take(2) as $index => $slide)
                  <div class="col-span-2 row-span-1" data-aos="fade-{{ $index == 0 ? 'right' : 'left' }}">
                    <div class="bg-[#F3F5F7] flex flex-row h-full rounded-xl">
                      <div class="flex justify-start items-center basis-1/2">
                        @if ($slide->name_image)
                          <img src="{{ asset($slide->url_image . $slide->name_image) }}" alt="{{ $slide->name }}"
                            class="w-full h-30 object-contain" />
                        @else
                          <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                            class="w-full h-30 object-contain" />
                        @endif
                      </div>

                      <div class="font-poppins basis-1/2 p-4 pb-6 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px] truncate">
                          {{ $slide->name }}
                        </h2>
                        <p class="my-2 font-normal text-[16px] mb-4">
                          {{ $slide->description }}
                        </p>

                        <div>
                          <a href="/catalogo/{{ $slide->slug }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-3 px-[8%] rounded-3xl border-[1px] border-colorBorder">
                            Ver categoria
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Fin Columna 1 -->
                @endforeach
              </div>
            </section>
          @elseif(count($category->take(4)) == 3)
            <section class="mt-10 hidden lg:block relative">

              <div class="grid grid-cols-4 gap-4 w-10/12 mx-auto">

                @foreach ($category->take(3) as $index => $slide)
                  <!-- Columna 1 2 y 3-->

                  <div
                    class="col-span-2 @if ($loop->first) row-span-2 @elseif(!$loop->first)  row-span-1 @endif"
                    data-aos="fade-{{ $index == 0 ? 'right' : ($index == 1 ? 'down-left' : 'up-left') }}">
                    <div
                      class="bg-[#F3F5F7] flex  @if ($loop->first) flex-col @elseif(!$loop->first) flex-row @endif  h-full rounded-xl">
                      <div class="flex justify-start items-center basis-1/2">
                        @if ($slide->name_image)
                          <img src="{{ asset($slide->url_image . $slide->name_image) }}" alt="{{ $slide->name }}"
                            class="w-full h-30 object-contain" />
                        @else
                          <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                            class="w-full h-30 object-contain" />
                        @endif
                      </div>

                      <div class="font-poppins basis-1/2 p-4 pb-6 flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px] truncate">
                          {{ $slide->name }}
                        </h2>
                        <p class="my-2 font-normal text-[16px] mb-4">
                          {{ $slide->description }}
                        </p>

                        <div>
                          <a href="/catalogo/{{ $slide->slug }}"
                            class="font-semibold text-[16px] bg-transparent md:duration-500 py-3 px-[8%] rounded-3xl border-[1px] border-colorBorder">
                            Ver categoria
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!--Fin Columna 1 -->
                @endforeach
              </div>
            </section>
          @elseif(count($category->take(4)) == 4)
            <section class="mt-10 hidden lg:block relative">

              <div class="grid grid-cols-4 gap-4 w-10/12 mx-auto">

                @foreach ($category->take(4) as $index => $slide)
                  <!-- Columna 1 2 3 y 4-->

                  <div
                    class="@if ($loop->index == 0 || $loop->index == 1) col-span-2  @elseif($loop->index == 2 || $loop->index == 3) col-span-1 @endif  @if ($loop->first) row-span-2 @elseif(!$loop->first)  row-span-1 @endif"
                    data-aos="fade-{{ $index == 0 ? 'right' : ($index == 1 ? 'left' : ($index == 2 ? 'up-right' : 'up-left')) }}">
                    <div
                      class="bg-[#F3F5F7] flex  @if ($loop->index == 0 || $loop->index == 2 || $loop->index == 3) flex-col @elseif($loop->index == 1) flex-row @endif  h-full rounded-xl">
                      <div class="flex justify-start items-center basis-1/2">
                        @if ($slide->name_image)
                          <img src="{{ asset($slide->url_image . $slide->name_image) }}" alt="{{ $slide->name }}"
                            class="w-full h-30 object-contain" />
                        @else
                          <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                            class="w-full h-30 object-contain" />
                        @endif
                      </div>

                      <div class="font-poppins basis-1/2 p-4 pb-6  flex flex-col gap-2 justify-center">
                        <h2 class="font-semibold text-[24px] truncate">
                          {{ $slide->name }}
                        </h2>
                        <p class="my-2 font-normal text-[16px] mb-4">
                          {{ $slide->description }}
                        </p>

                        <div>
                          <a href="/catalogo/{{ $slide->slug }} "
                            class=" font-semibold text-[16px] bg-transparent md:duration-500 py-3 px-[8%]  rounded-3xl border-[1px] border-colorBorder">Ver
                            categoría
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Fin Columna 1 -->
                @endforeach
              </div>
            </section>

          @endif


          <!------Categorias destacadas - carrusel------>
          <section class="block lg:hidden">
            <div class="swiper categorias">
              {{-- <div class="swiper-pagination-categorias mb-24"></div>  --}}
              <div class="swiper-wrapper mb-[32x]">
                @foreach ($category as $item)
                  <div class="swiper-slide mt-0 mb-4">
                    <a href="/catalogo/{{ $item->id }}">
                      <div class="flex flex-col p-4">
                        <div class="flex flex-col bg-[#F8F6F2] rounded-2xl">
                          <h2 class="font-semibold text-[24px] text-center mt-5">
                            {{ $item->name }}
                          </h2>
                          <div class="flex justify-center items-center">
                            @if ($slide->name_image)
                              <img src="{{ asset($slide->url_image . $slide->name_image) }}"
                                alt="{{ $slide->name_image }}" class="w-full h-30 object-contain" />
                            @else
                              <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                                class="w-full h-30 object-contain" />
                            @endif
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
              <div class="swiper-pagination-categorias"></div>
            </div>
          </section>

        </div>
      </section>
    @endif

    <!-- Productos destacados -->
    @if ($destacados->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes productos destacados visibles</div>
            </div> --}}
    @else
      <section class="font-poppins">
        <div class="grid grid-cols-1 gap-12 md:gap-0 md:grid-cols-4 grid-rows-1 pt-12 w-11/12 mx-auto">
          <div data-aos="zoom-in-right" class="col-span-1 md:col-span-3 order-1 md:order-1 flex flex-col gap-2">
            <h2 class="font-medium text-[40px] mt-2 leading-none md:leading-tight">
              Transforma tu Espacio 🏡✨
            </h2>
            <p class="font-normal text-lg">
              Descubre nuestros paneles de piedra, mármol, Wall Panel Mix y piedra PU. Dale vida a tus interiores con
              estilo y durabilidad. ¡Haz de tu hogar un lugar único y sofisticado!
            </p>
          </div>
          <div data-aos="zoom-in-left"
            class="col-span-1 md:col-span-1 order-3 md:order-2 flex justify-center items-center w-full">
            <a href="/catalogo"
              class="font-semibold text-[16px] bg-transparent md:duration-500 py-4 px-5 rounded-3xl border-[1px] border-colorBorder flex-initial w-full md:w-56 text-center inline-block">
              Ver todo
            </a>
          </div>

          <div class="col-span-1 md:col-span-4 order-2 md:order-3">
            <div class="productos-home swiper my-5 mt-16">
              <div class="swiper-wrapper mt-2 mb-4">
                @foreach ($destacados as $item)
                  <div class="swiper-slide rounded-2xl">
                    <x-product.container :item="$item" />
                  </div>
                @endforeach
              </div>
              <div class="swiper-scrollbar-productos-home h-2"></div>
              <div class="mt-4 text-end">
                <button type="button"
                  class="swiper-button-prev-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                  ←
                </button>
                <button type="button"
                  class="swiper-button-next-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                  →
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif

    <!-- Productos en oferta -->
    @if ($descuentos->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes productos en oferta visibles</div>
            </div> --}}
    @else
      <section class="font-poppins mt-10 mb-20">
        <div class="grid grid-cols-1 gap-12 md:gap-0 md:grid-cols-4 grid-rows-1 pt-12 w-11/12 mx-auto">
          <div data-aos="zoom-in-right" class="col-span-1 md:col-span-3 order-1 md:order-1">
            <h2 class="font-medium text-[40px] mt-2 leading-none md:leading-tight">
              ¡Ofertas Increíbles en Deco Tab! 🏠💫
            </h2>

            <p class="font-normal text-lg basis-3/6">
              Renueva tu hogar con estilo y calidad a precios irresistibles. ¡No te pierdas nuestras promociones y crea el
              espacio de tus sueños!
            </p>
          </div>

          <div data-aos="zoom-in-left"
            class="col-span-1 md:col-span-1 order-3 md:order-2 flex justify-center items-center w-full">
            <a href="/catalogo"
              class="font-semibold text-[16px] bg-transparent md:duration-500 py-4 px-5 rounded-3xl border-[1px] border-colorBorder flex-initial w-full md:w-56 text-center inline-block">
              Ver todo
            </a>
          </div>

          <div class="col-span-1 md:col-span-4 order-2 md:order-3">
            <!-- grilla de productos en oferta -->
            <div class="productos-home swiper my-5 mt-16">
              <div class="swiper-wrapper mt-2 mb-4">
                @foreach ($descuentos as $item)
                  <div class="swiper-slide rounded-2xl">
                    <x-product.container :item="$item" />
                  </div>
                @endforeach
              </div>
              <div class="swiper-scrollbar-productos-home h-2"></div>
              <div class="mt-4 text-end">
                <button type="button"
                  class="swiper-button-prev-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                  ←
                </button>
                <button type="button"
                  class="swiper-button-next-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                  →
                </button>
              </div>
            </div>
            {{-- <div class="md:hidden grid grid-cols-2 gap-5">

              @foreach ($descuentos as $item)
                <x-product.container :item="$item" />
              @endforeach
            </div>

            <!-- carrousel productos oferta -->
            <div class="hidden md:block">
              <div class="swiper productos-oferta my-5">
                <div class="swiper-pagination-productos-oferta mb-80 md:mb-32"></div>

                <div class="swiper-wrapper mt-[80px]">

                  @foreach ($descuentos as $item)
                    <div class="swiper-slide rounded-2xl">
                      <x-product.container :item="$item" />
                    </div>
                  @endforeach

                </div>
                <!-- <div class="swiper-pagination-productos-oferta"></div> -->
              </div>
            </div> --}}
          </div>
        </div>
      </section>
    @endif

    <!-- Beneficios -->

    @if ($benefit->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-bold">No tienes beneficios visibles</div>
            </div> --}}
    @else
      <section>
        <div class="flex flex-col gap-5 lg:grid lg:grid-cols-2 lg:grid-rows-[700px] h-[100%]">
          <div class="basis-1/2 flex items-center justify-center">
            <img src="{{ asset('/images/img/vestibulo.png') }}" alt="vestibulo"
              class="w-full h-full object-cover object-center" />
          </div>
          <div class="basis-1/2 beneficioRelative px-5 md:px-10">
            <div class="swiper myBeneficios h-full">
              <div class="swiper-wrapper">
                @foreach ($benefit as $item)
                  <div class="swiper-slide">
                    <div class="flex flex-col gap-5 my-12">
                      <p class="font-semibold text-[24px]">{{ $item->titulo }}</p>

                      <h2 class="font-semibold text-[48px] leading-none md:leading-tight">
                        {{ $item->descripcionshort }}
                      </h2>

                      <div class="font-normal text-[18px]">
                        {!! $item->descripcion !!}
                      </div>

                    </div>
                  </div>
                @endforeach
              </div>
              <div class="swiper-pagination-beneficios"></div>
            </div>
          </div>
        </div>
      </section>
    @endif

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
    // $(document).ready(function() {
    function capitalizeFirstLetter(string) {
      string = string.toLowerCase()
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
    // })
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



    // function PintarCarrito() {
    //   console.log('pintando carrito ')

    //   let itemsCarrito = $('#itemsCarrito')

    //   articulosCarrito.forEach(element => {
    //     let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
    //         <div class="flex justify-center items-center gap-5">
    //           <div class="bg-[#F3F5F7] rounded-md p-4">
    //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //           </div>
    //           <div class="flex flex-col gap-3 py-2">
    //             <h3 class="font-semibold text-[14px] text-[#151515]">
    //               ${element.producto}
    //             </h3>
    //             <p class="font-normal text-[12px] text-[#6C7275]">
                  
    //             </p>
    //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
    //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span  class="text-[20px]">-</span>
    //               </button>
    //               <div class="w-8 h-8 flex justify-center items-center">
    //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //               </div>
    //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
    //                 <span class="text-[20px]">+</span>
    //               </button>
    //             </div>
    //           </div>
    //         </div>
    //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //           <p class="font-semibold text-[14px] text-[#151515]">
    //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //           </p>
    //           <div class="flex items-center">
    //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
    //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    //             </svg>
    //             </button>

    //           </div>
    //         </div>
    //       </div>`

    //     itemsCarrito.append(plantilla)

    //   });

    //   calcularTotal()
    // }






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
