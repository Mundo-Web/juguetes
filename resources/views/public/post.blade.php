@extends('components.public.matrix', ['pagina' => 'blog'])

@section('css_importados')

@stop

@section('content')

    <main>
        <section class="w-full px-[5%] flex flex-col gap-10 pt-10" data-aos="fade-up" data-aos-offset="150">
            <div class="flex flex-col gap-6">
                <div class="flex flex-row gap-3 justify-start lg:justify-center items-center">
                    <h3 class="font-semibold font-poppins text-base text-color3JL">{{ $post->categories->name }}</h3>
                    <span class="font-bold text-2xl -mt-3">.</span>
                    <p class="font-semibold font-poppins text-base text-color3JL">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F, Y') }}</p>
                </div>

                <div class="flex flex-row gap-3 justify-center items-center max-w-5xl mx-auto">
                    <h2
                        class="font-bold font-poppins text-3xl lg:text-5xl text-colorJL leading-tight tracking-tight lg:text-center">
                        {{$post->title}}
                    </h2>
                </div>
                
                @if($post->url_image)
                    <div class="w-full mt-2" data-aos="fade-up" data-aos-offset="150">
                        <img src="{{asset($post->url_image . $post->name_image)}}" alt="catedral"
                            class="w-full h-[400px] lg:h-[563px] object-cover rounded-xl" />
                    </div>
                @endif


                <div class="flex flex-col gap-6 text-colorJL py-4 text-base font-normal font-poppins" data-aos="fade-up"
                    data-aos-offset="150">
                    {!!$post->description!!}
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
                            <a 
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center copy-link-btn"
                                data-link="{{ route('post', $post->id) }}">
                                <img src="{{ asset('images/svg/lj_compartir.svg') }}" alt="enlace">
                            </a>
                            <a target="_blank"
                                href="https://www.linkedin.com/shareArticle?mini=true&url{{ urlencode(route('post', $post->id)) }}"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center">
                                <img src="{{ asset('images/svg/lj_compartir2.svg') }}" alt="linkedin">
                            </a>
                            <a target="_blank"
                                href="https://x.com/intent/post?url={{ route('post', $post->id) }}&text=Este+blog+me+pareció+interesante+{{ $post->title }}"
                                class="rounded-full w-8 h-8 bg-[#F4F4F4] flex justify-center items-center">
                                <img src="{{ asset('images/svg/lj_compartir3.svg') }}" alt="x">
                            </a>
                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('post', $post->id) }}"
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

                    <a href="{{ route('blog', 0) }}"
                    class="flex flex-row items-center gap-1 px-5 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-auto">
                    Ver más Publicaciones <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></a>

                </div>

                @if (!$postsrelacionados->isEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($postsrelacionados as $postrelacionado)
                            <x-blog.container-post :post="$postrelacionado" />  
                        @endforeach   
                    </div>    
                @endif
                
            </div>
        </section>

    </main>

@section('scripts_importados')
<script>
    $(document).ready(function() {
      $('.copy-link-btn').click(function(e) {
        e.preventDefault()
        var link = $(this).data('link');
        navigator.clipboard.writeText(link).then(function() {
          alert('Enlace copiado al portapapeles: ' + link);
        }, function(err) {
          console.error('Error al copiar el enlace: ', err);
        });
      });
    });
  </script>
@stop

@stop
