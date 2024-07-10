@extends('components.public.matrix', ['pagina' => ''])

@section('css_importados')

@stop


@section('content')
  <link href="/js/dxdatagrid/css/dx.light.compact.css?v=06d3ebc8-645c-4d80-a600-c9652743c425" rel="stylesheet"
    type="text/css" id="dg-default-stylesheet" />
  <script src="/js/dxdatagrid/js/dx.all.js"></script>
  <script src="/js/dxdatagrid/js/localization/dx.messages.es.js"></script>
  <script src="/js/moment/min/moment.min.js"></script>

  <main>
    {{-- <section class="font-poppins my-12">
            <div class="flex flex-col w-11/12 mx-auto">
                <div class="flex flex-col gap-10 my-5">
                    <div class="flex gap-1">
                        <a href="index.html" class="font-normal text-[14px] text-[#6C7275]">Home</a>
                        <span>/</span>
                        <a href="#" class="font-semibold text-[14px] text-[#141718]">Mi cuenta</a>
                    </div>
                </div>
            </div>
        </section> --}}

    <section class="font-poppins my-8 md:my-16">
      <div class="flex flex-col gap-12 md:flex-row md:gap-16 lg:gap-28 w-full md:w-11/12 mx-auto">
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
                    class="text-white  py-2 px-4 rounded-2xl cursor-pointer text-[16px] border-none w-64 flex justify-between items-center group-hover:bg-[#74A68D]">
                    <p class="font-medium text-[16px] text-[#254678] group-hover:text-white ">
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
                    class="text-white bg-[#74A68D] py-2 px-4 rounded-2xl cursor-pointer text-[16px] border-none w-64 flex justify-between items-center group-hover:bg-[#74A68D]">
                    <p class="font-medium text-[16px] text-white ">
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
          <h2 class="text-[#151515] font-semibold text-[20px] py-5">
            Historial de pedidos
          </h2>
          <div id="gridContainer"></div>
        </div>
      </div>
    </section>
  </main>

  <div id="invoice-modal" class="!max-w-[720px]">
    <h3 class="h3">Orden #<span id="invoice-code"></span></h3>
  </div>

  <script>
    const dataGrid = $('#gridContainer').dxDataGrid({
      language: "es",
      dataSource: {
        load: async (params) => {
          const res = await fetch("{{ route('sales.paginate') }}", {
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'XSRF-TOKEN': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
            },
            body: JSON.stringify({
              _token: $('[name="_token"]').val(),
              ...params
            })
          })
          const data = await res.json()
          return data
        },
      },
      onToolbarPreparing: (e) => {
        const items = e.toolbarOptions.items;
        items.unshift({
          widget: 'dxButton',
          location: 'after',
          options: {
            icon: 'revert',
            hint: 'REFRESCAR TABLA',
            onClick: () => {
              dataGrid.refresh()
            }
          }
        });
      },
      remoteOperations: true,
      columnResizingMode: "widget",
      allowColumnResizing: true,
      allowColumnReordering: true,
      columnAutoWidth: true,
      scrollbars: 'auto',
      // filterPanel: {
      //   visible: true
      // },
      // searchPanel: {
      //   visible: true
      // },
      // headerFilter: {
      //   visible: true,
      //   search: {
      //     enabled: true
      //   }
      // },
      // height: 'calc(100vh - 185px)',
      rowAlternationEnabled: true,
      showBorders: true,
      // filterRow: {
      //   visible: true,
      //   applyFilter: "auto"
      // },
      // filterBuilderPopup: {
      //   visible: false,
      //   position: {
      //     of: window,
      //     at: 'top',
      //     my: 'top',
      //     offset: {
      //       y: 10
      //     },
      //   },
      // },
      paging: {
        pageSize: 5,
      },
      pager: {
        visible: true,
        allowedPageSizes: [5, 10, 25, 50, 100],
        showPageSizeSelector: true,
        showInfo: true,
        showNavigationButtons: true,
      },
      // allowFiltering: true,
      scrolling: {
        mode: 'standard',
        useNative: true,
        preloadEnabled: true,
        rowRenderingMode: 'standard'
      },
      // columnChooser: {
      //   title: 'Mostrar/Ocultar columnas',
      //   enabled: true,
      //   mode: 'select',
      //   search: {
      //     enabled: true
      //   }
      // },
      columns: [{
          dataField: 'code',
          caption: 'ORDEN',
          cellTemplate: (container, {
            data
          }) => {
            container.addClass('!px-2 !py-1')
            const div = $('<div>')
            const orderContainer = $('<a>', {
              class: 'block text-sm font-medium truncate dark:text-white text-blue-500',
              text: `#${data.code}`
            })
            orderContainer.on('click', () => {
              $('#invoice-code').text(data.code)
              $('#invoice-modal').modal('show')
            })
            const addressContainer = $('<p>', {
              class: 'text-sm text-gray-500 dark:text-gray-400',
              text: data.address_description ?
                `${data.address_department}, ${data.address_province}, ${data.address_district} - ${data.address_street} #${data.address_number}` :
                'Recojo en tienda'
            })
            const dateContainer = $('<p>', {
              class: 'text-xs text-gray-400',
              text: moment(data.created_at).format('YYYY-MM-DD HH:mm:ss')
            })
            div.append(orderContainer)
            div.append(addressContainer)
            div.append(dateContainer)

            container.html(div)
          }
        },
        {
          dataField: 'status_code',
          caption: 'ESTADO',
          cellTemplate: (container, {
            data
          }) => {
            container.addClass('!px-2 !py-1 !text-center')
            container.css('vertical-align', 'middle')

            let $class = 'gray';
            switch (data.status_code) {
              case 'En proceso':
                $class = 'gray'
                break
              case 'Denegado':
                $class = 'red'
                break
              case 'Pagado':
                $class = 'green'
                break
              default:
                $class = 'gray'
                break
            }
            container.html(
              `<span class="inline-flex items-center bg-${$class}-100 text-${$class}-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-${$class}-900 dark:text-${$class}-300 w-max">${data.status_code}</span>`
            )
          }
        },
        {
          dataField: 'total',
          caption: 'MONTO',
          cellTemplate: (container, {
            data
          }) => {
            container.addClass('!px-2 !py-1 !text-center')
            container.css('vertical-align', 'middle')

            const isFree = !Boolean(Number(data.address_price))
            const div = $('<div>', {
              class: 'text-center'
            })
            const priceContainer = $('<span>', {
              class: 'block w-max mx-auto',
              text: `S/. ${data.total}`
            })
            const envioContainer = $('<span>', {
                class: `inline-flex items-center ${ isFree ? 'bg-green-100' : 'bg-blue-100'} ${ isFree ? 'text-green-800' : 'text-blue-800'} text-xs font-medium px-2.5 py-0.5 rounded-full dark:${ isFree ? 'bg-green-900' : 'bg-blue-900'} dark:${ isFree ? 'text-green-300' : 'text-blue-300'} w-max`
              })
              .append(
                `<span class="/w-2 h-2 me-1 ${isFree ? 'bg-green-500' : 'bg-blue-500' } rounded-full"></span>`)
              .append(isFree ? 'Envio gratis' : `S/. ${Number(data.address_price).toFixed(2)}`)

            div.append(priceContainer)
            div.append(envioContainer)

            container.html(div)
          }
        }
      ],
      onContentReady: (...props) => {
        tippy('.tippy-here', {
          arrow: true,
          animation: 'scale'
        })
      }
    }).dxDataGrid('instance')
  </script>

@section('scripts_importados')
  <script>
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
