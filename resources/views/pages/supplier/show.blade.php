<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div
            class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl">Mensaje de
                    {{ $message->full_name }}</h2>
            </header>
            <div class="p-3">
                <div class="p-6">

                    {{-- <p class="font-bold">Telefono:</p>
              <p> {{ $message->phone }} </p>
              <br> --}}
                    <p class="font-bold">Correo:</p>
                    <p id="emailsupplier"> {{ $message->email }} </p>
                    <br>
                    <p class="font-bold">Teléfono:</p>
                    <p> {{ $message->phone }} </p>
                    <br>
                    <p class="font-bold">Mensaje:</p>
                    <p class="mb-5">
                        {{ $message->message }}
                    </p>

                    <a href="{{ route('proveedores.index') }}" class="bg-blue-500 px-4 py-2 rounded text-white"><span><i
                                class="fa-solid fa-arrow-left mr-2"></i></span> Volver</a>

                    <div><button class="px-4 py-3 bg-yellow-500 text-white rounded-lg mt-5" id="toproveedor">Convertir a
                            proveedor</button></div>

                </div>
            </div>
        </div>

    </div>


</x-app-layout>


<script>
    $("#toproveedor").click(function(event) {
        event.preventDefault();
        let mensaje = null;
        let alert = "error";
        let email = "{{ $message->email }}";
        let full_name = "{{ $message->full_name }}";
      
        $.ajax({
            url: "{{ route('createProveedor') }}",
            method: 'POST',
            headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            data: JSON.stringify({
                email: email,
                full_name: full_name
            }),

            success: function(response) {
            //   let alertType = response.success ? "success" : "error";
            //   let message = response.success ? "Proveedor creado con éxito" : "Error al crear el proveedor";
                Swal.fire({
                    position: "center",
                    icon: response.icon,
                    title: response.message,
                    showConfirmButton: true,
                });

            },
            error: function(xhr) {
                let response = xhr.responseJSON;
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.message,
                            showConfirmButton: true,
                         });
            }
        })
    });
</script>
