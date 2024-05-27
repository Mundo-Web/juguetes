<footer class="font-poppins bg-[#21201E] text-white mt-12 pb-10">
    <div class="flex flex-col gap-10 md:flex-row md:justify-center w-11/12 mx-auto py-16 border-b-2 border-[#6C7275]">
        <div class="basis-3/6 flex flex-col gap-10">
            <div>
                <a href="{{ route('index') }}">
                    <img src="{{ asset('/images/img/logo_footer_decotab.png') }}" alt="decotab" /></a>
            </div>
            <p class="font-medium text-[20px]">
                Deco Tab es reconocido por la excelente calidad de sus productos, como Wall Panel, mármol UV y piedra
                PU. La
                empresa cuenta con un equipo capacitado en la producción de estos materiales que harán de tu espacio más
                moderno
                y acogedor. ¿Te encuentras interesado? Contamos con oficinas en Lima y realizamos envíos a nivel
                nacional.
            </p>
            @foreach ($datosgenerales as $item)
                <div class="flex gap-5">

                    @if ($item->instagram)
                        <a href="{{ $item->instagram }}" target="_blank"><img
                                src="{{ asset('/images/svg/instagram.svg') }}" alt="instagram" /></a>
                    @endif

                    @if ($item->facebook)
                        <a href="{{ $item->facebook }}" target="_blank"><img
                                src="{{ asset('/images/svg/facebook.svg') }}" alt="facebook" /></a>
                    @endif

                    @if ($item->youtube)
                        <a href="{{ $item->youtube }}" target="_blank"><img src="{{ asset('/images/svg/youtube.svg') }}"
                                alt="youtube" /></a>
                    @endif
                </div>
        </div>

        <div class="basis-1/6 flex flex-col gap-5">
            <h3 class="font-medium text-[16px]">Page</h3>

            <a href="/" class="font-normal text-[14px]">Home</a>
            <a href="{{ route('catalogo', 0) }}" class="font-normal text-[14px]">Catálogo</a>
            <a href="{{ route('contacto') }}" class="font-normal text-[14px]">Contacto</a>
        </div>

        <div class="basis-1/6 flex flex-col gap-5">
            <h3 class="font-medium text-[16px]">Info</h3>

            <a href="#" class="font-normal text-[14px]">Política de envíos</a>
            <a><button @click="openModal = true" class="font-normal text-[14px]">Política de devolucion</button></a>
            <a href="#" class="font-normal text-[14px]">Soporte</a>
            <a href="#" class="font-normal text-[14px]">FAQs</a>
        </div>

        <div class="basis-1/6 flex flex-col gap-5">


            <h3 class="font-medium text-[16px]">Office</h3>
            <p class="font-normal text-[14px]">{{ $item->address }}</p>
            <p class="font-normal text-[14px]">
                @if ($item->district && $item->city)
                    {{ $item->district }}, {{ $item->city }}
                @elseif ($item->district)
                    {{ $item->district }}
                @elseif ($item->city)
                    {{ $item->city }}
                @endif
            </p>
            <p class="font-normal text-[14px]">{{ $item->country }}</p>
            <p class="font-normal text-[14px]">{{ $item->cellphone }}</p>
            @endforeach

            <a href="{{route('librodereclamaciones')}}"><img class="w-28" src="{{ asset('images/img/reclamaciones.png') }}"/></a>
        </div>
    </div>

    <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center gap-5 w-11/12 mx-auto">
        <div class="flex flex-col md:flex-row gap-2">
            <p class="font-normal text-[12px]">
                Copyright &copy; 2023 Mundo Web. Reservados todos los derechos
            </p>
            <p class="hidden md:block">|</p>

            <div class="flex gap-5">
                <a href="#" class="font-normal text-[12px] text-[#6C7275]">Política de privacidad</a>
                <a href="#" class="font-normal text-[12px] text-[#6C7275]">Términos y Condiciones</a>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 pb-5">
            <img src="{{ asset('images/svg/visa.svg') }}" alt="visa" />
            <img src="{{ asset('images/svg/american.svg') }}" alt="american" />
            <img src="{{ asset('images/svg/mastercad.svg') }}" alt="mastercad" />
            <img src="{{ asset('images/svg/stripe.svg') }}" alt="stripe" />
            <img src="{{ asset('images/svg/paypal.svg') }}" alt="paypal" />
            <img src="{{ asset('images/svg/pay.svg') }}" alt="pay" />
        </div>
    </div>
</footer>

<!-- Modal -->
<div x-data="{ openModal: false }" x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-gray-900 bg-opacity-50 absolute inset-0" @click="openModal = false"></div>

    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 relative z-10 max-w-lg w-full mx-4 p-6">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Políticas de Devolución</h2>
            <button @click="openModal = false" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </header>

        <div class="p-4">
            <p class="text-gray-700 dark:text-gray-300">
                {{$politicDev->content }}
            </p>
        </div>

        <div class="flex justify-end">
            <button @click="openModal = false" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Cerrar
            </button>
        </div>
    </div>
</div>