@extends('components.public.matrix', ['pagina' => 'catalogo'])

@section('css_importados')

@stop



@section('content')
    <?php
    // Definición de la función capitalizeFirstLetter()
    // function capitalizeFirstLetter($string)
    // {
    //     return ucfirst($string);
    // }
    ?>

    <style>
        .swiper-pagination-bullet-active {
            background-color: #272727;
        }

        .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #979693 !important;
        }

        .blocker {
            z-index: 20;
        }
    </style>
    @php
        $images = ['', '_ambiente'];
        $x = $product->toArray();
        $i = 1;
    @endphp
    <main class="font-poppins" id="mainSection">
        @csrf

        <section class="w-full px-[5%] py-12 md:py20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16">
                <div class="flex flex-col justify-center items-center gap-5">

                    <div id="containerProductosdetail" class="w-full flex justify-center items-center h-[330px] 2xs:h-[400px] sm:h-[450px] xl:h-[550px] rounded-3xl overflow-hidden">
                        <img src="{{ asset($product->imagen) }}" alt="computer" class="w-full h-full object-cover"
                            data-aos="fade-up" data-aos-offset="150">
                    </div>
                    
                    <x-product-slider :product="$product" />

                </div>

                <div class="flex flex-col gap-5">

                    <div class="flex flex-col gap-5 pb-10 border-b-2 border-[#DDDDDD]" data-aos="fade-up"
                        data-aos-offset="150">
                        <div class="flex flex-col xl:flex-row justify-start md:justify-between items-start">
                         <div class="w-full xl:w-[70%] flex justify-start items-start">   
                          <h2 id="nombreproducto" class="font-poppins font-bold text-3xl text-colorJL">{{ $product->producto }}</h2>
                         </div>
                         <div class="w-full xl:w-[30%] flex flex-col justify-start xl:justify-end items-start">
                          @if ($product->descuento > 0)
                           <p id="pricediscount" class="font-poppins font-bold text-3xl text-color3JL">S/ {{ $product->descuento }}</p>
                           <p class="pricenormal font-poppins font-bold text-xl text-color4JL line-through">S/ {{ $product->precio }}</p> 
                          @else
                           <p class="pricenormal font-poppins font-bold text-3xl text-color3JL">S/ {{ $product->precio }}</p> 
                          @endif
                         </div>
                        </div>
                        <div>
                            <input type="number" id="cantidadSpan" class="text-color2JL border-2 rounded-lg w-16 border-[#FF3131]" value="01"
                                step="1">
                        </div>

                        <div class="text-[#565656] text-text16 md:text-text20 font-normal font-poppins">
                             {{$product->extract }}
                        </div> 
   

                        <div class="flex justify-between items-center font-poppins font-semibold text-white text-sm  md:text-base gap-5 pt-3"
                            data-aos="fade-up" data-aos-offset="150">
                            <button href="#" id='btnAgregarCarrito'
                                class="bg-[#0051FF] w-full py-3 px-2 md:px-10 text-center rounded-3xl">Quiero comprar</button>
                            <a  id="chatonline"
                                class="bg-[#25D366] flex justify-center items-center w-full py-3 px-2 md:px-10 text-center gap-2 rounded-3xl cursor-pointer">
                                <span>Cotizar aquí</span>
                                <div>
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.1 2.3C12.6 0.8 10.6 0 8.5 0C4.1 0 0.5 3.6 0.5 8C0.5 9.4 0.900006 10.8 1.60001 12L0.5 16L4.70001 14.9C5.90001 15.5 7.2 15.9 8.5 15.9C12.9 15.9 16.5 12.3 16.5 7.9C16.5 5.8 15.6 3.8 14.1 2.3ZM8.5 14.6C7.3 14.6 6.10001 14.3 5.10001 13.7L4.89999 13.6L2.39999 14.3L3.10001 11.9L2.89999 11.6C2.19999 10.5 1.89999 9.3 1.89999 8.1C1.89999 4.5 4.9 1.5 8.5 1.5C10.3 1.5 11.9 2.2 13.2 3.4C14.5 4.7 15.1 6.3 15.1 8.1C15.1 11.6 12.2 14.6 8.5 14.6ZM12.1 9.6C11.9 9.5 10.9 9 10.7 9C10.5 8.9 10.4 8.9 10.3 9.1C10.2 9.3 9.80001 9.7 9.70001 9.9C9.60001 10 9.49999 10 9.29999 10C9.09999 9.9 8.50001 9.7 7.70001 9C7.10001 8.5 6.70001 7.8 6.60001 7.6C6.50001 7.4 6.60001 7.3 6.70001 7.2C6.80001 7.1 6.9 7 7 6.9C7.1 6.8 7.10001 6.7 7.20001 6.6C7.30001 6.5 7.20001 6.4 7.20001 6.3C7.20001 6.2 6.80001 5.2 6.60001 4.8C6.50001 4.5 6.30001 4.5 6.20001 4.5C6.10001 4.5 5.99999 4.5 5.79999 4.5C5.69999 4.5 5.49999 4.5 5.29999 4.7C5.09999 4.9 4.60001 5.4 4.60001 6.4C4.60001 7.4 5.29999 8.3 5.39999 8.5C5.49999 8.6 6.79999 10.7 8.79999 11.5C10.5 12.2 10.8 12 11.2 12C11.6 12 12.4 11.5 12.5 11.1C12.7 10.6 12.7 10.2 12.6 10.2C12.5 9.7 12.3 9.7 12.1 9.6Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="pt-5" data-aos="fade-up" data-aos-offset="150">
                        @if (!empty(($product->categoria()->name)))
                            <p class="font-poppins font-medium text-sm md:text-base text-colorJL">
                                Categoría: <span class="text-color2JL">{{$product->categoria()->name}}</span>
                            </p>
                        @endif
                        {{-- <p class="font-poppins font-medium text-sm md:text-base text-colorJL">
                            SKU: <span class="text-color2JL">{{$product->sku}}</span>
                        </p> --}}
                        {{-- <p class="font-poppins font-medium text-sm md:text-base text-colorJL">
                            Marca:
                            <span class="text-color2JL">
                                Marca</span>

                        </p> --}}
                    </div>
                </div>
            </div>

            @if (!empty(strip_tags($product->description)))
                <div class="flex flex-col gap-5 pt-10 md:pt-16 font-poppins font-bold text-3xl text-colorJL pb-5" data-aos="fade-up" data-aos-offset="150">
                    Descripción
                </div>

                <div class="text-[#565656] text-base font-normal font-poppins" data-aos="fade-up" data-aos-offset="150">
                    {!! $product->description !!}
                </div> 
            @endif
            
            @if (!$especificaciones->isEmpty())
                <div class="flex flex-col gap-5">
                    <h3 class="flex flex-col gap-5 pt-10 md:pt-16 font-poppins font-bold text-3xl text-colorJL">Características técnicas</h3>
                    <div class="mx-6" data-aos="fade-up" data-aos-offset="150">
                        <ul class="font-poppins font-normal text-base list-disc text-[#565656]">
                        @foreach ($especificaciones as $especificacion)
                        <li>
                                {{ $especificacion->tittle }}: {{ $especificacion->specifications }}
                            </li> 
                        @endforeach 
                        </ul>
                    </div>
                </div> 
            @endif    
            
        </section>

        @if ($ProdComplementarios->isEmpty()) 
        @else
        <section class="pt-5 pb-20 md:pt-10 gap-12 relative w-full px-[5%] lg:px-[5%]">
            <div class="flex flex-col gap-4 md:flex-row justify-between">
                <h2 class="font-poppins font-bold text-3xl  leading-none text-colorJL">
                    Productos relacionados
                </h2>
                <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2"><a href="{{ route('catalogo.all') }}">Ver todos
                        los productos</a><img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
            </div>

            {{-- <div class="flex gap-5 lg:gap-8"> --}}

                <div class="productos-home swiper my-5 mt-16">
                    <div class="swiper-wrapper mt-2 mb-4">
                      @foreach ($ProdComplementarios as $item)
                        <div class="swiper-slide rounded-2xl">
                          <x-product.container-carousel :item="$item" />
                        </div>
                      @endforeach
                    </div>
                    {{-- <div class="swiper-scrollbar-productos-home h-2"></div>
                    <div class="mt-4 text-end">
                      <button type="button"
                        class="swiper-button-prev-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                        ←
                      </button>
                      <button type="button"
                        class="swiper-button-next-productos-home text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                        →
                      </button>
                    </div> --}}
                  </div>
                  
            {{-- </div> --}}

        </section>
        @endif 



    </main>

    @php
        $images = ['', '_ambiente'];
        $x = $product->toArray();
    @endphp

    <div id="product-swiper-modal" style="--swiper-navigation-color: #000; --swiper-pagination-color: #fff; display:none"
        class="modal hidden swiper product-prev mb-6 !max-w-full h-full">
        <div class="swiper-wrapper">
            @foreach ($images as $key)
                @if ($x['imagen' . $key] == null)
                    @continue
                @else
                    <div class="swiper-slide !w-full h-full">
                        <img src="{{ asset($x['imagen' . $key]) }}" alt="{{ $product->producto }}"
                            class="mx-auto w-full h-full object-contain object-center bg-black">
                    </div>
                @endif
            @endforeach
            @foreach ($galery as $x)
                <div class="swiper-slide !w-full h-full">
                    <img src="{{ asset($x->imagen) }}" alt="{{ $product->producto }}"
                        class="mx-auto w-full h-full object-contain object-center bg-black">
                </div>
            @endforeach
        </div>
        <div
            class="swiper-pagination bg-[rgba(255,255,255,.7)] backdrop-blur-md rounded-full !w-max px-2 !left-[50%] !-translate-x-[50%]">
        </div>

    </div>



    <script src="{{ asset('js/storage.extend.js') }}"></script>

@section('scripts_importados')

    <script>
        // $(document).ready(function() {


        function capitalizeFirstLetter(string) {
            string = string.toLowerCase()
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        // })
        $('#disminuir').on('click', function() {
            let cantidad = Number($('#cantidadSpan ').val())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            let cantidad = Number($('#cantidadSpan').val())
            cantidad++
            $('#cantidadSpan').text(cantidad)

        })
    </script>
    <script>
        $(document).ready(function() {
            $('#chatonline').click(function() {

                function isMobile() {
                    if (sessionStorage.desktop)
                        return false;
                    else if (localStorage.mobile)
                        return true;
                    var mobile = ['iphone', 'ipad', 'android', 'blackberry', 'nokia', 'opera mini',
                        'windows mobile', 'windows phone', 'iemobile'
                    ];
                    for (var i in mobile)
                        if (navigator.userAgent.toLowerCase().indexOf(mobile[i].toLowerCase()) > 0)
                            return true;
                    return false;
                }

                setTimeout(function() {
                    let currentUrl = window.location.href;
                    let price = $('#nombreproducto').text();
                    let telefono2 = '+51917994653';
                    let nombre2 = $('#nombreproducto').text();
                    let mensaje2 = 'send?phone=' + telefono2 +
                        '&text=Hola, quiero comunicarme con un asesor.%0AEstoy interesad@ en el producto *' +
                        nombre2 + '*.%0A' + currentUrl;

                    if (isMobile()) {
                        window.open('https://api.whatsapp.com/' + mensaje2, '_blank');
                    } else {
                        window.open('https://web.whatsapp.com/' + mensaje2, '_blank');
                    }
                }, 200);
            });
        });
    </script>
    <script>
        let articulosCarrito = [];


        function deleteOnCarBtn(id, operacion) {
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

            const prodRepetido = articulosCarrito.map(item => {
                if (item.id === id) {
                    item.cantidad += Number(1);
                    return item; // retorna el objeto actualizado 
                } else {
                    return item; // retorna los objetos que no son duplicados 
                }

            });
            Local.set('carrito', articulosCarrito)
            // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
            limpiarHTML()
            PintarCarrito()


        }

        function deleteItem(id) {
            articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

            Local.set('carrito', articulosCarrito)
            limpiarHTML()
            PintarCarrito()
        }

        var appUrl = <?php echo json_encode($url_env); ?>;
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];

            PintarCarrito();
        });

        function limpiarHTML() {
            //forma lenta 
            /* contenedorCarrito.innerHTML=''; */
            $('#itemsCarrito').html('')


        }

        $('#btnAgregarCarrito').on('click', function() {
            let url = window.location.href;
            let partesURl = url.split('/')
            let item = partesURl[partesURl.length - 1]
            let cantidad = Number($('#cantidadSpan').val())
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
                    mostrarTotalItems()

                    Swal.fire({

                        icon: "success",
                        title: `Producto agregado correctamente`,
                        showConfirmButton: true


                    });
                },
                error: function(error) {
                    console.log(error)
                }

            })



            // articulosCarrito = {...articulosCarrito , detalleProducto }
        })
        // $('#openCarrito').on('click', function() {
        //   $('.main').addClass('blur')
        // })
        // $('#closeCarrito').on('click', function() {

        //   $('.cartContainer').addClass('hidden')
        //   $('#check').prop('checked', false);
        //   $('.main').removeClass('blur')


        // })
    </script>

    // <script>
    //     var swiper2 = new Swiper(".product-prev", {
    //         loop: true,
    //         spaceBetween: 32,
    //         effect: "fade",
    //         pagination: {
    //             el: '.swiper-pagination',
    //             clickable: true,
    //         },
    //     });
    // </script>

    <script type="text/javascript">
        // $('#product-swiper').on('click', (e) => {
        //   console.log(e.currentTarget)
        //   $('#product-swiper-modal').modal()
        // })

        $(document).on('click', '#product-detail-image', (e) => {
            const target = e.currentTarget
            const slider = target.getAttribute('data-slider');
            $(`[aria-label="Go to slide ${slider}"]`).trigger('click')
            $('#product-swiper-modal').modal()
        })
    </script>
@stop

@stop
