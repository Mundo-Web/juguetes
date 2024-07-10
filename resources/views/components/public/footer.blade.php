<footer class="font-poppins bg-coloBkprimJl text-white pb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12  md:justify-center w-11/12 mx-auto py-16 ">
        <div class="lg:col-span-4 w-full flex flex-col gap-10">
            <div>
                <a href="{{ route('index') }}">
                    <img src="{{ asset('/images/svg/jl_logofooter.svg') }}" alt="Juguetes" /></a>
            </div>
            <nav>
                <ul class="flex flex-col gap-3 text-base font-normal">
                    <li class="flex flex-row gap-2"><img src="{{ asset('/images/svg/jl_map.svg') }}" /> Av. Camino Real 356 - San Isidro. Lima - Perú</li>
                    <li class="flex flex-row gap-2"><img src="{{ asset('/images/svg/jl_mail.svg') }}" /> soporte@jugueteslúdicos.com.pe</li>
                    <li class="flex flex-row gap-2"><img src="{{ asset('/images/svg/jl_whatsapp.svg') }}" /> +51 987435733</li>
                </ul>
            </nav>
            
                
        </div>

        <div class="lg:col-span-3 w-full  flex flex-col gap-5">
            <h3 class="font-bold text-lg">Términos Legales</h3>

             <nav>
                <ul class="flex flex-col gap-3 text-base font-normal">
                    <li class="flex flex-row gap-2"><a href="{{ route('catalogo.all') }}"> Políticas de privacidad </a></li>
                    <li class="flex flex-row gap-2"><a href="{{ route('catalogo.all') }}"> Políticas de envío </a></li>
                    <li class="flex flex-row gap-2"><a href="{{ route('catalogo.all') }}"> Políticas de devolución y cambio </a></li>
                </ul>
            </nav>

            <a href="{{route('librodereclamaciones')}}"><img class="w-28" src="{{ asset('images/img/reclamaciones.png') }}"/></a>
        </div>

        <div class="lg:col-span-2 w-full flex flex-col gap-5">
           <h3 class="font-bold text-lg">Menú</h3>

            <nav>
                <ul class="flex flex-col gap-3 text-base font-normal">
                    <li class="flex flex-row gap-2"><a href="#"> Inicio </a></li>
                    <li class="flex flex-row gap-2"><a href="#"> Productos </a></li>
                    <li class="flex flex-row gap-2"><a href="#"> Blog </a></li>
                    <li class="flex flex-row gap-2"><a href="#"> Contáctanos </a></li>
                </ul>
            </nav>
        </div>

        <div class="lg:col-span-3 w-full  flex flex-col gap-5">


            <h3 class="text-2xl font-bold">Suscríbete a nuestro blog</h3>
            <p class="font-normal text-base">Mantente actualizado sobre las últimas noticias y ofertas.</p>
            
           <div class="flex flex-col gap-2">
                <form action="" id="footerFormulario"
                    class="flex flex-col md:flex-row md:justify-start md:items-center gap-3">
                    @csrf
                    <div class="w-full">
                        <input required name="email" type="email" id="emailFooter" class="ring-0 focus:ring-0 border-transparent focus:border-transparent bg-white px-5 py-3 rounded-xl w-full text-colorJL placeholder:text-colorJL" placeholder="info@mail.com" />
                    </div>
                    <input type="hidden" id="nameFooter" required name="full_name" value="Usuario suscrito" />
                    <input type="hidden" id="tipo" placeholder="tipo" name="tipo_message" value="Inscripción" />

                    <div class="flex justify-center items-center w-full md:w-auto">
                         <button
                            type="submit"
                            class="font-helveticaBold text-base text-white border border-white py-3 px-3 rounded-xl w-full md:w-auto text-center">Suscribirme
                        </button>
                    </div>
                </form>
                <p class="font-helveticaLight text-text12 text-white">
                    Al suscribirse, acepta nuestra Política de privacidad y brinda su
                    consentimiento para recibir actualizaciones de nuestra empresa.
                </p>
            </div>

            
        </div>
    </div>

    <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center gap-5 w-11/12 mx-auto">
        <div class="flex flex-col md:flex-row gap-2">
            <p class="font-normal text-[13px]">
                Copyright &copy; <a target="_blank" href="http://mundoweb.pe/" class="font-bold">2024 Mundo Web</a>. Reservados todos los derechos
            </p>
            {{-- <p class="hidden md:block">|</p>

            <div class="flex gap-5">
                <a href="#" class="font-normal text-[12px] text-[#6C7275]">Política de privacidad</a>
                <a href="#" class="font-normal text-[12px] text-[#6C7275]">Términos y Condiciones</a>
            </div> --}}
        </div>

        <div class="flex flex-wrap gap-2 pb-5">
            <a href="#"><img class="w-10" src="{{ asset('images/svg/jl_facebook.svg') }}" alt="facebook" /></a>
            <a href="#"><img class="w-10" src="{{ asset('images/svg/jl_instagram.svg') }}" alt="instagram" /></a>
            <a href="#"><img class="w-10" src="{{ asset('images/svg/jl_whatsapp2.svg') }}" alt="whatsapp" /></a>
        </div>
    </div>
</footer>
