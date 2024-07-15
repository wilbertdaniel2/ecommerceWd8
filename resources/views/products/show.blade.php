<x-app-layout>
    <div class="container py-8">
        {{-- <div class="bg-white rounded-3xl shadow-lg grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6"> --}}
            <div class="bg-white rounded-3xl shadow-lg flex flex-col md:flex-col lg:flex-row flex-row">

            {{-- <div class="bg-white rounded-lg shadow-lg mb-6"> --}}
            <div class="m-10 basis-1/2 ">
                <div class="flexslider">
                    <ul class="slides">
                        @if ($product->images->count())
                            @foreach ($product->images as $image)
                                <li data-thumb="{{ Storage::url($image->url) }}">
                                    <img src="{{ Storage::url($image->url) }}" />
                                </li>
                            @endforeach
                        @else
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('img/noPhoto.jpg') }}"
                                alt="">
                        @endif

                    </ul>
                </div>

            </div>

            <div class="m-10 basis-1/3 ">
                <h1 class="text-5xl font-bold text-zinc">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-zinc">Marca: <a class="underline capitalize hover:text-red" href="">
                            {{ $product->brand->name }}</a></p>
                    <p class="text-zinc mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                </div>
                <div>
                    <a class="text-red underline" href="">39 Reseñas</a>
                </div>

                {{-- <p class="text-sm font-semibold text-gray-500 my-4">
                    <del>Antes: $ {{ number_format($product->false_price) }}</del>
                </p>

                <p class="text-2xl font-semibold text-truegray my-4">
                    $ {{ number_format($product->price) }}
                </p> --}}

                {{-- Aqui condiciono la informacion que quiero mostrar dependiendo del producto --}}
                {{-- @if ($product->subcategory->capacity)

                    @livewire('add-cart-item-capacity', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else    

                @livewire('add-cart-item', ['product' => $product])

                @endif --}}



                <div class="mt-6 text-gray-700">
                    <h2 class="font-bold text-lg">Caracteristicas desctacadas:</h2>
                    {!! $product->description !!}
                    <p class="mt-4 text-gray-700 underline"><a href="#caracteristicas">Ver mas carácteristicas</a></p>
                </div>

                {{-- <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-rojo-600">
                            <i class="fas fa-phone-alt text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <a href="/" class="underline text-lg font-semibold text-rojo-600">Comuniquese con nosotros</a>                          
                        </div>
                    </div> --}}

            </div>

            <div class="m-10 basis-1/3 h-svh border border-gray-800 rounded-3xl">

                <div class="mt-6 flex flex-col items-center">

                    <x-button-action class="py-4 w-48 md:w-48 lg:w-48 xl:w-64 rounded-ful my-3" color="rojo-500" href="tel:+573174160446">
                        Llamanos!
                    </x-button-action>

                    <x-button-action class="py-4 w-48 md:w-48 lg:w-48 xl:w-64 rounded-ful my-3" color="green-400" href="https://api.whatsapp.com/send?phone=3174160446&text=Estoy%20interesado%20en%20el%20producto:%20{{ $product->name }}">
                        Escribenos!
                    </x-button-action>

                    {{-- <div class="p-4 flex items-center">
                        <div class="ml-4">
                            <a href="https://api.whatsapp.com/send?phone=3174160446&text=Estoy%20interesado%20en%20el%20producto:%20{{ $product->name }}"
                                target="_blank">
                                <img src="{{ asset('img/pago.gif') }}" alt="Contactar por WhatsApp">
                            </a>
                        </div>
                    </div>

                    <div class="p-4 flex items-center">
                        <img class="flex items-center justify-center h-10 w-10 rounded-full"
                            src="{{ asset('img/logo-wasap.png') }}" alt="">
                        <div class="ml-4">
                            <a href="https://api.whatsapp.com/send?phone=3174160446&text=Estoy%20interesado%20en%20el%20producto:%20{{ $product->name }}"
                                class="underline text-lg font-semibold text-green-600">Contacta con nosotros!</a>
                        </div>
                    </div>

                    {{-- <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-rojo-600">
                            <i class="fas fa-phone-alt text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <a href="/" class="underline text-lg font-semibold text-rojo-600">Comuniquese con nosotros</a>                          
                        </div>
                    </div> --}}
                </div>

                <div class="m-4 text-center">

            
                    {{-- <p class="text-sm font-semibold text-gray-500 my-4">
                    <del>Antes: $ {{ number_format($product->false_price) }}</del>
                    </p>

                    <p class="text-2xl font-semibold text-truegray my-4">
                        $ {{ number_format($product->price) }}
                    </p> --}}

                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-tahiti-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-600">Envios nacionales</p>
                        </div>
                    </div>

                    <div class="p-4 pt-1 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-tahiti-600">
                            <i class="fas fa-shield-alt text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-600">Protección al
                                comprador</p>
                        </div>
                    </div>

                    <div class="p-4 pt-1 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-tahiti-600">
                            <i class="fas fa-money-bill text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-600">Pagos contra entrega</p>
                        </div>
                    </div>

                    <div class="p-4 pt-10 flex items-center sm:flex-col">
                        <div class="ml-4">
                            <a href="https://api.whatsapp.com/send?phone=3174160446&text=Estoy%20interesado%20en%20el%20producto:%20{{ $product->name }}" class="text-lg font-semibold text-gray-600">Para pagos contra entregas escribenos</a>
                        </div>
                        <span class="flex items-center justify-center h-7 w-7 rounded-full bg-green-400">
                            <i class="fab fa-whatsapp text-sm text-white"></i>
                        </span>
                    </div>


                    

                    {{-- Aqui condiciono la informacion que quiero mostrar dependiendo del producto --}}
                    {{-- @if ($product->subcategory->capacity)

                    @livewire('add-cart-item-capacity', ['product' => $product])

                    @elseif($product->subcategory->color)

                        @livewire('add-cart-item-color', ['product' => $product])

                    @else    

                    @livewire('add-cart-item', ['product' => $product])

                    @endif --}}

                </div>
            </div>
        </div>

        <div class="py-3" id="caracteristicas"></div>

        @if ($product->feature_details->count()>0)
           
        <div class="bg-white rounded-3xl shadow-lg grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6">
            

            <div class="m-10">

                <div class="mb-4"> 
                    <h2 class="text-xl">Especificaciones:</h2>
                    <hr class="mb-6 border-rojo-500">
                </div>
                
               

                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($product->feature_details()->orderBy('order', 'asc')->get() as $feature)
                        
                    
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $feature->feature->name }}
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{ $feature->description }}
                          </div>
                       </div>
                    </li> 

                    @endforeach
                </ul>
            </div>

            <div class="m-10 text-gray-700">
                <div class="mb-4"> 
                    <h2 class="text-xl">Resumen del producto:</h2>
                    <hr class="mb-6 border-rojo-500">
                </div>

                {!! $product->detail_description !!}
            </div>
        </div>

        @endif
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
