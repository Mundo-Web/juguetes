@extends('components.public.matrix', ['pagina' => 'blog'])

@section('css_importados')

@stop

@section('content')

    <main>
        <section class="w-full px-[5%] flex flex-col py-10 gap-10">
            <div class="flex flex-col gap-3 w-full" data-aos="fade-up" data-aos-duration="150">
                <p class="text-color2JL font-poppins font-semibold text-base">Blog</p>
                <h2 class="text-colorJL font-bold font-poppins text-3xl lg:text-5xl leading-tight">
                    Descubre lo mejor:
                    <br>Publicaciones sobre el mundo de los juguetes
                </h2>
                <p class="text-[#565656] font-poppins font-normal text-base">Nuestros juguetes están diseñados para inspirar,
                    educar y divertir, desarrollando habilidades esenciales desde temprana edad.</p>
            </div>

            <div class="flex flex-col lg:flex-row md:justify-between md:items-start gap-12">

                <div class="w-full lg:basis-1/6 flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                    <h3 class="text-colorJL font-bold font-poppins text-lg">Blog categorias</h3>
                    <div class="flex flex-col gap-3 font-poppins">
                        <a href="#"
                            class="text-colorJL font-bold text-base py-3 px-4 rounded-lg bg-[#E6E4E5]">Todas</a>

                        <a href="#"
                            class="text-colorJL font-normal text-base py-3 px-4 rounded-lg bg-[#E6E4E5] bg-opacity-40">Categoría 1</a>

                         <a href="#"
                            class="text-colorJL font-normal text-base py-3 px-4 rounded-lg bg-[#E6E4E5] bg-opacity-40">Categoría 2</a>
                        
                         <a href="#"
                            class="text-colorJL font-normal text-base py-3 px-4 rounded-lg bg-[#E6E4E5] bg-opacity-40">Categoría 3</a>

                    </div>
                </div>

                <div class="lg:basis-5/6 flex flex-col gap-10">

                    <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('images/img/jl_blog.png') }}" alt="blog"
                                class="w-full h-[350px] lg:h-[450px] object-cover rounded-xl">
                        </div>
                        <div class="flex justify-start items-center gap-5">
                            <p
                                class="text-white font-poppins font-semibold text-base bg-coloBksecondJl py-2 px-4 rounded-lg">
                                Categoría</p>
                            <p class="text-color3JL font-poppins font-semibold text-base">Publicado
                                hace 5 min</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <h2 class="text-colorJL font-poppins font-bold text-lg md:text-3xl leading-tight">
                                Phasellus vestibulum, lacus sed dictum</h2>
                            <p class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                            </p>
                        </div>

                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 pb-7">

                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-2">
                                <div class="flex justify-center items-center">
                                    <a href="#" class="w-full"><img src="{{ asset('images/img/jl_post3.png') }}"
                                            class="w-full object-cover rounded-xl" alt="blog"></a>
                                </div>
                                <h3 class="text-base font-poppins	font-semibold text-color3JL pt-2">Categoria</h3>
                                <a href="#">
                                    <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer
                                        porta cursus metus,
                                        sit amet malesuada</h2>
                                </a>
                                <p
                                    class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                    Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                                </p>
                            </div>

                            <div class="flex justify-start items-center gap-2">
                                <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                    el 29 de julio de 2023</p> 
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
                                    <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer
                                        porta cursus metus,
                                        sit amet malesuada</h2>
                                </a>
                                <p
                                    class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                    Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                                </p>
                            </div>

                            <div class="flex justify-start items-center gap-2">
                                <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                    el 29 de julio de 2023</p>
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
                                    <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">Integer
                                        porta cursus metus,
                                        sit amet malesuada</h2>
                                </a>
                                <p
                                    class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                    Praesent non euismod arcu, eu dignissim erat. Aliquam erat volutpat...
                                </p>
                            </div>

                            <div class="flex justify-start items-center gap-2">
                                <p class="text-color3JL font-poppins font-normal text-sm">Publicado
                                    el 29 de julio de 2023</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

      
    </main>

@section('scripts_importados')

@stop

@stop
