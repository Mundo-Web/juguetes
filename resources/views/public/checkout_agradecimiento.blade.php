@extends('components.public.matrix', ['pagina'=>' '])

@section('css_importados')

@stop


@section('content')

  <main>
    <section class="font-poppins my-12 w-11/12 mx-auto">
      <div class="flex flex-col 2md:flex-row gap-32 md:gap-10 w-11/12 mx-auto">
        <div class="md:basis-1/2 flex flex-col gap-10 basis-0">
          <div>
            <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">
              Home
            </a>
            <span>/</span>
            <a href="carrito.html" class="font-semibold text-[14px] text-[#141718]">Carrito</a>
          </div>

          <div class="flex justify-between items-center w-full">
            <p
              class="font-semibold text-[18px] text-[#EB5D2C] border-b-[1px] border-[#EB5D2C] md:px-4 py-4 basis-1/3 h-full text-center">
              <span class="flex items-center h-full">Carro de compra</span>
            </p>

            <p
              class="font-semibold text-[18px] text-[#EB5D2C] border-b-[1px] border-[#EB5D2C] md:px-4 py-4 basis-1/3 h-full text-center">
              <span class="flex items-center h-full">Detalles de pago</span>
            </p>

            <p
              class="font-medium text-[18px] text-[#21201E] border-b-[1px] border-[#21201E] md:px-4 py-4 basis-1/3 h-full text-center">
              <span class="flex items-center h-full">Orden completada</span>
            </p>
          </div>
        </div>
      </div>

      <div class="flex flex-col justify-start gap-10 max-w-[600px] mx-auto pt-10 text-center">
        <div class="font-poppins flex flex-col gap-4 justify-center items-center">
          <p class="text-[#6C7275] font-medium text-[20px]">
            Gracias por tu compra &#127881;
          </p>
          <h2 class="font-semibold text-[40px] text-[#151515]">
            Tu orden ha sido recibida
          </h2>
          <p class="font-medium text-[16px] text-[#6C7275]">
            Código de pedido
          </p>
          <p id="codigoPedido" class="font-semibold text-[16px] text-[#141718]">#0123_45678</p>
        </div>

        <div class="font-poppins">
          <div>
            <div class="flex flex-col 2lg:flex-row pb-5 border-b-[2px] border-[#E8ECEF] gap-5">
              <div class="w-full basis-5/12" id="itemsCarritoAgradecimientos">

              </div>



            </div>
          </div>

        </div>
      </div>

      <div class="flex flex-col gap-5">
        <div>
          <a href="{{ route('catalogo.all') }}"
            class="text-white bg-[#74A68D] w-full py-3 rounded-2xl cursor-pointer font-semibold text-[16px] inline-block text-center">Seguir
            comprando</a>
        </div>

        <div>
          <a href="{{ route('pedidos') }}"
            class="text-[#151515] bg-[#FFFFFF] w-full py-3 rounded-2xl cursor-pointer font-semibold text-[16px] inline-block text-center border-[1.5px] border-[#151515]">Historial
            de compras</a>
        </div>
      </div>
      </div>
    </section>
  </main>


@section('scripts_importados')
  <script>
    let articulosCarrito
    let appUrl = localStorage.getItem('appUrl')
    appUrl = appUrl.replace(/^"(.*)"$/, '$1'); // Elimina las comillas dobles al principio y al final de la cadena


    $(document).ready(function() {
      articulosCarrito = Local.get('carrito');
      let urlActual = window.location.href;

      // Crear un objeto URLSearchParams con la URL actual
      const parametrosURL = new URLSearchParams(window.location.search)

      // Obtener el valor del parámetro 'codigoCompra'
      let codigoCompra = parametrosURL.get('codigoCompra');
      console.log(articulosCarrito)
      PintarCarrito()
      $('#codigoPedido').text(`#${codigoCompra}`)
    });

    // function PintarCarrito() {

    //   let itemsCarrito = $('#itemsCarritoAgradecimientos')


    //   articulosCarrito.forEach(element => {
    //     let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
    //         <div class="flex justify-center items-center gap-5">
    //           <div class="bg-[#F3F5F7] rounded-md p-4">
    //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
    //           </div>
    //           <div class="flex flex-col gap-3 py-2">
    //             <h3 class="font-semibold text-[14px] text-[#151515]">
    //               ${element.producto}
    //             </h3>
    //             <p class="font-normal text-[12px] text-[#6C7275]">
                  
    //             </p>
    //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
                  
    //               <div class="w-8 h-8 flex justify-center items-center">
    //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
    //               </div>
                  
    //             </div>
    //           </div>
    //         </div>
    //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
    //           <p class="font-semibold text-[14px] text-[#151515]">
    //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
    //           </p>
    //           <div class="flex items-center">
                

    //           </div>
    //         </div>
    //       </div>`

    //     itemsCarrito.append(plantilla)

    //   });
    //   console.log(itemsCarrito)
    //   Local.destroy('carrito')
    //   // calcularTotal()
    // }
  </script>
  <script src="{{ asset('js/storage.extend.js') }}"></script>

@stop

@stop
