@extends('components.public.matrix', ['pagina' => ''])

@section('css_importados')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


@stop


@section('content')


  <main>
    <section class="font-poppins w-11/12 mx-auto my-8 flex flex-col gap-5">
      <x-breadcrumb>
        <x-breadcrumb.item>Carrito</x-breadcrumb.item>
      </x-breadcrumb>
      {{-- <div>
        <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">Home</a>
        <span>/</span>
        <a href="carrito.html" class="font-semibold text-[14px] text-[#141718]">Carrito</a>
      </div> --}}

      {{-- <div class="flex flex-col">
        <label for="email" class="font-medium text-[12px] text-[#6C7275]">E-mail</label>

        <input id="email" type="email" placeholder="Correo electrónico" required name="email" value=""
          class=" py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
      </div> --}}
      <div class="flex md:gap-20">
        <div class="flex justify-between items-center md:basis-8/12 w-full md:w-auto">
          <x-ecommerce.gateway.container>
            <div class="flex flex-col 2lg:flex-row pb-5 border-b-[2px] border-[#E8ECEF] gap-5">
              <table>
                <tbody id="itemsCarritoCheck">

                </tbody>
              </table>
            </div>
          </x-ecommerce.gateway.container>
        </div>
        <div class="basis-4/12 flex flex-col justify-start gap-5">
          <h2 class="font-semibold text-[20px] text-[#151515]">
            Resumen de la compra
          </h2>
          <div>
            <div class="flex flex-col gap-5">
              <div class="text-[#151515] flex justify-between items-center">
                <p class="font-normal text-[14px]">SubTotal</p>
                <span id="itemSubtotal" class="font-semibold text-[14px]">s/ 114.00</span>
              </div>
              <div class="text-[#151515] flex justify-between items-center">
                <p class="font-semibold text-[20px]">Total</p>
                <span id="itemTotal" class="font-semibold text-[20px]">s/ 0.00</span>
              </div>
              <a id="btnSiguiente" href="/pago"
                class="text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer font-semibold text-[16px] inline-block text-center">Siguiente</a>
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
      $('#itemsCarrito').html('')
      $('#itemsCarritoCheck').html('')
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
    })
    $('input[type="radio"][name="bordered-radio"]').on('click', function() {
      // Obtener el valor del radio button seleccionado
      const valorSeleccionado = $(this).val();


      articulosCarrito = Local.get('carrito') ?? []
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

      Local.set("carrito", carritoCheck)
      checkedRadio = true

      // Hacer algo con el valor seleccionado, por ejemplo, imprimirlo en la consola
      limpiarHTML()
      PintarCarrito()
    });
    $("#btnSiguiente").on('click', function(e) {
      const carrito = Local.get('carrito') ?? []
      if (carrito.length == 0) {
        e.preventDefault()
        Swal.fire({
          title: `Ups!!`,
          text: `Debes agregar al menos un producto al carrito`,
          icon: "error"
        });
      }
    })
  </script>
@stop

@stop
