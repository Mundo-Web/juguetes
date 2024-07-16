
<div class="flex flex-col gap-3">
    <div class="flex flex-col gap-2">
        <div class="flex justify-center items-center">
            <a href="{{ route('detalleBlog', $post->id) }}" class="w-full">
                <img src="{{ asset($post->url_image . $post->name_image) }}"
                    class="w-full object-cover rounded-xl h-56 2xs:h-72" alt="blog"></a>
        </div>
        @php
        $category = $post->categoria();
        @endphp
        <h3 class="text-base font-poppins	font-semibold text-color3JL pt-2">{{ $category->name }}</h3>
        <a href="{{ route('detalleBlog', $post->id) }}">
            <h2 class="text-lg md:text-2xl font-poppins	font-bold text-colorJL leading-none">{{ $post->title }}</h2>
        </a>
        <p
            class="text-sm md:text-base font-poppins	font-medium text-color4JL  leading-tight pt-1 line-clamp-2 md:line-clamp-none">
            {{ Str::limit($post->extract) }}
        </p>
    </div>

    <div class="flex justify-start items-center gap-2">
        <p class="text-color3JL font-poppins font-normal text-sm">Publicado
            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
    </div>
</div>
