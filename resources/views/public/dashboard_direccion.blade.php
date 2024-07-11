@extends('components.public.matrix', ['pagina' => ' '])

@section('css_importados')

@stop


@section('content')



  <main>
    <form id="modal-address" class="!max-w-[600px]" style="display: none; padding: 0">
      @csrf
      <input type="hidden" id="id" name="id" value="">
      <div class="flex flex-col gap-4 p-8">
        <p class="text-gray-500">Nota: En algunos casos podrías no encontrar tu ciudad. Eso quiere decir que no tenemos
          cobertura para dicho lugar.</p>
        <div class="flex flex-col gap-4">
          <div class="flex flex-col gap-4 md:flex-row">
            <div class="basis-1/3 flex flex-col gap-3 z-[45]">
              <label class="font-medium text-sm text-gray-600">Departamento <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown w-full">
                  <select name="departamento_id" id="departamento_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%]  pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="basis-1/3 flex flex-col gap-3 z-[40]">
              <label class="font-medium text-sm text-gray-600">Provincia <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown-provincia w-full">
                  <select name="provincia_id" id="provincia_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%]  pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="basis-1/3 flex flex-col gap-3 z-[30]">
              <label class="font-medium text-sm text-gray-600">Distrito <span class="text-red-500">*</span></label>
              <div>
                <div class="dropdown-distrito w-full">
                  <select name="distrito_id" id="distrito_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%] pl-3 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 select2-hidden-accessible"
                    required>
                    <option value="">- Seleccione -</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-col gap-3">
            <label for="street" class="font-medium text-sm text-gray-600">Avenida / Calle / Jirón <span
                class="text-red-500">*</span></label>
            <input id="street" type="text" name="street" placeholder="Ingresa el nombre de la calle"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700"
              required>
          </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
          <div class="basis-1/3 flex flex-col gap-3">
            <label for="number" class="font-medium text-sm text-gray-600">Número <span
                class="text-red-500">*</span></label>
            <input id="number" name="number" type="text" placeholder="Ingresa el número de la calle"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700"
              required>
          </div>

          <div class="basis-2/3 flex flex-col gap-3">
            <label for="description" class="font-medium text-sm text-gray-600">Dpto./ Interior/ Piso/ Lote/ Bloque
              (opcional)</label>
            <input id="description" type="text" name="description" placeholder="Ejem. Casa 3, Dpto 101"
              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-base border-2 border-gray-200 rounded-xl text-gray-700">
          </div>
        </div>
        <button type="submit"
          class="w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Agregar direccion
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </button>
      </div>
    </form>

    <!--  -->
    <section class="font-poppins my-8 md:my-16">
      <div class="flex flex-col gap-12 md:flex-row md:gap-24 w-full md:w-11/12 mx-auto">
        <div class="bg-[#F3F5F7] md:bg-white py-5 md:py-0">
          <div class="w-11/12 md:w-full mx-auto">
            <div class="basis-5/12 flex flex-col gap-5">
              <div class="flex flex-col gap-5">
                <div class="rounded-full w-24 h-24 bg-[#E9EDEF] flex justify-center items-center relative">
                  <img class="w-full h-full rounded-full" src="{{ Auth::user()->profile_photo_url }}" width="32"
                    height="32" alt="{{ Auth::user()->name }}" />
                  <label for="upload_image"
                    class="bg-[#74A68D] rounded-full w-7 h-7 flex justify-center items-center absolute bottom-0 right-0 cursor-pointer">
                    <img src="{{ asset('/images/svg/upload_photo.svg') }}" alt="upload photo" />
                  </label>
                  <form action="{{ route('cambiofoto') }}" id="avatarform" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="name" value="{{ $user->id }}">
                    <input type="file" id="upload_image" name="imageuser" accept="image/*" class="hidden" />
                  </form>
                </div>

                <div>
                  <p class="font-semibold text-[14px] text-[#0A3054]">
                    {{ $user->name }}
                  </p>

                  <p class="font-medium text-[12px] text-[#8896A8]">
                    {{ $user->email }}
                  </p>
                </div>
              </div>
              <div class="flex flex-col gap-4 ">
                <a class="group" href="{{ route('micuenta') }}">
                  <div
                    class="text-white group-hover:bg-[#74A68D] py-2 px-4 rounded-2xl cursor-pointer text-[16px] border-none w-64 flex justify-between items-center">
                    <p class="font-medium text-[16px] text-[#254678] group-hover:text-white">
                      Mi cuenta
                    </p>
                    <span>
                      <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                          fill="#E9EDEF" />
                      </svg>
                    </span>
                  </div>
                </a>
                <a class="group" href="{{ route('direccion') }}">
                  <div
                    class="text-white bg-[#74A68D] py-2 px-4 rounded-2xl cursor-pointer text-[16px] border-none w-64 flex justify-between items-center group-hover:bg-[#74A68D]">
                    <p class="font-medium text-[16px] text-white">
                      Dirección
                    </p>
                    <span>
                      <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                          fill="#EEEEEE" />
                      </svg>
                    </span>
                  </div>
                </a>
                <a class="group" href="{{ route('pedidos') }}">
                  <div
                    class="text-white py-2 px-4 rounded-2xl cursor-pointer text-[16px] border-none w-64 flex justify-between items-center group-hover:bg-[#74A68D]">
                    <p class="font-medium text-[16px] text-[#254678] group-hover:text-white">
                      Historial de pedidos
                    </p>
                    <span>
                      <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                          fill="#E9EDEF" />
                      </svg>
                    </span>
                  </div>
                </a>
                <form method="POST" action="{{ route('logout') }}" x-data class="group">
                  @csrf
                  <button type="submit" href="{{ route('logout') }}"
                    class="rounded-2xl bg-[#F3F5F7] md:bg-[#FCFCFC] group-hover:bg-[#74A68D]  group-hover:text-white text-[#151515] font-medium text-[16px] py-3 px-4 flex justify-between items-center w-64 mt-0 md:mt-[200px]">
                    <span>Cerrar Sesión</span>
                    <svg width="20" height="18" viewBox="0 0 14 13" fill="none">
                      <path class="group-hover:stroke-white"
                        d="M4.8533 0.900391H2.38271C2.00829 0.900391 1.6492 1.04789 1.38444 1.31044C1.11969 1.57299 0.970947 1.92909 0.970947 2.30039V10.7004C0.970947 11.0717 1.11969 11.4278 1.38444 11.6903C1.6492 11.9529 2.00829 12.1004 2.38271 12.1004H4.8533M5.02876 6.50039H13.0288M13.0288 6.50039L9.97199 3.30039M13.0288 6.50039L9.97199 9.70039"
                        stroke="#151515" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="basis-7/12 font-poppins w-11/12 md:w-full mx-auto">
          <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
              <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Mi lista de direcciones</h5>
              <a id="btn-add" href="#modal-address" rel="modal:open"
                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                + Agregar
              </a>
            </div>
            <div class="flow-root">
              <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($addresses as $address)
                  @php
                    $isFree = $address->price->price == 0;
                  @endphp
                  <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                          {{ $address->price->district->province->department->description }},
                          {{ $address->price->district->province->description }},
                          {{ $address->price->district->description }}

                          <span
                            class="inline-flex items-center {{ $isFree ? 'bg-green-100' : 'bg-blue-100' }} {{ $isFree ? 'text-green-800' : 'text-blue-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full dark:{{ $isFree ? 'bg-green-900' : 'bg-blue-900' }} dark:{{ $isFree ? 'text-green-300' : 'text-blue-300' }}">
                            <span
                              class="w-2 h-2 me-1 {{ $isFree ? 'bg-green-500' : 'bg-blue-500' }} rounded-full"></span>
                            {{ $isFree ? 'Gratis' : 'S/. ' . $address->price->price }}
                          </span>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                          {{ $address->street }} - {{ $address->number }} - {{ $address->description }}
                        </p>
                      </div>
                      <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                          <button id="btn-edit" data-address="{{ $address }}" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            title="Editar direccion" tippy>
                            <i class="fa fa-pen"></i>
                          </button>
                          <button @if (!$address->isDefault) id="btn-default" data-id="{{$address->id}}" @endif type="button"
                            class="{{ $address->isDefault ? 'text-yellow-400 cursor-default' : 'text-gray-900 hover:text-yellow-400' }} px-3 py-2 text-sm font-medium  bg-white border-t border-b border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:text-yellow-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-yellow-500 dark:focus:text-white"
                            @if (!$address->isDefault) title="Marcar direccion como predeterminado" @endif tippy>
                            <i class="fa fa-star"></i>
                          </button>
                          <button id="btn-delete" data-id="{{ $address->id }}" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-2 focus:ring-red-500 focus:text-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-red-500 dark:focus:text-white"
                            title="Eliminar direccion" tippy>
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    const provinces = @json($provinces);
    const districts = @json($districts);

    $('#departamento_id').select2()
    $('#provincia_id').select2()
    $('#distrito_id').select2()

    $('#departamento_id').on('change', function(e) {
      const department_id = this.value
      $('#provincia_id').html('<option value>- Seleccione -</option>')
      $('#distrito_id').html('<option value>- Seleccione -</option>')
      provinces
        .filter((x) => x.department_id == department_id)
        .forEach((x) => {
          const option = $('<option>', {
            value: x.id,
            text: x.description
          })
          $('#provincia_id').append(option)
        })
      $('#provincia_id').select2()
    })

    $('#provincia_id').on('change', function(e) {
      const province_id = this.value
      $('#distrito_id').html('<option value>- Seleccione -</option>')
      districts
        .filter((x) => x.province_id == province_id)
        .forEach((x) => {
          const option = $('<option>', {
            value: x.id,
            text: x.description,
            'price-id': x.price_id
          })
          $('#distrito_id').append(option)
        })
      $('#distrito_id').select2()
    })

    $('#modal-address').on('submit', async (e) => {
      e.preventDefault()
      const request = {
        id: $('#id').val(),
        _token: $('[name="_token"]').val(),
        price_id: $('#distrito_id option:selected').attr('price-id'),
        street: $('#street').val(),
        number: $('#number').val(),
        description: $('#description').val()
      }
      try {
        const res = await fetch("{{ route('address.save') }}", {
          method: 'POST',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
          },
          body: JSON.stringify(request)
        })
        if (!res.ok) throw new Error('Ocurrio un error al guardar la direccion')

        Swal.fire({
          title: `Exito!!`,
          text: `Direccion guardada correctamente`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-delete', async function() {
      const id = $(this).attr('data-id')
      try {
        const result = await Swal.fire({
          title: "Seguro?",
          text: 'Esta accion no se puede revertir',
          showCancelButton: true,
          confirmButtonText: "Eliminar",
          cancelButtonText: `Cancelar`
        })
        if (!result.isConfirmed) return
        const res = await fetch(`/api/address/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
          },
          body: JSON.stringify({
            _token: $('[name="_token"]').val()
          })
        })
        if (!res.ok) throw new Error('Ocurrio un error al guardar la direccion')

        Swal.fire({
          title: `Exito!!`,
          text: `Se ha eliminado la direccion correctamente`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-default', async function() {
      const id = $(this).attr('data-id')
      try {
        const res = await fetch("{{route('address.markasfavorite')}}", {
          method: 'patch',
          headers: {
            'Content-type': 'application/json',
            'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
          },
          body: JSON.stringify({
            _token: $('[name="_token"]').val(),
            id
          })
        })
        if (!res.ok) throw new Error('Ocurrio un error al marcar la direccion como favorita')

        Swal.fire({
          title: `Exito!!`,
          text: `La direccion se marco como favorito`,
          icon: "success",
        });

        location.reload()
      } catch (error) {
        Swal.fire({
          title: `Ups!!`,
          text: error.message,
          icon: "error",
        });
      }
    })

    $(document).on('click', '#btn-edit', function() {
      const data = $(this).data('address')

      $('#id').val(data.id)
      $('#departamento_id')
        .val(data.price.district.province.department.id)
        .trigger('change')
      $('#provincia_id')
        .val(data.price.district.province.id)
        .trigger('change')
      $('#distrito_id')
        .val(data.price.district.id)
        .trigger('change')

      $('#street').val(data.street)
      $('#number').val(data.number)
      $('#description').val(data.description)

      $('#modal-address').modal('show')
    })

    $(document).on('click', '#btn-add', function() {
      const data = $(this).data('address')

      $('#id').val(null)
      $('#departamento_id')
        .val(null)
        .trigger('change')
      $('#street').val(null)
      $('#number').val(null)
      $('#description').val(null)

      $('#modal-address').modal('show')
    })
  </script>


@section('scripts_importados')

  <script>
    const checkbox = document.getElementById("check");
    const bag = document.querySelector(".bag");
    const bodyModalCarrito = document.querySelector(".body");
    let isMenuOpen = false; // Variable para controlar el estado del menú
    const card = document.querySelector(".cartContainer");
    checkbox?.addEventListener("click", checkboxOnClick);

    // Agregar event listener al checkbox para controlar el estado del menú
    function checkboxOnClick() {
      // Cambiar el top del carrito
      const scrollTopPosition = window.scrollY;
      card.style.top = scrollTopPosition + "px";

      isMenuOpen = checkbox.checked;
      if (isMenuOpen) {
        bodyModalCarrito.classList.add("dark");
        bodyModalCarrito.classList.add("overflow-hidden");
        // Agregar el event listener al documento cuando se abre el menú
        document.addEventListener("click", handleDocumentClick);
      } else {
        bodyModalCarrito.classList.remove("dark");
        bodyModalCarrito.classList.remove("overflow-hidden");
        // Quitar el event listener del documento cuando se cierra el menú
        document.removeEventListener("click", handleDocumentClick);
      }
    }

    // Función para manejar el clic en el documento
    function handleDocumentClick(event) {
      // Verificar si el menú está abierto y si el clic no ocurrió dentro del nav ni en el checkbox
      if (isMenuOpen && !bag.contains(event.target) && event.target !== checkbox) {
        bag.classList.add("hidden"); // Ocultar el nav
        checkbox.checked = false; // Desmarcar el checkbox
        bodyModalCarrito.classList.remove("dark");
        bodyModalCarrito.classList.remove("overflow-hidden");
        isMenuOpen = false; // Actualizar el estado del menú
        // Quitar el event listener del documento después de cerrar el menú
        document.removeEventListener("click", handleDocumentClick);
      }
    }

    // Detener la propagación de clics dentro del nav para evitar cerrarlo al hacer clic dentro
    bag.addEventListener("click", function(event) {
      event.stopPropagation(); // Evitar que el clic se propague al documento
    });


    $("#upload_image").change(function() {

      const file = this.files[0];

      if (file) {
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', $('#avatarform input[name="_token"]').val());
        formData.append('id', $('#avatarform input[name="name"]').val());
        $.ajax({

          url: "{{ route('cambiofoto') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,

          success: function(success) {
            window.location.href = window.location.href;

          },
          error: function(error) {
            console.log(error)
          }

        })
      }

    });
  </script>
@stop

@stop
