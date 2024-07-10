@extends('components.public.matrix', ['pagina' => 'blog'])

@section('css_importados')

@stop

@section('content')

    <main>
        <section class="w-full px-[5%] flex flex-col gap-10 pt-10" data-aos="fade-up" data-aos-offset="150">
            <div class="flex flex-col gap-6">
                <div class="flex flex-row gap-3 justify-start lg:justify-center items-center">
                    <h3 class="font-semibold font-poppins text-base text-color3JL">Categoría</h3>
                    <span class="font-bold text-2xl -mt-3">.</span>
                    <p class="font-semibold font-poppins text-base text-color3JL">24 de Agosto 1996</p>
                </div>

                <div class="flex flex-row gap-3 justify-center items-center max-w-5xl mx-auto">
                    <h2
                        class="font-bold font-poppins text-3xl lg:text-5xl text-colorJL leading-tight tracking-tight lg:text-center">
                        Nunc lacinia ultrices quam ut volutpat. Curabitur quis porttitor nulla
                    </h2>
                </div>

                <div class="w-full mt-2" data-aos="fade-up" data-aos-offset="150">
                    <img src="{{ asset('images/img/jl_blog.png') }}" alt="catedral"
                        class="w-full h-[400px] lg:h-[563px] object-cover rounded-xl" />
                </div>


                <div class="flex flex-col gap-6 text-colorJL py-4 text-base font-normal font-poppins" data-aos="fade-up"
                    data-aos-offset="150">

                    <p>Nullam nec iaculis libero, vitae commodo magna. Quisque tincidunt dolor et augue tempus,
                        vitae interdum purus interdum. Mauris sagittis risus ac purus mollis efficitur. Sed maximus
                        aliquam lectus, id luctus justo luctus ut. Nunc vestibulum quam erat, a imperdiet nunc sodales
                        elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                        curae;
                        Suspendisse pellentesque sem commodo erat mollis dictum vel sit amet augue. Aliquam bibendum
                        molestie
                        nibh, ac bibendum mi semper sed. Aenean purus velit, posuere vitae dolor eget, tincidunt
                        efficitur ante.
                        Nullam fermentum placerat sem quis laoreet.</p>

                    <p>Nullam nec iaculis libero, vitae commodo magna. Quisque tincidunt dolor et augue tempus,
                        vitae interdum purus interdum. Mauris sagittis risus ac purus mollis efficitur. Sed maximus
                        aliquam lectus, id luctus justo luctus ut. Nunc vestibulum quam erat, a imperdiet nunc sodales
                        elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                        curae;
                        Suspendisse pellentesque sem commodo erat mollis dictum vel sit amet augue. Aliquam bibendum
                        molestie
                        nibh, ac bibendum mi semper sed. Aenean purus velit, posuere vitae dolor eget, tincidunt
                        efficitur ante.
                        Nullam fermentum placerat sem quis laoreet.</p>

                </div>

            </div>

            <div>
                <div class="mb-4 flex justify-between border-t-2 pt-5" aria-label="Pagination">
                    {{-- <a class="px-2 py-2 text-[#3F76BB] flex gap-2" href="#">
                        <img src="{{ asset('images/svg/image_38.svg') }}" alt="previo" />
                        <span class="font-bold font-roboto text-text14 text-[#FF5E14]">Anterior</span>
                    </a>

                    <a class="px-2 py-2 text-[#3F76BB] flex gap-2" href="#">
                        <span class="font-bold font-roboto text-text14 text-[#FF5E14]">Próximo</span>
                        <img src="{{ asset('images/svg/image_37.svg') }}" alt="next" />
                    </a> --}}

                    <div class="flex flex-col gap-2 py-10" data-aos="fade-up" data-aos-offset="150">
                        <p class="font-poppins font-bold text-color2JL">Compartir</p>
                        <div class="flex justify-start items-center gap-5">
                            <a href="#"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center copy-link-btn"
                                data-link="#">
                                <img src="{{ asset('images/svg/lj_compartir.svg') }}" alt="enlace">
                            </a>
                            <a target="_blank"
                                href="#"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center">
                                <img src="{{ asset('images/svg/lj_compartir2.svg') }}" alt="linkedin">
                            </a>
                            <a target="_blank"
                                href="#"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center">
                                <img src="{{ asset('images/svg/lj_compartir3.svg') }}" alt="x">
                            </a>
                            <a target="_blank"
                                href="#"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center">
                                <img src="{{ asset('images/svg/lj_compartir4.svg') }}" alt="facebook">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         <section class="pb-16 flex flex-col gap-12 relative w-full px-[5%] lg:px-[5%]">
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

@stop

@stop
