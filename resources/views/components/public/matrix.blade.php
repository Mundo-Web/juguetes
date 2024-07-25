<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="language" content="spanish">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Somos especialistas en Wall Panel, mármol UV, piedra PU y otros productos para ti. Confía en la calidad de Deco TAB y dale otro estilo a tu ambiente favorito.">
  <title> Venta de decoración de interiores - Deco TAB </title>
  <meta name="keywords"
    content="Wall Panel, Mármol UV, Piedra PU, Piedra Cincelada, Wall Panel Negro, Pisos SPC, Panel Tipo piedra PU" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  {{-- Aqui van los CSS --}}
  @yield('css_importados')

  {{-- Swipper --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  {{-- Alpine --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  {{-- Sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="/js/tippy.all.min.js"></script>
  <script src="/js/storage.extend.js"></script>
  <script src="/js/cookies.extend.js"></script>

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>

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
</head>

<body class="body">
  <div class="overlay"></div>
  @include('components.public.header')

  <div class="main">
    {{-- Aqui va el contenido de cada pagina --}}
    @yield('content')

  </div>



  @include('components.public.footer')



  @yield('scripts_importados')
  {{-- @vite(['resources/js/functions.js']) --}}
  <script src="{{ asset('js/functions.js') }}?v={{ uniqid() }}"></script>

  <script>
    tippy('[tippy]', {
      arrow: true
    })
  </script>

  <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarTelefono(value) {

            if (value !== '') {
                if (isNaN(value)) {
                    alerta("Por favor, asegúrate de ingresar solo números en el teléfono");
                    return false;
                }
            }

            if (value.length < 9) {
                alerta("El teléfono solo puede tener 9 dígitos");
                return false;
            }

            return true;
        }

        function validarEmail(value) {
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("Por favor, asegúrate de ingresar una dirección de correo electrónico válida");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();


            if (!validarTelefono($('#telefonoContacto').val())) {
                return;
            };

            if (!validarEmail($('#emailContacto').val())) {
                return;
            };


            Swal.fire({

                title: 'Procesando información',
                html: `Enviando... 
                    <p class=" text-text12">Revise su correo de Span</p>
                          <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                          <div role="status">
                              <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                              
                          </div>
                          </div>
                          `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#formContactos')[0].reset();
                },
                error: function(error) {
                    Swal.close();
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })


        $('#formProveedor').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();


            if (!validarTelefono($('#telefonoContactoProveedor').val())) {
                return;
            };

            if (!validarEmail($('#emailContactoProveedor').val())) {
                return;
            };


            Swal.fire({

                title: 'Procesando información',
                html: `Enviando... 
                    <p class=" text-text12">Revise su correo de Span</p>
                          <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                          <div role="status">
                              <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                              </svg>
                              
                          </div>
                          </div>
                          `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route('guardarProveedor') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#formContactos')[0].reset();
                },
                error: function(error) {
                    Swal.close();
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })

        $('#footerFormulario').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#emailFooter').val())) {
                return;
            };

            Swal.fire({

                title: 'Procesando información',
                html: `Enviando...
                    <p class=" text-text12">Revise su correo de Span</p>
                            <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                                <div role="status">
                                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    
                                </div>
                                
                            </div>
      
            `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });


            $.ajax({
                url: '{{ route('subscripciones.guardar') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    //Falta limpiar el radio del form contacto

                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#footerFormulario')[0].reset();
                },
                error: function(error) {
                    Swal.close();
                    const obj = error.responseJSON.message;

                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key];
                            Swal.fire({
                                title: error.message,
                                text: "Usuario ya existente",
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                }
            });
        })
    </script>

</body>

</html>
