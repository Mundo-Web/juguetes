@extends('components.public.matrix')

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

    <main class="my-10 font-poppins" id="mainSection">
        <section class="w-11/12 mx-auto flex flex-col md:flex-row gap-10">
            @csrf
            <div class="basis-1/2">
                <!-- grilla de productos -->
                <div class="hidden md:block">
                    @php
                        $cantidadGaleria = count($productosConGalerias);
                    @endphp

                    @if ($cantidadGaleria == 0)
                        <div class="grid grid-cols-1 gap-10">
                            <div class="flex flex-col items-start bg-[#F3F5F7]  rounded-2xl">
                                <div class="bg-[#38CB89] rounded-md px-5 py-1 mt-[1%] ml-[1%] absolute">
                                    <p class="text-white font-semibold text-[12px]">-30%</p>
                                </div>

                                <div class="flex justify-center w-full">

                                    @if ($productos[0]->imagen)
                                        <img src="{{ asset($productos[0]->imagen) }}" alt="{{ $productos[0]->name }}"
                                            class="w-full  object-contain " />
                                    @else
                                        <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                                            class="w-full  object-contain " />
                                    @endif

                                </div>
                            </div>
                            @foreach ($productosConGalerias as $galeria)
                                <div class="flex justify-center items-center rounded-2xl object-cover bg-cover"
                                    style="background-image: url('{{ asset($galeria->imagen) }}')">
                                    <img src="{{ asset($galeria->imagen) }}" alt="piso_flotante_laminado_2"
                                        class="w-full object-cover bg-cover rounded-2xl" />
                                </div>
                            @endforeach


                        </div>
                    @else
                        <div class="grid grid-cols-2 gap-10">
                            <div class="flex flex-col items-start bg-[#F3F5F7]  rounded-2xl">
                                <div class="bg-[#38CB89] rounded-md px-5 py-1 mt-[1%] ml-[1%] absolute">
                                    <p class="text-white font-semibold text-[12px]">-30%</p>
                                </div>

                                <div class="flex justify-center w-full">

                                    @if ($productos[0]->imagen)
                                        <img src="{{ asset($productos[0]->imagen) }}" alt="{{ $productos[0]->name }}"
                                            class="w-full  object-contain " />
                                    @else
                                        <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                                            class="w-full  object-contain " />
                                    @endif

                                </div>
                            </div>
                            @foreach ($productosConGalerias as $galeria)
                                <div class="flex justify-center items-center rounded-2xl object-cover bg-cover"
                                    style="background-image: url('{{ asset($galeria->imagen) }}')">
                                    <img src="{{ asset($galeria->imagen) }}" alt="piso_flotante_laminado_2"
                                        class="w-full object-cover bg-cover rounded-2xl" />
                                </div>
                            @endforeach


                        </div>
                    @endif
                </div>

                <!-- carrusel de productos -->
                <div class="block md:hidden">
                    <div class="swiper producto-slider">
                        <div class="swiper-wrapper swiper-wrapper-height">

                            <div class="swiper-slide swiper-slide-flex rounded-2xl">
                                <div class="flex flex-col items-start bg-[#F3F5F7] gap-12 relative">
                                    <div class="bg-[#38CB89] rounded-md px-5 py-1 mt-10 ml-10 absolute">
                                        <p class="text-white font-semibold text-[12px]">-30%</p>
                                    </div>

                                    <div class="flex justify-center w-full">
                                        @if ($productos[0]->imagen)
                                            <img src="{{ asset($productos[0]->imagen) }}" alt="{{ $productos[0]->name }}"
                                                class="w-full  object-contain " />
                                        @else
                                            <img src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                                                class="w-full  object-contain " />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @foreach ($productosConGalerias as $galeria)
                                <div class="swiper-slide">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($galeria->imagen) }}" alt="{{ asset($galeria->imagen) }}" />
                                    </div>
                                </div>
                            @endforeach



                        </div>
                        <div class="swiper-pagination-productos mt-10"></div>
                    </div>
                </div>
            </div>
            <div class="basis-1/2 font-poppins flex flex-col gap-5">
                <div class="border-b-[1px] border-gray-300 flex flex-col gap-5">
                    <h2 class="font-medium text-[40px] leading-none md:leading-tight">
                        {{ $productos[0]->producto }}
                    </h2>
                    <p class="font-normal text-[16px]">
                        {{ $productos[0]->extract }}
                    </p>
                    @if ($productos[0]->descuento > 0)
                        <!-- validamos si tiene descuento  -->
                        <p id='infodescuento' class="font-medium text-[28px] mb-5">
                            s/ {{ $productos[0]->descuento }}
                            <span id='infoPrecio'
                                class="line-through font-medium text-[20px] text-[#6C7275]">{{ $productos[0]->precio }}</span>
                        </p>
                    @else
                        <p id='nodescuento' class="font-medium text-[28px] mb-5">
                            s/ {{ $productos[0]->precio }}

                        </p>
                    @endif

                </div>
                <div class="border-b-[1px] border-gray-300 flex flex-col gap-5">
                    <div class="flex flex-col gap-5">
                        <table class="border-collapse w-full">
                            <tbody>
                                @foreach ($especificaciones as $item)
                                    <tr>
                                        <td
                                            class="border w-1/5 border-gray-400 px-3 py-2 font-semibold text-[16px] text-gray-900">
                                            {{ capitalizeFirstLetter($item->tittle) }}:</td>
                                        <td class="border w-4/5 border-gray-400 px-3 py-2 font-normal text-[15px]">
                                            {{ capitalizeFirstLetter($item->specifications) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        
                          <div class="flex flex-col gap-5 mt-3">
                            <div class="md:col-span-5">

                                <div class="flex gap-2 mt-2 relative mb-2 ">
                                    @if ($product->attributes->isNotEmpty())
                                        @foreach ($product->attributes->unique() as $atributo)
                                            <div>

                                                @if ($atributo->type === 'Circulos')
                                                    <p class="font-mediumDisplay text-text16 md:text-text20 pb-4">
                                                        Gama de colores:
                                                    </p>

                                                    <div class="flex gap-5 justify-start items-center">
                                                        @php
                                                            $attributeValues = $atributo->attributeValues->whereIn(
                                                                'id',
                                                                $product->attributes->pluck('pivot.attribute_value_id'),
                                                            );
                                                        @endphp

                                                        @foreach ($attributeValues as $valor)
                                                            <div style="background-color: {{ $valor->color }}"
                                                                class="colors w-12 h-12 rounded-[50%] transition">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="flex">
                            <div
                                class="w-14 h-14 flex justify-center items-center bg-[#F5F5F5] cursor-pointer hover:bg-slate-300">
                                <button id=disminuir type="button"><span class="text-[30px]">-</span></button>
                            </div>
                            <div id=cantidadSpan class="w-14 h-14 flex justify-center items-center bg-[#F5F5F5]">
                                <span class="text-[20px]">1</span>
                            </div>
                            <div
                                class="w-14 h-14 flex justify-center items-center bg-[#F5F5F5] cursor-pointer hover:bg-slate-300">
                                <button id=aumentar type="button"><span class="text-[30px]">+</span></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="my-5 flex flex-col gap-5  border-b-[1px] border-gray-300 pb-5">
                    <div class="py-2 w-full">


                        <button type="button" id='btnAgregarCarrito'
                            class="text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer font-semibold text-[16px] inline-block text-center hover:bg-green-950">
                            Agregar al carrito
                        </button>

                    </div>

                    <div class="py-2 w-full">
                        <a href="#"
                            class="text-[#74A68D] bg-white w-full py-4 rounded-3xl cursor-pointer border-[1px] border-black font-semibold text-[16px] inline-block text-center hover:bg-slate-300">Comprar</a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex">
                        <p class="font-normal text-[12px] text-[#6C7275] flex-initial w-44">
                            Sku
                        </p>
                        <p class="font-normal text-[12px] text-[#141718]"> </p>
                    </div>

                    <div class="flex">
                        <p class="font-normal text-[12px] text-[#6C7275] flex-initial w-44">
                            Categoría
                        </p>
                        <p class="font-normal text-[12px] text-[#141718]">
                            @if ($productos[0]->categoria->name)
                              {{$productos[0]->categoria->name}}
                            @else
                               S/C  
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="font-poppins flex w-11/12 mx-auto my-10">
            <div class="md:basis-1/2">
                <h2 class="font-medium text-[28px] my-5 leading-none md:leading-tight">
                    Información adicional
                </h2>
                <div class="flex flex-col gap-5">
                    {!! $productos[0]->description !!}
                </div>
            </div>
        </section>

        <section class="font-poppins">
            <div class="grid grid-cols-1 gap-12 md:gap-0 md:grid-cols-4 grid-rows-1 pt-12 w-11/12 mx-auto">
                <div class="col-span-1 md:col-span-3 order-1 md:order-1 flex flex-col gap-2">
                    <h2 class="font-medium text-[36px] md:text-[40px] mt-2 leading-none md:leading-tight">
                        Productos complementarios
                    </h2>

                    <p class="font-normal text-lg basis-3/6">
                        Revisa nuestros productos complementarios y sorpréndete con su calidad. ¡Encontrarás lo mejor en
                        Wall Panel en el mercado!
                    </p>
                </div>

                <div class="col-span-1 md:col-span-1 order-3 md:order-2 flex justify-center items-center w-full">
                    <a href="catalogo.html"
                        class="font-semibold text-[16px] bg-transparent md:duration-500 py-4 px-5 rounded-3xl border-[1px] border-colorBorder flex-initial w-full md:w-56 text-center inline-block">
                        Ver todo
                    </a>
                </div>

                <div class="col-span-1 md:col-span-4 order-2 md:order-3">
                    <!-- ---- CARRUSEL --- -->
                    <div>
                        <div class="swiper productos-destacados my-5">
                            <div class="swiper-pagination-productos-destacados mb-80 md:mb-32"></div>
                            <div class="swiper-wrapper mt-[80px]">

                                @foreach ($ProdComplementarios as $item)
                                    <div class="swiper-slide rounded-2xl">
                                        <div class="flex flex-col relative">
                                            <div
                                                class="bg-colorBackgroundProducts rounded-2xl pt-12 pb-5 md:pb-8 product_container basis-4/5 flex flex-col justify-center relative">
                                                <div class="px-4">
                                                    <a
                                                        class="font-semibold text-[8px] md:text-[12px] bg-[#EB5D2C] py-2 px-2 flex-initial w-24 text-center text-white rounded-[5px] absolute top-[18px] z-10">
                                                        Nuevo
                                                    </a>
                                                </div>
                                                <div>
                                                    <div class="relative flex justify-center items-center">
                                                        @if ($item->imagen)
                                                            <img src="{{ asset($item->imagen) }}"
                                                                alt="{{ $item->name }}"
                                                                class="w-full h-30 object-contain" />
                                                        @else
                                                            <img src="{{ asset('images/img/noimagen.jpg') }}"
                                                                alt="imagen_alternativa"
                                                                class="w-full h-30 object-contain" />
                                                        @endif
                                                    </div>

                                                    <!-- ------ -->
                                                    <div class="addProduct text-center flex justify-center">
                                                        <a href="{{ route('producto', $item->id) }}"
                                                            class="font-semibold text-[9px] md:text-[16px] bg-[#74A68D] py-3 px-5 flex-initial w-32 md:w-56 text-center text-white rounded-3xl">
                                                            Ver producto
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-2 flex flex-col items-start gap-2 basis-1/5 px-2">
                                                <!-- <div class="flex items-center gap-2">
                                                                        <div class="flex gap-2 py-2">
                                                                            <img src="./images/svg/start.svg" alt="estrella" />
                                                                            <img src="./images/svg/start.svg" alt="estrella" />
                                                                            <img src="./images/svg/start.svg" alt="estrella" />
                                                                            <img src="./images/svg/start_sin_color.svg" alt="estrella" />
                                                                            <img src="./images/svg/start_sin_color.svg" alt="estrella" />
                                                                        </div>
                                                                        <p class="font-semibold text-[14px] text-[#6C7275]">
                                                                            (35)
    </p>
                                                                    </div> -->
                                                <h2 class="font-semibold text-[16px] text-[#141718]">
                                                    {{ $item->producto }}
                                                </h2>
                                                <p class="font-semibold text-[14px] text-[#121212] flex gap-5">
                                                    @if ($item->descuento == 0)
                                                        <span>{{ $item->precio }}</span>
                                                    @else
                                                        <span>{{ $item->descuento }}</span>
                                                        <span
                                                            class="font-normal text-[14px] text-[#6C7275] line-through">{{ $item->precio }}</span>
                                                    @endif



                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- <div class="swiper-pagination-productos-destacados"></div>  -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>




@section('scripts_importados')

    <script>
        $(document).ready(function() {


            function capitalizeFirstLetter(string) {
                string = string.toLowerCase()
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        })
        $('#disminuir').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
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



        function PintarCarrito() {

            let itemsCarrito = $('#itemsCarrito')

            articulosCarrito.forEach(element => {
                let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
            <div class="flex justify-center items-center gap-5">
              <div class="bg-[#F3F5F7] rounded-md p-4">
                <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
              </div>
              <div class="flex flex-col gap-3 py-2">
                <h3 class="font-semibold text-[14px] text-[#151515]">
                  ${element.producto}
                </h3>
                <p class="font-normal text-[12px] text-[#6C7275]">
                  
                </p>
                <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
                  <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
                    <span  class="text-[20px]">-</span>
                  </button>
                  <div class="w-8 h-8 flex justify-center items-center">
                    <span  class="font-semibold text-[12px]">${element.cantidad }</span>
                  </div>
                  <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
                    <span class="text-[20px]">+</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
              <p class="font-semibold text-[14px] text-[#151515]">
                S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
              </p>
              <div class="flex items-center">
                <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                </button>

              </div>
            </div>
          </div>`

                itemsCarrito.append(plantilla)

            });

            calcularTotal()
            mostrarTotalItems()
        }






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
        $('#openCarrito').on('click', function() {
            $('.main').addClass('blur')
        })
        $('#closeCarrito').on('click', function() {

            $('.cartContainer').addClass('hidden')
            $('#check').prop('checked', false);
            $('.main').removeClass('blur')


        })
    </script>

    <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
