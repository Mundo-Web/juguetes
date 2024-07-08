@extends('components.public.matrix', ['pagina'=>''])

@section('css_importados')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


@stop


@section('content')


  <main>
    <section class="font-poppins w-11/12 mx-auto my-8 flex flex-col gap-5">
      <div>
        <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">Home</a>
        <span>/</span>
        <a href="carrito.html" class="font-semibold text-[14px] text-[#141718]">Carrito</a>
      </div>
      
      {{-- <div class="flex flex-col">
        <label for="email" class="font-medium text-[12px] text-[#6C7275]">E-mail</label>

        <input id="email" type="email" placeholder="Correo electrónico" required name="email" value=""
          class=" py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
      </div> --}}

      <div class="flex md:gap-20">
        <div class="flex justify-between items-center md:basis-7/12 w-full md:w-auto">
          <p
            class="font-semibold text-[18px] text-[#21201E] border-b-[1px] border-[#6C7275] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Carro de compra</span>
          </p>

          <p
            class="font-medium text-[18px] text-[#C8C8C8] border-b-[1px] border-[#6C7275] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Detalles de pago</span>
          </p>

          <p
            class="font-medium text-[18px] text-[#C8C8C8] border-b-[1px] border-[#6C7275] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Orden completada</span>
          </p>
        </div>
        <div class="md:basis-5/12"></div>
      </div>
      <div class="flex flex-col md:flex-row gap-20">
        <div class="basis-7/12 flex flex-col gap-10">
          <div>
            <div class="flex flex-col 2lg:flex-row pb-5 border-b-[2px] border-[#E8ECEF] gap-5">
              <table>
                <tbody id="itemsCarritoCheck">

                </tbody>
              </table>
              {{-- <div class="w-full basis-5/12" id="itemsCarritoCheck">

              </div> --}}
            </div>
          </div>
        </div>

        <div class="basis-5/12 flex flex-col justify-start gap-5">
          <h2 class="font-semibold text-[20px] text-[#151515]">
            Resumen de la compra
          </h2>

          <div>
            <div class="flex flex-col gap-5">
              {{-- <div class="w-full flex flex-col gap-5">
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                  <input type="radio" id="bordered-radio-2" name="bordered-radio" value="15"
                    class="background-radius w-5 h-5" />
                  <label for="bordered-radio-2"
                    class="w-full py-4 ms-2 text-[16px] font-normal text-[#151515] flex justify-between items-center px-4">
                    <span>Envío express</span>
                    <span>s/ 15.00</span>
                  </label>
                </div>

                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                  <input type="radio" id="bordered-radio-3" name="bordered-radio" value="0"
                    class="background-radius w-5 h-5" />
                  <label for="bordered-radio-3"
                    class="w-full py-4 ms-2 text-[16px] font-normal text-[#151515] flex justify-between items-center px-4">
                    <span>Recoger</span>
                    <span>Gratis</span>
                  </label>
                </div>
              </div> --}}

              <div class="text-[#151515] flex justify-between items-center">
                <p class="font-normal text-[14px]">SubTotal</p>
                <span id="itemSubtotal" class="font-semibold text-[14px]">s/ 114.00</span>
              </div>

              <div class="text-[#151515] flex justify-between items-center">
                <p class="font-semibold text-[20px]">Total</p>
                <span id="itemsTotalCheck" class="font-semibold text-[20px]">s/ 0.00</span>
              </div>

              <a id="btnSiguiente" href="/pago"
                class="text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer font-semibold text-[16px] inline-block text-center">Siguiente</a>

              <!-- <input
                                                                                                            type="submit"
                                                                                                            value="Siguiente"
                                                                                                            class="text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer font-semibold text-[16px] inline-block text-center"
                                                                                                          /> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>




@section('scripts_importados')
  <script>
    let articulosCarrito = [];
    let checkedRadio = false


    function deleteOnCarBtn(id, operacion) {
      console.log('Elimino un elemento del cvarrio');
      const prodRepetido = articulosCarrito.map(item => {
        if (item.id === id && item.cantidad > 0) {
          item.cantidad -= Number(1);
          return item; // retorna el objeto actualizado 
        } else {
          return item; // retorna los objetos que no son duplicados 
        }

      });

      Local.set("carrito", articulosCarrito)
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

      $('#itemSubtotal').text(`S/. ${suma} `)
      const opciones = document.getElementsByName('bordered-radio');

      // Iterar sobre los radio buttons para encontrar el que está seleccionado
      let valorSeleccionado = 0;
      opciones.forEach(opcion => {
        if (opcion.checked) {
          valorSeleccionado = opcion.value;
        }
      });

      // El valor de valorSeleccionado es el valor del radio button seleccionado


      total = Number(suma) + Number(valorSeleccionado)

      let carrito = Local.get('carrito')
      // carrito = [...carrito, carrito.total]
      Local.set("carrito", carrito)

      $('#itemsTotalCheck').text(`S/. ${total} `)

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
      Local.set("carrito", articulosCarrito)
      // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
      limpiarHTML()
      PintarCarrito()


    }

    function deleteItem(id) {
      articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

      Local.set("carrito", articulosCarrito)
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
      $('#itemsCarritoCheck').html('')


    }



    // function PintarCarrito() {

    //   let itemsCarrito = $('#itemsCarrito')
    //   let itemsCarritoCheck = $('#itemsCarritoCheck')

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
    //     itemsCarritoCheck.append(plantilla)

    //   });

    //   mostrarTotalItems()
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
            color,
            tipo_envio: 0

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

          localStorage.setItem('carrito', JSON.stringify(articulosCarrito));

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
    //   $('.main').addClass('blur')
    // })
    // $('#closeCarrito').on('click', function() {
    //   $('.main').removeClass('blur')
    //   $('.cartContainer').addClass('hidden')
    //   $('#check').prop('checked', false);

    // })
    $('input[type="radio"][name="bordered-radio"]').on('click', function() {
      // Obtener el valor del radio button seleccionado
      const valorSeleccionado = $(this).val();


      articulosCarrito = Local.get('carrito')
      let carritoCheck = articulosCarrito.map(item => {
        let obj = {
          id: item.id,
          producto: item.producto,
          descuento: item.descuento,
          precio: item.precio,
          imagen: item.imagen,
          cantidad: item.cantidad,
          color: item.color,
          tipo_envio: Number(valorSeleccionado)
        };
        return obj
      })

      console.log(carritoCheck)
      Local.set("carrito", carritoCheck)
      checkedRadio = true

      // Hacer algo con el valor seleccionado, por ejemplo, imprimirlo en la consola
      limpiarHTML()
      PintarCarrito()
    });
    // $("#btnSiguiente").on('click', function(e) {

    //   console.log(checkedRadio)
    //   if (!checkedRadio) {
    //     e.preventDefault()
    //     Swal.fire({

    //       icon: "warning",
    //       title: "Opss ",
    //       text: 'Recuerde elegir un metodo de envio'


    //     });

    //   }
    // })
  </script>
  <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
