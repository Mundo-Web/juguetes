<div class="grid grid-cols-3">
    <div class="col-span-3 h-full">
        <div class="swiper h-full img-complementarias">
            <div class="swiper-wrapper">
                <div class="swiper-slide w-full h-full col-span-1 rounded-2xl overflow-hidden border-2 border-azulboost" id="img-complementariaPROD-0">
                    <div class="flex gap-2 items-center justify-start h-full">
                        <div class="flex justify-center items-center h-full">
                            <img class="size-full object-cover h-full w-full shadow-xl"
                                    src="{{ $product->imagen ? asset($product->imagen) : asset('images/img/noimagen.jpg') }}"
                                    onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
                        </div>
                    </div>
                </div>
                @foreach ($product->galeria as $index => $image)
                    <div class="swiper-slide w-full h-full col-span-1 rounded-2xl overflow-hidden border-2 border-[#E5E7EB]" id="img-complementariaPROD-{{ $index }}">
                        <div class="flex gap-2 items-center justify-start h-full">
                            <div class="flex justify-center items-center h-full">
                                <img class="size-full object-cover h-full w-full shadow-xl"
                                src="{{ $image->imagen ? asset($image->imagen) : asset('images/img/noimagen.jpg') }}"
                                onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    var headerServices = new Swiper(".img-complementarias", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        centeredSlides: false,
        initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
        /* pagination: {
          el: ".swiper-pagination-estadisticas",
          clickable: true,
        }, */
        //allowSlideNext: false,  //Bloquea el deslizamiento hacia el siguiente slide
        //allowSlidePrev: false,  //Bloquea el deslizamiento hacia el slide anterior
        allowTouchMove: {{ count($product->galeria) > 1 ? 'true' : 'false' }},
        autoplay: {
            delay: 5500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true
        },

        breakpoints: {
            0: {
                slidesPerView: 3,
                centeredSlides: {{ count($product->galeria) <= 3 ? 'true' : 'false' }},
                loop: {{ count($product->galeria) > 1 ? 'true' : 'false' }},
            },
            1024: {
                slidesPerView: 4,
                centeredSlides: false,

            },
        },
    });
</script>

<script>
    //crear un script que detecte el onclick de un img-complementariaPROD  y lo ponga en #containerProductosdetail
    var imgComplementaria = document.getElementById('img-complementariaPROD');
  
    $(document).on("click", "[id^='img-complementariaPROD-']", function() {
      let img = document.createElement('img');
  
      $("[id^='img-complementariaPROD-']").removeClass('border-azulboost').addClass('border-[#E5E7EB]');
  
      $(this).removeClass('border-[#E5E7EB]').addClass('border-azulboost');
  
      img.src = $(this).find('img').attr('src');
      img.classList.add('w-full', 'h-[330px]', '2xs:h-[400px]', 'sm:h-[450px]', 'xl:h-[550px]', 'object-cover',
        'ease-in', 'duration-500',
        'transform', 'hover:scale-105', 'opacity-0', 'transition-opacity', 'duration-200');
      $("#containerProductosdetail").html(img);
      setTimeout(function() {
        img.classList.remove('opacity-0');
      }, 100);
  
      setTimeout(function() {
        container.children('img').not(img).remove();
      }, 200);
    });
  </script>
