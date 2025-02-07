@extends('components.public.matrix', ['pagina' => 'catalogo'])

@section('css_importados')

@stop


@section('content')

    <main>
        
        <section class="flex flex-col lg:flex-row gap-0 lg:gap-12 relative w-full pl-[3%] lg:pl-[5%] bg-cover bg-no-repeat bg-[40%] min-h-[500px]"
            style="background-image: url('{{ asset('images/img/jl_banner5.png') }}');">
            <div class="flex flex-col items-start justify-center py-7 lg:py-24 w-[100%] lg:w-[40%] gap-7">
                <div class="flex flex-col lg:flex-row gap-6">
                  @if ($category == 0)
                    <h3 class="font-poppins font-bold text-white text-4xl">Catálogo</h3>
                  @else
                    <h3 class="font-poppins font-bold text-white text-4xl">{{$categoria->name}}</h3>    
                  @endif
                </div>
                  @if ($category == 0)
                    <p class="font-poppins font-normal text-white text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Vivamus eu fermentum justo, ac fermentum nulla. Sed sed scelerisque urna, 
                    vitae ultrices libero. Pellentesque vehicula et urna in venenatis.</p>
                  @else
                    <p class="font-poppins font-normal text-white text-xl">{{$categoria->description}}</p>
                  @endif
            </div>
            <div class="flex flex-col items-start lg:items-end justify-end w-[100%] lg:w-[60%] p-0">
                <img class="bg-cover bg-bottom object-right-bottom " src="{{ asset('/images/img/jl_banner4.png') }}" />
            </div>
        </section>

        @if ($categorias->isEmpty()) 
        @else
         <section id="categorias" class="flex flex-col w-full gap-12 relative mt-[15%] lg:mt-[5%]">
             <div class="w-full px-[5%] lg:px-[5%]  flex flex-col gap-4 md:flex-row justify-between">
                 <h2 class=" font-poppins font-bold text-3xl  leading-none text-colorJL">
                     Nuestras Categorías
                 </h2>
                 <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2">
                    <a href="{{route('catalogo.all')}}">Ver todas las categorías</a><img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
             </div>
             
             <div class="swiper categorias flex flex-row w-full !px-[5%] !lg:pl-[5%]">
                 <div class="swiper-wrapper">
                   @foreach ($categorias as $slide) 
                     <div class="swiper-slide">
                         <div class="flex flex-col">
                             <div class="grid grid-cols-1 lg:grid-cols-3 px-12 py-16 rounded-3xl h-72 bg-cover 
                               @if (!$category == 0)
                                {{ $slide->slug == $category ? '' : 'grayscale' }} 
                               @else
                                {{ $slide->slug == 0 ? 'grayscale' : '' }}   
                               @endif 
                                hover:filter-none"

                                 @if ($slide->name_image)
                                 style="background-image: url('{{ asset($slide->url_image . $slide->name_image) }}');"
                                 @else
                                 style="background-image: url('{{ asset('images/img/noimagen.jpg') }}');"
                                 @endif>
                                 <div class="flex flex-col gap-6 justify-center items-start lg:col-span-2">
                                     <h2 class="font-bold font-poppins text-4xl leading-tight  text-white  text-left">
                                         {{ $slide->name }}
                                     </h2>
                                     <a href="/catalogo/{{ $slide->slug }}">
                                         <div
                                             class="flex flex-row items-center gap-1 px-4 py-3 text-base text-colorJL bg-coloBkthirdJL font-poppins font-bold rounded-3xl w-44">
                                             Ver productos <img src="{{ asset('/images/svg/jl_arrow2.svg') }}" /></div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                   @endforeach  
                 </div>
             </div>
 
             {{-- <div class="custom-swiper-buttons absolute bottom-0">
                 <div class="flex flex-row gap5 w-24">
                     <div class="swiper-button-prev left-0"></div>
                     <div class="swiper-button-next left-28"></div>
                 </div>
             </div> --}}
         </section>
        @endif 

        @if ($productos->isEmpty()) 
        @else
         <section class="py-6 lg:pb-6 flex flex-col gap-12 relative w-full px-[5%] lg:px-[5%] mt-10">
            <div class="flex flex-col gap-4 md:flex-row justify-between">
                <h2 class=" font-poppins font-bold text-3xl  leading-none text-colorJL">
                    Todos juguetes
                </h2>
                <div class="font-bold font-poppins text-base text-color2JL flex flex-row items-center gap-2 border-2 rounded-3xl px-4 py-2 border-orange-600">Ordenar <img src="{{ asset('/images/svg/jl_arrow.svg') }}" /></div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-8">
                @foreach ($productos as $item)
                    <x-product.container-carousel :item="$item" />  
                @endforeach
            </div>
         </section>
        @endif
        
         <section class="flex flex-col lg:flex-row gap-0 lg:gap-12 relative w-full pl-[3%] lg:pl-[5%] bg-cover bg-no-repeat mt-14"
            style="background-image: url('{{ asset('images/img/jl_banner6.png') }}');">
            <div class="flex flex-col items-start justify-center py-12 lg:py-24 w-[100%] lg:w-[40%] gap-7">
                <div class="flex flex-col lg:flex-row gap-6">
                    <p class="font-poppins font-bold text-white text-8xl">50%</p>
                    <h3 class="font-poppins font-bold text-white text-4xl">descuento en juguetes</h3>
                </div>
                <p class="font-poppins font-normal text-white text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Vivamus eu fermentum justo, ac fermentum nulla.
                    Sed sed scelerisque urna, vitae ultrices libero. Pellentesque vehicula et urna in venenatis.</p>
                <div
                    class="flex flex-row items-center gap-1 px-5 py-3 text-base text-white bg-coloBkprimJl font-poppins font-bold rounded-3xl w-auto">
                    Ver los Descuentos <img src="{{ asset('/images/svg/jl_flechablanco.svg') }}" /></div>
            </div>
            <div class="flex flex-col items-end justify-end w-[100%] lg:w-[60%] p-0">
                <img class="bg-cover bg-bottom object-right-bottom " src="{{ asset('/images/img/jl_banner7.png') }}" />
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
        document.addEventListener("DOMContentLoaded", function() {
            // Captura el click de abrir
            /*  const openModal = document.querySelector(".mostrar-modal"); */
            // Captura al modal que se quiere mostrar
            const modal = document.querySelector(".modal-filtros");
            //Captura el evento de cierre
            const closeModal = document.querySelector(".modal__close-filtro");
            // Captura el body para bloqueo
            const body = document.querySelector(".body");

            const hiddenCategoriaPrecio = document.querySelector(
                ".hidden-categoria-precio"
            );

            const open = document.querySelector(".open");
            const showCategoriaPrecio = document.querySelector(".show-categoria-precio");
            const addCategoriaPrecio = document.querySelector(".addCategoriaPrecio");
            let openModal = null;

            function getWidth() {
                // Corregir el modal !importante
                let width = window.innerWidth;
                if (width < 768) {
                    //Habilita el click para modal
                    open.classList.add("mostrar-modal", "cursor-pointer");
                    openModal = document.querySelector(".mostrar-modal");
                    openModal.addEventListener("click", showModal);
                    hiddenCategoriaPrecio.innerHTML = "";
                } else {
                    // Quita la opcion de click
                    open.classList.remove("mostrar-modal", "cursor-pointer");
                    if (openModal) {
                        openModal.removeEventListener("click", showModal);
                        showCategoriaPrecio.classList.remove("hidden");
                        hiddenCategoriaPrecio.innerHTML = showCategoriaPrecio.innerHTML;
                    }
                }
            }

            function showModal(e) {
                e.preventDefault();

                addCategoriaPrecio.innerHTML = showCategoriaPrecio.innerHTML;
                hiddenCategoriaPrecio.innerHTML = "";

                modal.classList.add("modal--show-filtro");
                body.classList.add("overflow-hidden");

                modal.style.display = "flex";
            }

            getWidth(); // Se ejecuta por primera vez
            window.addEventListener("resize", getWidth);

            closeModal.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.remove("modal--show-filtro");
                body.classList.remove("overflow-hidden");
            });

            // Función para cerrar el modal
            function closeModa(event) {
                if (event.target === modal) {
                    modal.classList.remove("modal--show-filtro");
                    body.classList.remove("overflow-hidden");

                    /* hiddenCategoriaPrecio.innerHTML = addCategoriaPrecio.innerHTML; */
                }
            }

            window.addEventListener("click", closeModa);
        });
    </script>

    <script>
        $(document).ready(function() {


            function capitalizeFirstLetter(string) {
                string = string.toLowerCase()
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        })
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
    //       <div class="flex justify-center items-center gap-5">
    //         <div class="bg-[#F3F5F7] rounded-md p-4">
    //           <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //         </div>
    //         <div class="flex flex-col gap-3 py-2">
    //           <h3 class="font-semibold text-[14px] text-[#151515]">
    //             ${element.producto}
    //           </h3>
    //           <p class="font-normal text-[12px] text-[#6C7275]">

    //           </p>
    //           <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
    //             <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
    //               <span  class="text-[20px]">-</span>
    //             </button>
    //             <div class="w-8 h-8 flex justify-center items-center">
    //               <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //             </div>
    //             <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
    //               <span class="text-[20px]">+</span>
    //             </button>
    //           </div>
    //         </div>
    //       </div>
    //       <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //         <p class="font-semibold text-[14px] text-[#151515]">
    //           S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //         </p>
    //         <div class="flex items-center">
    //           <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
    //           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    //             <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    //           </svg>
    //           </button>

    //         </div>
    //       </div>
    //     </div>`

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
