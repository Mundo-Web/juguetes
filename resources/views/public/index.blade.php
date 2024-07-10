@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop


@section('content')

    <main class="z-[15]">

        <section class="relative h-500 lg:h-700 gap-20 bg-no-repeat object-top bg-cover px-[3%] lg:px-[5%] rounded-b-[50px]"
            style="background-image: url('{{ asset('images/img/jl_portada.webp') }}');">
            <div class="flex flex-row justify-center items-center gap-2 w-full lg:w-1/2 py-10 lg:py-20">
                <div class="flex flex-col gap-5 lg:gap-10 items-start pt-8 pb-32 lg:pb-16 px-0 lg:px-[2%]">
                    <h3 class="font-poppins font-bold  text-xl leading-none lg:text-primary  text-white max-w-4xl ">
                        Juguetes Lúdicos
                    </h3>
                    <h2 class="text-white text-3xl lg:text-5xl tracking-normal font-poppins font-bold">
                        Despierta la Creatividad y Aprendizaje de tu Hijo con Nuestros Juguetes
                    </h2>
                    <p class="text-white text-base tracking-wider font-poppins font-normal">
                        Nuestros juguetes están diseñados para inspirar, educar y divertir, desarrollando habilidades
                        esenciales desde temprana edad.
                    </p>
                    <a href=""
                        class="px-6 py-4 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl">Explorar
                        nuestro Catálogo</a>
                </div>
            </div>
            <div class="absolute inset-x-0 -mt-40 flex flex-col justify-center items-center gap-2 w-full px-[2%] py-[5%]">
                <div class="w-full grid grid-cols-6 xl:grid-cols-12 justify-around  max-w-7xl bg-coloBksecondJl h-96 lg:h-[250px] rounded-3xl overflow-hidden px-0 lg:px-6 py-5 xl:py-10 md:bg-right bg-no-repeat bg-cover lg:bg-contain bg-none "
                    style="background-image: url('{{ asset('images/svg/jl_textura1.svg') }}');">
                    <div class="col-span-3 md:col-span-2 flex flex-col items-center justify-center gap-3 px-[10%]">
                        <img src="{{ asset('/images/svg/jl_cerebro.svg') }}" />
                        <h3 class="font-medium font-poppins text-white text-[15px] md:text-text16  text-center">
                            Promover el aprendizaje independiente
                        </h3>
                    </div>

                    <div class="col-span-3 md:col-span-2 flex flex-col items-center justify-center gap-3 px-[5%]">
                        <img src="{{ asset('/images/svg/jl_rompecabezas.svg') }}" />
                        <h3 class="font-medium font-poppins text-white text-[15px] md:text-text16 text-center">
                            Desarrollar el pensamiento crítico y las habilidades para resolver problemas.
                        </h3>
                    </div>

                    <div class="col-span-3 md:col-span-2 flex flex-col items-center justify-center gap-3 px-[5%]">
                        <img src="{{ asset('/images/svg/jl_bebe.svg') }}" />
                        <h3 class="font-medium font-poppins text-white text-[15px] md:text-text16  text-center">
                            Fomentar la exploración y el descubrimiento.
                        </h3>
                    </div>

                    <div class="hidden lg:col-span-1"></div>

                    <div class="col-span-3 md:col-span-6 flex flex-col items-center justify-center gap-3 px-[5%]">

                        <h3
                            class="font-bold font-poppins text-white text-lg md:text-3xl text-center lg:text-left leading-normal md:leading-relaxed py-3">
                            ¡Encuentra juguetes que hagan sonreír a tus hijos!
                        </h3>
                    </div>

                </div>
            </div>
        </section>



        <section class="flex flex-col w-full gap-12 relative mt-80 lg:mt-[20%] xl:mt-[15%]">
            <div class="w-full px-[3%] lg:px-[5%]  flex flex-col gap-4 md:flex-row justify-between">
                <h2 class=" font-poppins font-bold text-3xl  leading-none text-colorJL">
                    Nuestras Categorías
                </h2>
                <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2"><a>Ver todas
                        las categorías</a><img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
            </div>

            <div class="swiper categorias flex flex-row w-full !px-[5%] !lg:pl-[5%]">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="flex flex-col ">
                            <div class="grid grid-cols-1 lg:grid-cols-3 px-12 py-16 rounded-3xl h-72 bg-cover"
                                style="background-image: url('{{ asset('images/img/jl_banner1.png') }}');">
                                <div class="flex flex-col gap-6 justify-center items-start lg:col-span-2">
                                    <h2 class="font-bold font-poppins text-4xl leading-tight  text-white  text-left">
                                        Juguetes para todos
                                    </h2>
                                    <a href="">
                                        <div
                                            class="flex flex-row items-center gap-1 px-4 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-44">
                                            Ver productos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 lg:grid-cols-3 px-12 py-16 rounded-3xl h-72 bg-cover"
                                style="background-image: url('{{ asset('images/img/jl_banner2.png') }}');">
                                <div class="flex flex-col gap-6 justify-center items-start lg:col-span-2">
                                    <h2 class="font-bold font-poppins text-4xl leading-tight  text-white  text-left">
                                        Nuestras Ofertas
                                    </h2>
                                    <a href="">
                                        <div
                                            class="flex flex-row items-center gap-1 px-4 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-44">
                                            Ver productos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 lg:grid-cols-3 px-12 py-16 rounded-3xl h-72 bg-cover"
                                style="background-image: url('{{ asset('images/img/jl_banner3.png') }}');">
                                <div class="flex flex-col gap-6 justify-center items-start lg:col-span-2">
                                    <h2 class="font-bold font-poppins text-4xl leading-tight  text-white  text-left">
                                        Divierte Jugando
                                    </h2>
                                    <a href="">
                                        <div
                                            class="flex flex-row items-center gap-1 px-4 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-44">
                                            Ver productos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 lg:grid-cols-3 px-12 py-16 rounded-3xl h-72 bg-cover"
                                style="background-image: url('{{ asset('images/img/jl_banner2.png') }}');">
                                <div class="flex flex-col gap-6 justify-center items-start lg:col-span-2">
                                    <h2 class="font-bold font-poppins text-4xl leading-tight  text-white  text-left">
                                        Juguetes para todos
                                    </h2>
                                    <a href="">
                                        <div
                                            class="flex flex-row items-center gap-1 px-4 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-44">
                                            Ver productos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="custom-swiper-buttons absolute bottom-0">
                <div class="flex flex-row gap5 w-24">
                    <div class="swiper-button-prev left-0"></div>
                    <div class="swiper-button-next left-28"></div>
                </div>
            </div> --}}
        </section>


        <section class="py-12 lg:py-20 flex flex-col gap-12 relative w-full px-[5%] lg:px-[5%]">
            <div class="flex flex-col gap-4 md:flex-row justify-between">
                <h2 class=" font-poppins font-bold text-3xl  leading-none text-colorJL">
                    Destacados
                </h2>
                <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2"><a>Ver todos
                        los productos</a><img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-8">

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>


                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>


                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="{{route('producto', 1)}}"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section class="flex flex-col lg:flex-row gap-0 lg:gap-12 relative w-full pl-[3%] lg:pl-[5%] bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('images/img/jl_textura2.webp') }}');">
            <div class="flex flex-col items-start justify-center py-12 lg:py-24 w-[100%] lg:w-[40%] gap-7">
                <div class="flex flex-col lg:flex-row gap-6">
                    <p class="font-poppins font-bold text-colorJL text-8xl">50%</p>
                    <h3 class="font-poppins font-bold text-colorJL text-4xl">descuento en juguetes</h3>
                </div>
                <p class="font-poppins font-normal text-colorJL text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Vivamus eu fermentum justo, ac fermentum nulla.
                    Sed sed scelerisque urna, vitae ultrices libero. Pellentesque vehicula et urna in venenatis.</p>
                <div
                    class="flex flex-row items-center gap-1 px-5 py-3 text-base text-white bg-coloBkprimJl font-poppins font-bold rounded-3xl w-auto">
                    Ver los Descuentos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
            </div>
            <div class="flex flex-col items-end justify-end w-[100%] lg:w-[60%] p-0">
                <img class="bg-cover bg-bottom object-right-bottom " src="{{ asset('/images/img/jl_banner4.png') }}" />
            </div>
        </section>

        <section class="py-12 lg:py-20 flex flex-col gap-12 relative w-full px-[5%] lg:px-[5%]">
            <div class="flex flex-col gap-4 md:flex-row justify-between">
                <h2 class=" font-poppins font-bold text-3xl  leading-none text-colorJL">
                    En oferta
                </h2>
                <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2"><a>Ver todos
                        los productos</a><img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-8">

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>


                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>


                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                    <div
                        class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative rounded-xl lg:rounded-3xl overflow-hidden">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">

                            <span
                                class="font-poppins font-medium text-xs md:text-base bg-coloBkprimJl text-white py-1 px-2 rounded-xl">
                                -20%</span>

                        </div>
                        <div class="flex justify-center items-center py-6 md:py-3 xl:py-10">
                            <a href="#"><img src="{{ asset('/images/img/jl_producto1.png') }}" alt="impresora"
                                    class="w-[150px] h-[110px] 2xs:w-auto 2xs:h-auto object-cover"></a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-poppins	font-semibold text-color3JL">Categoria</h3>
                            <a href="#">
                                <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Nombre del
                                    producto</h2>
                            </a>

                            <p
                                class="text-sm font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                            <p class="text-colorJL text-lg md:text-2xl font-poppins font-bold pt-1">
                                S/ 89.99
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <section class="py-12 lg:py-20 flex flex-col w-full gap-12 relative bg-coloBkprimJl bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('images/img/jl_textura3.png') }}');">

            <div class="swiper testimonios flex flex-row w-full !px-[5%] !lg:pl-[5%]">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                            <div class="flex flex-col justify-center items-center  px-[5%]">

                                <video class="w-full h-[500px] lg:h-[700px] border border-gray-200 rounded-3xl" controls>
                                    <source src="/docs/videos/flowbite.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>

                            <div class="flex flex-col gap-5 lg:gap-10 justify-center items-start w-[95%] lg:w-[85%]">
                                <h3 class="text-white text-xl font-bold font-poppins">Testimonios</h3>
                                <h2 class="text-white text-2xl lg:text-5xl font-bold font-poppins">
                                    "Mis hijos adoran estos juguetes. No solo se divierten, sino que también están
                                    aprendiendo mucho."
                                </h2>
                                <div class="flex flex-col justify-start items-center">
                                    <div class="flex flex-row items-center gap-3">
                                        {{-- <img class="rounded-full w-20 h-20 object-cover"
                                            src="{{ asset('images/img/person_3.png') }}" /> --}}
                                        <div>
                                            <h3 class="text-white text-xl font-semibold font-poppins">Ana, mamá de los
                                                niños</h3>
                                            <p class="text-white text-base font-normal font-poppins">Lima - Perú</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                            <div class="flex flex-col justify-center items-center  px-[5%]">

                                <video class="w-full h-[500px] lg:h-[700px] border border-gray-200 rounded-3xl" controls>
                                    <source src="/docs/videos/flowbite.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>

                            <div class="flex flex-col gap-5 lg:gap-10 justify-center items-start w-[95%] lg:w-[85%]">
                                <h3 class="text-white text-xl font-bold font-poppins">Testimonios</h3>
                                <h2 class="text-white text-2xl lg:text-5xl font-bold font-poppins">
                                    "Mis hijos adoran estos juguetes. No solo se divierten, sino que también están
                                    aprendiendo mucho."
                                </h2>
                                <div class="flex flex-col justify-start items-center">
                                    <div class="flex flex-row items-center gap-3">
                                        {{-- <img class="rounded-full w-20 h-20 object-cover"
                                            src="{{ asset('images/img/person_3.png') }}" /> --}}
                                        <div>
                                            <h3 class="text-white text-xl font-semibold font-poppins">Ana, mamá de los
                                                niños</h3>
                                            <p class="text-white text-base font-normal font-poppins">Lima - Perú</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                            <div class="flex flex-col justify-center items-center  px-[5%]">

                                <video class="w-full h-[500px] lg:h-[700px] border border-gray-200 rounded-3xl" controls>
                                    <source src="/docs/videos/flowbite.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>

                            <div class="flex flex-col gap-5 lg:gap-10 justify-center items-start w-full lg:w-[90%]">
                                <h3 class="text-white text-xl font-bold font-poppins">Testimonios</h3>
                                <h2 class="text-white text-2xl lg:text-5xl font-bold font-poppins">
                                    "Mis hijos adoran estos juguetes. No solo se divierten, sino que también están
                                    aprendiendo mucho."
                                </h2>
                                <div class="flex flex-col justify-start items-center">
                                    <div class="flex flex-row items-center gap-3">
                                        {{-- <img class="rounded-full w-20 h-20 object-cover"
                                            src="{{ asset('images/img/person_3.png') }}" /> --}}
                                        <div>
                                            <h3 class="text-white text-xl font-semibold font-poppins">Ana, mamá de los
                                                niños</h3>
                                            <p class="text-white text-base font-normal font-poppins">Lima - Perú</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="custom-swiper-buttons absolute bottom-[4%] lg:bottom-[6%] right-[5%] z-10">
                <div class="flex flex-row gap-2 lg:gap-3">
                    <a class="swiper-button-prev-testimonioss-home">
                        <img src="{{ asset('images/svg/jl_rightttestimonio.svg') }}" />
                    </a>
                    <a class="swiper-button-next-testimonioss-home">
                        <img src="{{ asset('images/svg/jl_lefttestimonios.svg') }}" />
                    </a>
                </div>
            </div>
        </section>


        <section class="py-12 lg:py-20 flex flex-col gap-12 relative w-full px-[5%] lg:px-[5%]">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col lg:flex-row justify-start lg:justify-between items-start gap-10">

                    <div class="flex flex-col gap-2 w-[100%] lg:w-[70%]">
                        <h2 class="text-5xl font-bold font-poppins text-colorJL">Nuestro Blog
                        </h2>
                        <p class="text-lg font-normal font-poppins text-colorJL">Nam tempor diam quis urna maximus, ac laoreet arcu convallis. 
                        Aenean dignissim nec sem quis consequata.</p>
                    </div>

                    <div
                    class="flex flex-row items-center gap-1 px-5 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-auto">
                    Ver más Publicaciones <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                     <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-center items-center">
                                <a href="#" class="w-full"><img src="{{ asset('images/img/jl_post3.png') }}"
                                        class="w-full object-cover rounded-xl" alt="blog"></a>
                            </div>
                            <h3 class="text-base font-poppins	font-semibold text-color3JL pt-2">Categoria</h3>
                            <a href="#">
                                 <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer porta cursus metus, 
                                 sit amet malesuada</h2>
                            </a>
                             <p class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                        </div>

                        <div class="flex justify-start items-center gap-2">
                            <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                el 29 de julio de 2023</p>
                            <b class="text-4xl text-[#FFBA03] -mt-5">.</b>
                            <p class="text-color3JL font-poppins font-normal text-sm">
                                Leido hace 5 min
                            </p>

                        </div>
                    </div>

                     <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-center items-center">
                                <a href="#" class="w-full"><img src="{{ asset('images/img/jl_post2.png') }}"
                                        class="w-full object-cover rounded-xl" alt="blog"></a>
                            </div>
                            <h3 class="text-base font-poppins	font-semibold text-color3JL pt-2">Categoria</h3>
                            <a href="#">
                                 <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer porta cursus metus, 
                                 sit amet malesuada</h2>
                            </a>
                             <p class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                        </div>

                        <div class="flex justify-start items-center gap-2">
                            <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                el 29 de julio de 2023</p>
                            <b class="text-4xl text-[#FFBA03] -mt-5">.</b>
                            <p class="text-color3JL font-poppins font-normal text-sm">
                                Leido hace 5 min
                            </p>

                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-center items-center">
                                <a href="#" class="w-full"><img src="{{ asset('images/img/jl_post1.png') }}"
                                        class="w-full object-cover rounded-xl" alt="blog"></a>
                            </div>
                            <h3 class="text-base font-poppins	font-semibold text-color3JL pt-2">Categoria</h3>
                            <a href="#">
                                 <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer porta cursus metus, 
                                 sit amet malesuada</h2>
                            </a>
                             <p class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                        </div>

                        <div class="flex justify-start items-center gap-2">
                            <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                el 29 de julio de 2023</p>
                            <b class="text-4xl text-[#FFBA03] -mt-5">.</b>
                            <p class="text-color3JL font-poppins font-normal text-sm">
                                Leido hace 5 min
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>


@section('scripts_importados')

    <script>
        /*  */
        var swiper = new Swiper(".categorias", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });


        var swiper = new Swiper(".testimonios", {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-prev-testimonioss-home",
                prevEl: ".swiper-button-next-testimonioss-home",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 1,
                },
            },
        });
    </script>



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
        // $('#openCarrito').on('click', function() {
        //   console.log('abriendo carrito ');
        //   $('.main').addClass('blur')
        // })
        // $('#closeCarrito').on('click', function() {
        //   console.log('cerrando  carrito ');

        //   $('.cartContainer').addClass('hidden')
        //   $('#check').prop('checked', false);
        //   $('.main').removeClass('blur')


        // })
    </script>

    <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
