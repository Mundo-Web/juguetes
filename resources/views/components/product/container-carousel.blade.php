<div 
    class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
    <div x-data="{ showCarrusel: false }" @mouseenter="showCarrusel = true" @mouseleave="showCarrusel = false"
        class="bg-[#F3F3F3] flex flex-col justify-center relative rounded-xl lg:rounded-3xl overflow-hidden">
        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">
            @foreach ($item->tags as $tag)
                <span style="background-color: {{ $tag->color }};"
                    class="font-poppins font-medium text-xs md:text-base text-white py-1 px-2 rounded-xl">
                    {{ $tag->name }}</span>
            @endforeach
        </div>
        <div  class="flex justify-center items-center">
            <div id="carouselproduct-{{ $item->id }}"  class="swiper carouselproduct ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ route('producto', $item->id) }}"><img src="{{ asset($item->imagen) }}" alt="impresora"
                                class="w-full h-[180px] 2xs:w-full 2xs:h-[220px]  sm:h-[300px] xl:h-[300px] 2xl:h-[400px] object-cover"></a>
                    </div>
                    @foreach ($item->galeria as $galeria)
                        <div class="swiper-slide">
                            <a href="{{ route('producto', $item->id) }}"><img src="{{ asset($galeria->imagen) }}" alt="galeria"
                                    class="w-full h-[180px] 2xs:w-full 2xs:h-[220px]  sm:h-[300px] xl:h-[300px] 2xl:h-[400px] object-cover"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div x-show="showCarrusel"
            class="custom-swiper-buttons z-10 w-full flex flex-row justify-center items-center absolute 2xs:-mt-8 xl:-mt-12 pb-4 bottom-0 hidden md:flex"
              x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="translate-y-full opacity-0"
              x-transition:enter-end="translate-y-0 opacity-100"
              x-transition:leave="transition ease-in duration-300 transform"
              x-transition:leave-start="translate-y-0 opacity-100"
              x-transition:leave-end="translate-y-full opacity-0">              
            
            <div class="flex flex-row gap-2 lg:gap-3">
                <a class="swiper-button-prev-product-{{$item->id}}">
                    <img class="w-10" src="{{ asset('images/svg/jl_rightttestimonio.svg') }}" />
                </a>
                <a class="swiper-button-next-product-{{$item->id}}">
                    <img class="w-10" src="{{ asset('images/svg/jl_lefttestimonios.svg') }}" />
                </a>
            </div>

        </div>
    </div>
     @php
        $category = $item->categoria();
     @endphp
    <div class="flex flex-col">
        <div class="flex flex-col gap-1">
            <h3 class="text-base font-poppins	font-semibold text-color3JL">{{ $category->name }}</h3>
            <a href="{{ route('producto', $item->id) }}">
                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none line-clamp-1">{{ $item->producto }}</h2>
            </a>

            <p
                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                {{ $item->extract }}
            </p>
            <div class="">
                @if ($item->descuento == 0)
                    <span class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">S/.
                        {{ $item->precio }}</span>
                @else
                    <span class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">S/.
                        {{ $item->descuento }}</span>
                    <span class="font-normal text-base text-[#6C7275] line-through">S/. {{ $item->precio }}</span>
                @endif
            </div>
        </div>
    </div>

</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper("#carouselproduct-{{ $item->id }}", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next-product-{{ $item->id }}",
                prevEl: ".swiper-button-prev-product-{{ $item->id }}",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
            },
        });
    });
</script>