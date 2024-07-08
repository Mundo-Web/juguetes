@extends('components.public.matrix', ['pagina' => ''])

@section('css_importados')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@stop


@section('content')

  <style>
    .select2-container .select2-selection--single {
      margin-top: 0.25rem;
      /* mt-1 */
      background-color: #F9FAFB;
      /* bg-gray-50 */
      border: 1px solid #D1D5DB;
      /* border-gray-300 */
      color: #111827;
      /* text-gray-900 */
      border-radius: 0.5rem;
      /* rounded-lg */
      padding-left: 2.5rem;
      /* pl-10 */
      padding: 7px 14px;
      /* p-2.5 */
      height: unset;
      font-size: 0.875rem;
      /* text-sm */
    }

    .select2-container--open .select2-dropdown--below {
      border-color: #D1D5DB;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #111827;
      /* text-gray-900 */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 100%;
      right: 1rem;
      /* align with pl-10 */
    }

    .select2-container--default .select2-selection--single:focus {
      border-color: #3B82F6;
      /* focus:border-blue-500 */
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
      /* focus:ring-blue-500 */
    }

    /* Dark mode styles */
    .dark .select2-container .select2-selection--single {
      background-color: #374151;
      /* dark:bg-gray-700 */
      border-color: #4B5563;
      /* dark:border-gray-600 */
      color: #F9FAFB;
      /* dark:text-white */
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #F9FAFB;
      /* dark:text-white */
    }

    .dark .select2-container--default .select2-selection--single:focus {
      border-color: #3B82F6;
      /* dark:focus:border-blue-500 */
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
      /* dark:focus:ring-blue-500 */
    }

    /* Adjust the width to match Tailwind CSS block w-full */
    .select2-container {
      width: 100% !important;
      /* block w-full */
    }
  </style>

  <main>
    <section class="font-poppins w-11/12 mx-auto my-12 flex flex-col gap-10">
      <div>
        <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">Home</a>
        <span>/</span>
        <a href="carrito.html" class="font-semibold text-[14px] text-[#141718]">Carrito</a>
      </div>
      <div class="flex md:gap-10">
        <div class="flex justify-between items-center md:basis-8/12 w-full md:w-auto">
          <p
            class="font-semibold text-[18px] text-[#EB5D2C] border-b-[1px] border-[#EB5D2C] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Carro de compra</span>
          </p>

          <p
            class="font-medium text-[18px] text-[#151515] border-b-[1px] border-[#6C7275] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Detalles de pago</span>
          </p>

          <p
            class="font-medium text-[18px] text-[#C8C8C8] border-b-[1px] border-[#6C7275] md:px-4 py-4 basis-1/3 h-full text-center">
            <span class="flex items-center h-full">Orden completada</span>
          </p>
        </div>
        <div class="md:basis-4/12"></div>
      </div>

      <div class="flex flex-col 2md:flex-row gap-16 md:gap-10">
        <div class="basis-8/12 flex flex-col gap-10 order-2 2md:order-1">
          <div class="flex flex-col gap-5">
            <div>
              <!-- form -199 -513 -->
              <form id="formHome">
                <div class="flex flex-col gap-8">

                  @csrf
                  <div class="flex flex-col gap-5 pb-10 border-b-2 border-[#151515]">
                    <h2 class="font-semibold text-[20px] text-[#151515]">
                      Información del contacto
                    </h2>

                    <div class="flex flex-col gap-5">
                      {{-- llenar los datos si la persona existe --}}
                      <div class="flex flex-col md:flex-row gap-5">

                        <div class="basis-1/2 flex flex-col gap-2">
                          <label for="nombre" class="font-medium text-[12px] text-[#6C7275]">Nombre</label>
                          @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                            <input id="nombre" type="text" placeholder="Nombre" name="nombre"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]"
                              value="{{ $detalleUsuario[0]->nombre }}" />
                          @else
                            <input id="nombre" type="text" placeholder="Nombre" name="nombre"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                          @endif

                        </div>


                        <div class="basis-1/2 flex flex-col gap-2">
                          <label for="apellidos" class="font-medium text-[12px] text-[#6C7275]">Apellido</label>
                          @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                            <input id="apellidos" type="text" placeholder="Apellido" name="apellidos"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]"
                              value="{{ $detalleUsuario[0]->apellidos }}" />
                          @else
                            <input id="apellido" type="text" placeholder="Apellido" name="apellidos"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                          @endif

                        </div>
                      </div>



                      <div class="flex flex-col md:flex-row gap-5">
                        <div class="basis-2/3 flex flex-col gap-2">
                          <label for="email" class="font-medium text-[12px] text-[#6C7275]">E-mail</label>

                          @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                            <input id="email" type="email" placeholder="Correo electrónico" required name="email"
                              value="{{ $detalleUsuario[0]->email }}"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                          @else
                            <input id="email" type="email" placeholder="Correo electrónico" required name="email"
                              value=""
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                          @endif

                        </div>
                        <div class="basis-1/3 flex flex-col gap-2">
                          <label for="celular" class="font-medium text-[12px] text-[#6C7275]">Celular</label>

                          @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                            <input id="celular" type="text" placeholder="(+51) 000 000 000" name="phone"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl"
                              value="{{ $detalleUsuario[0]->phone }}" />
                          @else
                            <input id="celular" type="text" placeholder="(+51) 000 000 000" name="phone"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl" />
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-col gap-5 pb-10 border-b-2 border-[#151515]">
                    <h2 class="font-semibold text-[20px] text-[#151515]">
                      Dirección de envío
                    </h2>
                    <ul class="grid w-full gap-6 md:grid-cols-3">
                      <li>
                        <input type="radio" name="envio" id="react-option" value="" class="hidden peer" required="">
                        <label for="react-option"
                          class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                          <div class="block">
                            <svg class="w-6 h-6 mb-2 text-gray-800 dark:text-white" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                              viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                            </svg>

                            <div class="w-full text-lg font-semibold">Recojo en tienda</div>
                            <div class="w-full text-sm">Gratis</div>
                          </div>
                        </label>
                      </li>
                      <li>
                        <input type="radio" name="envio" id="flowbite-option" value="" class="hidden peer">
                        <label for="flowbite-option"
                          class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                          <div class="block">
                            <svg class="w-6 h-6 mb-2 text-gray-800 dark:text-white" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                              viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 21v-9m3-4H7.5a2.5 2.5 0 1 1 0-5c1.5 0 2.875 1.25 3.875 2.5M14 21v-9m-9 0h14v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM4 8h16a1 1 0 0 1 1 1v3H3V9a1 1 0 0 1 1-1Zm12.155-5c-3 0-5.5 5-5.5 5h5.5a2.5 2.5 0 0 0 0-5Z" />
                            </svg>

                            <div class="w-full text-lg font-semibold">Envio express</div>
                            <div class="w-full text-sm">Sujeto a evaluacion</div>
                          </div>
                        </label>
                      </li>
                    </ul>
                    <div class="flex flex-col gap-5">
                      <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-5 md:flex-row">
                          <div class="basis-1/3 flex flex-col gap-2 z-[45]">
                            <label class="font-medium text-[12px] text-[#6C7275]">Departamento</label>

                            <div>
                              <!-- combo -->
                              <div class="dropdown w-full">
                                <select name="departamento_id" name="departamento" id="departamento_id"
                                  class=" mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option value="">Seleccione un departamento </option>
                                  @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->description }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="basis-1/3 flex flex-col gap-2 z-[40]">
                            <label class="font-medium text-[12px] text-[#6C7275]">
                              Provincia
                            </label>

                            <div>
                              <!-- combo -->
                              <div class="dropdown-provincia w-full">
                                <select name="provincia_id" id="provincia_id"
                                  class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option value="">Seleccione una provincia </option>

                                </select>

                              </div>
                            </div>
                          </div>

                          <div class="basis-1/3 flex flex-col gap-2 z-[30]">
                            <label class="font-medium text-[12px] text-[#6C7275]">
                              Distrito
                            </label>

                            <div>
                              <!-- combo -->
                              <div class="dropdown-distrito w-full">
                                <select name="distrito_id" id="distrito_id"
                                  class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option value="">Seleccione un distrito </option>

                                </select>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex flex-col gap-2">
                          <label for="nombre_calle" class="font-medium text-[12px] text-[#6C7275]">Avenida / Calle /
                            Jirón</label>

                          @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                            <input id="nombre_calle" type="text" name="dir_av_calle"
                              placeholder="Ingresa el nombre de la calle"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]"
                              value="{{ $detalleUsuario[0]->dir_av_calle }}" />
                          @else
                            <input id="nombre_calle" type="text" name="dir_av_calle"
                              placeholder="Ingresa el nombre de la calle"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                          @endif
                        </div>
                      </div>
                      <div>
                        <div class="flex flex-col md:flex-row gap-5">
                          <div class="basis-1/2 flex flex-col gap-2">
                            <label for="numero_calle" class="font-medium text-[12px] text-[#6C7275]">Número</label>
                            @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                              <input id="numero_calle" name="dir_numero" type="text"
                                placeholder="Ingresa el número de la callle"
                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]"
                                value="{{ $detalleUsuario[0]->dir_numero }}" />
                            @else
                              <input id="numero_calle" name="dir_numero" type="text"
                                placeholder="Ingresa el número de la callle"
                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                            @endif

                          </div>

                          <div class="basis-1/2 flex flex-col gap-2">
                            <label for="direccion" class="font-medium text-[12px] text-[#6C7275]">Dpto./ Interior/ Piso/
                              Lote/ Bloque
                              (opcional)</label>
                            @if (isset($detalleUsuario) && count($detalleUsuario) > 0)
                              <input id="direccion" type="text" name="dir_bloq_lote"
                                placeholder="Ejem. Casa 3, Dpto 101"
                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]"
                                value="{{ $detalleUsuario[0]->dir_bloq_lote }}" />
                            @else
                              <input id="direccion" type="text" name="dir_bloq_lote"
                                placeholder="Ejem. Casa 3, Dpto 101"
                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl text-[#6C7275]" />
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- <div class="flex flex-col gap-5 pb-10">
                    <h2 class="font-semibold text-[20px] text-[#151515]">
                      Dirección de envío
                    </h2>
                    <div class="w-full flex flex-col gap-5 border-dashed pb-10 border-b-2 border-[#E8ECEF]">
                      <div class="flex items-center ps-4 border border-[#F3F5F7] rounded-xl">
                        <input type="radio" id="bordered-radio-tarjeta" name="bordered-radio-tarjetas"
                          value="tar_credito" class="background-radius w-5 h-5 cursor-pointer text-[#6C7275]" />
                        <label for="bordered-radio-tarjeta"
                          class="w-full py-4 ms-2 text-[16px] font-normal text-[#6C7275] flex justify-between items-center px-4">
                          <span>Tarjeta de crédito</span>
                        </label>
                      </div>
                      <div class="flex items-center ps-4 border border-[#F3F5F7] rounded-xl">
                        <input type="radio" id="bordered-radio-debito" name="bordered-radio-tarjetas"
                          value="tar_debito" class="background-radius w-5 h-5 cursor-pointer text-[#6C7275]" />
                        <label for="bordered-radio-debito"
                          class="w-full py-4 ms-2 text-[16px] font-normal text-[#6C7275] flex justify-between items-center px-4">
                          <span>Tarjeta de Débito</span>
                        </label>
                      </div>

                      <div class="flex items-center ps-4 border border-[#F3F5F7] rounded-xl">
                        <input type="radio" id="bordered-radio-cuenta" name="bordered-radio-tarjetas"
                          value="depo_cuenta" class="background-radius w-5 h-5 cursor-pointer text-[#6C7275]" />
                        <label for="bordered-radio-cuenta"
                          class="w-full py-4 ms-2 text-[16px] font-normal text-[#6C7275] flex justify-between items-center px-4">
                          <span>Depósito a cuenta</span>
                        </label>
                      </div>
                    </div>

                    <div class="pt-5">
                      <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                          <label for="nombre_tarjeta" class="font-medium text-[12px] text-[#6C7275]">Nombre de la
                            tarjeta</label>
                          <input id="nombre_tarjeta" type="text" name="nombre_tarjeta" placeholder="Nombre"
                            class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl" />
                        </div>

                        <div class="flex flex-col gap-2">
                          <div class=" md:w-1/2">
                            <label for="numero_tarjeta" class="font-medium text-[12px] text-[#6C7275]">
                              Número de
                              tarjeta</label>
                            <input id="numero_tarjeta" name="numero_tarjeta" type="text"
                              placeholder="1234 12345 1234"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl" />


                          </div>
                          <div id="iconoTarjeta">

                          </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-5">
                          <div class="basis-1/2 flex flex-col gap-2">
                            <label for="fecha_caducidad" class="font-medium text-[12px] text-[#6C7275]">Fecha de
                              caducidad</label>
                            <input id="fecha_caducidad" name="fecha_caducidad" type="text" placeholder="MM/AA"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl" />
                          </div>

                          <div class="basis-1/2 flex flex-col gap-2">
                            <label for="CVC" class="font-medium text-[12px] text-[#6C7275]">CVC</label>
                            <input id="CVC" name="CVC" type="text" placeholder="Código CVC"
                              class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal text-[16px] border-[1.5px] border-gray-200 rounded-xl" />
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="pt-10">
                      <a href="/agradecimiento" id="pagarProductos"
                        class="text-white bg-[#74A68D] w-full py-3 rounded-3xl cursor-pointer border-2 font-semibold text-[16px] inline-block text-center border-none">Pagar</a>
                      <!-- <input
                                                                                                                                                                                                              type="submit"
                                                                                                                                                                                                              value="Checkout"
                                                                                                                                                                                                              class="text-white bg-[#74A68D] w-full py-3 rounded-3xl cursor-pointer border-2 font-semibold text-[16px] inline-block text-center border-none"
                                                                                                                                                                                                            /> -->
                    </div>

                  </div> --}}
              </form>
            </div>
          </div>
        </div>
      </div>

      <div
        class="basis-4/12 flex flex-col justify-start gap-10 py-4 order-1 2md:order-2 md:sticky top-4 h-max border rounded-md">
        <h2 class="font-semibold text-[20px] text-[#151515] px-4">
          Resumen del pedido
        </h2>

        <div class="p-4">
          <div class="flex flex-col gap-10" id="itemsCarritoPago">







          </div>

          <div class="font-poppins flex flex-col gap-5 mt-10">
            <div class="text-[#141718] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5">
              <p class="font-normal text-[16px]">Envío</p>
              <p class="font-semibold text-[16px]">Gratis</p>
            </div>

            <div class="text-[#141718] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5">
              <p class="font-normal text-[16px]">Subtotal</p>
              <p id='itemSubtotal' class="font-semibold text-[16px]">s/ 00.00</p>
            </div>

            <div
              class="text-[#141718] font-medium text-[20px] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5">
              <p>Total</p>
              <p id="itemTotal">s/ 234.00</p>
            </div>

            <a id="btnPagar" href="/agradecimiento"
                class="text-white bg-[#74A68D] w-full py-4 rounded-3xl cursor-pointer font-semibold text-[16px] inline-block text-center">Pagar</a>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>



@section('scripts_importados')
  <script>
    const svgVisa = `<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                    <path fill="#1565C0" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path><path fill="#FFF" d="M15.186 19l-2.626 7.832c0 0-.667-3.313-.733-3.729-1.495-3.411-3.701-3.221-3.701-3.221L10.726 30v-.002h3.161L18.258 19H15.186zM17.689 30L20.56 30 22.296 19 19.389 19zM38.008 19h-3.021l-4.71 11h2.852l.588-1.571h3.596L37.619 30h2.613L38.008 19zM34.513 26.328l1.563-4.157.818 4.157H34.513zM26.369 22.206c0-.606.498-1.057 1.926-1.057.928 0 1.991.674 1.991.674l.466-2.309c0 0-1.358-.515-2.691-.515-3.019 0-4.576 1.444-4.576 3.272 0 3.306 3.979 2.853 3.979 4.551 0 .291-.231.964-1.888.964-1.662 0-2.759-.609-2.759-.609l-.495 2.216c0 0 1.063.606 3.117.606 2.059 0 4.915-1.54 4.915-3.752C30.354 23.586 26.369 23.394 26.369 22.206z"></path><path fill="#FFC107" d="M12.212,24.945l-0.966-4.748c0,0-0.437-1.029-1.573-1.029c-1.136,0-4.44,0-4.44,0S10.894,20.84,12.212,24.945z"></path>
                    </svg>`

    const svgMasterCar = `<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                        <path fill="#3F51B5" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path><path fill="#FFC107" d="M30 14A10 10 0 1 0 30 34A10 10 0 1 0 30 14Z"></path><path fill="#FF3D00" d="M22.014,30c-0.464-0.617-0.863-1.284-1.176-2h5.325c0.278-0.636,0.496-1.304,0.637-2h-6.598C20.07,25.354,20,24.686,20,24h7c0-0.686-0.07-1.354-0.201-2h-6.598c0.142-0.696,0.359-1.364,0.637-2h5.325c-0.313-0.716-0.711-1.383-1.176-2h-2.973c0.437-0.58,0.93-1.122,1.481-1.595C21.747,14.909,19.481,14,17,14c-5.523,0-10,4.477-10,10s4.477,10,10,10c3.269,0,6.162-1.575,7.986-4H22.014z"></path>
                        </svg>`

    function obtnerSvg(input) {
      const visaPattern = /^4/;
      const mastercardPattern = /^5/;
      const amexPattern = /^3/;
      const discoverPattern = /^6/;

      if (visaPattern.test(input)) {
        return svgVisa;
      } else if (mastercardPattern.test(input)) {
        return svgMasterCar;
      } else if (amexPattern.test(input)) {
        return "American Express";
      } else if (discoverPattern.test(input)) {
        return "Discover";
      } else {
        return "Tipo de tarjeta no reconocido";
      }

    }
    $('#numero_tarjeta').on('input', function() {
      let input = $('#numero_tarjeta').val()

      let svg = obtnerSvg(input)
      $('#iconoTarjeta').html(svg)


    })
  </script>
  <script>
    $('#pagarProductos').on('click', function(e) {
      console.log('pagando servicio');
      e.preventDefault()
      let formDataArray = $('#formHome').serializeArray();
      console.log(formDataArray)

      $.ajax({
        url: '{{ route('procesar.pago') }}',
        method: 'POST',
        data: $('#formHome').serialize(),
        success: function(response) {
          console.log(response)
          Swal.close();
          Swal.fire({
            title: `Exito!!`,
            text: `Informacion procesada correctamente`,
            icon: "success",
          });
          //limpiar carrito de compra
          setTimeout(function() {

            window.location.href = `/agradecimiento?codigoCompra=${response.codigoCompra}`
          }, 3000);
        },
        error: function(response) {
          console.log(response)
          const customMessages = response.responseJSON.message.validator.customMessages;
          const messages = Object.keys(customMessages).map(key => customMessages[key]);
          Swal.close();
          Swal.fire({
            title: `Opps!!`,
            text: messages,
            icon: "error",
          });
        }
      });
    })
  </script>
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

      let tipoEnvio = 0
      if (carrito.length !== 0) {
        tipoEnvio = carrito[0]["tipo_envio"]
      }
      // carrito = [...carrito, carrito.total]
      Local.set("carrito", carrito)
      total += tipoEnvio
      console.log(tipoEnvio)

      $('#itemTotal').text(`S/. ${total} `)

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
      $('#itemsCarritoPago').html('')


    }



    // function PintarCarrito() {

    //   let itemsCarrito = $('#itemsCarrito')
    //   let itemsCarritoPago = $('#itemsCarritoPago')

    //   articulosCarrito.forEach(element => {
    //     let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
  //     <div class="flex justify-center items-center gap-5">
  //       <div class="bg-[#F3F5F7] rounded-md p-4">
  //         <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
  //       </div>
  //       <div class="flex flex-col gap-3 py-2">
  //         <h3 class="font-semibold text-[14px] text-[#151515]">
  //           ${element.producto}
  //         </h3>
  //         <p class="font-normal text-[12px] text-[#6C7275]">

  //         </p>
  //         <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
  //           <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
  //             <span  class="text-[20px]">-</span>
  //           </button>
  //           <div class="w-8 h-8 flex justify-center items-center">
  //             <span  class="font-semibold text-[12px]">${element.cantidad }</span>
  //           </div>
  //           <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
  //             <span class="text-[20px]">+</span>
  //           </button>
  //         </div>
  //       </div>
  //     </div>
  //     <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
  //       <p class="font-semibold text-[14px] text-[#151515]">
  //         S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
  //       </p>
  //       <div class="flex items-center">
  //         <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
  //         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  //           <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
  //         </svg>
  //         </button>

  //       </div>
  //     </div>
  //   </div>`

    //     itemsCarrito.append(plantilla)
    //     itemsCarritoPago.append(plantilla)

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
    $("#btnSiguiente").on('click', function(e) {

      console.log(checkedRadio)
      if (!checkedRadio) {
        e.preventDefault()
        Swal.fire({

          icon: "warning",
          title: "Opss ",
          text: 'Recuerde elegir un metodo de envio'


        });

      }
    })

    const provinces = @json($provinces);
    const districts = @json($districts);

    $('#departamento_id').select2()
    $('#provincia_id').select2()
    $('#distrito_id').select2()

    $('#departamento_id').on('change', function() {
      $('#provincia_id').html('<option value>Seleccione una provincia</option>')
      $('#distrito_id').html('<option value>Seleccione un distrito</option>')
      provinces.filter(x => x.department_id == this.value).forEach(({
        id,
        description
      }) => {
        $('#provincia_id').append(`<option value="${id}">${description}</option>`)
      })
      $('#provincia_id').select2()
    })

    $('#provincia_id').on('change', function() {
      $('#distrito_id').html('<option value>Seleccione un distrito</option>')
      districts.filter(x => x.province_id == this.value).forEach(({
        id,
        description
      }) => {
        $('#distrito_id').append(`<option value="${id}">${description}</option>`)
      })
      $('#distrito_id').select2()
    })
  </script>


  <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
