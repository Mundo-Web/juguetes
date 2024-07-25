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
                        
                        <a href="{{ route('blog', 0) }}"
                            class="text-colorJL font-bold text-base py-3 px-4 rounded-lg bg-[#E6E4E5]  {{ $filtro == 0 ? 'bg-[#FF5E14] text-white' : 'text-colorJL bg-[#E6E4E5] bg-opacity-40 ' }} ">Todas</a>
                        @foreach ($categorias as $item)
                            <a href="{{ route('blog', $item->id) }}"
                                class="text-colorJL font-normal text-base py-3 px-4 rounded-lg bg-[#E6E4E5] 
                                @if ($filtro == 0) @else {{ $item->id == $filtro ? 'bg-[#FF5E14] font-semibold text-white' : 'bg-[#E6E4E5] bg-opacity-40 text-colorJL font-normal ' }} @endif">{{ $item->name }}</a>
                        @endforeach
                    
                    </div>
                </div>

                <div class="lg:basis-5/6 flex flex-col gap-10">
                    @if (is_null($lastpost))
                    @else
                        <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                            <a href="{{route('detalleBlog', $lastpost->id) }}"><div class="flex justify-center items-center">
                                <img src="{{ asset($lastpost->url_image . $lastpost->name_image) }}" alt="blog"
                                    class="w-full h-[350px] lg:h-[450px] object-cover rounded-xl">
                            </div></a>
                            <div class="flex justify-start items-center gap-5">
                                <p
                                    class="text-white font-poppins font-semibold text-base bg-coloBksecondJl py-2 px-4 rounded-lg">
                                    {{ $lastpost->categories->name }}</p>
                                <p class="text-color3JL font-poppins font-semibold text-base">Publicado
                                    {{ \Carbon\Carbon::parse($lastpost->created_at)->diffForHumans() }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-colorJL font-poppins font-bold text-lg md:text-3xl leading-tight">
                                    {{ $lastpost->title }}</h2>
                                <p class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
                                    {{ Str::limit($lastpost->extract, 250) }}
                                </p>
                            </div>

                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 pb-7">
                        @foreach ($posts as $post)
                            <x-blog.container-post :post="$post" />  
                        @endforeach   
                    </div>
                </div>
            </div>
        </section>

      
    </main>

@section('scripts_importados')

@stop

@stop
