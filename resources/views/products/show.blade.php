<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @if ($product->images->count())
                        @foreach ($product->images as $image)

                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>

                        @endforeach
                        @else
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="{{ asset('img/noPhoto.jpg') }}" alt="">
                    @endif  
                        
                    </ul>      
                </div>

               <div class="-mt-10 text-gray-700">
                <h2 class="font-bold text-lg">Descripcion</h2>
                {!!$product->description!!}
               </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-zinc">{{$product->name}}</h1>
                <div class="flex">
                    <p class="text-zinc">Marca: <a class="underline capitalize hover:text-red" href=""> {{ $product->brand->name }}</a></p>
                    <p class="text-zinc mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-red underline" href="">39 Reseñas</a>
                </div>   
                
                {{-- <p class="text-sm font-semibold text-gray-500 my-4">
                    <del>Antes: $ {{ number_format($product->false_price) }}</del>
                 </p>

                <p class="text-2xl font-semibold text-truegray my-4">
                    $ {{ number_format($product->price) }}
                </p> --}}

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-rojo-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-rojo-600">Se hacen envios a todo el atlántico</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                
                {{--Aqui condiciono la informacion que quiero mostrar dependiendo del producto--}}
                {{-- @if ($product->subcategory->capacity)

                    @livewire('add-cart-item-capacity', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else    

                @livewire('add-cart-item', ['product' => $product])

                @endif --}}

                <div class="bg-white rounded-lg shadow-lg mt-6">

                    <div class="p-4 flex items-center">
                        <div class="ml-4">
                            <a href="https://api.whatsapp.com/send?phone=53161377&text=Estoy%20interesado%20en%20el%20producto:%20{{ $product->name }}" target="_blank">
                                <img src="{{ asset('img/contraEntrega.jpg') }}" alt="Contactar por WhatsApp">
                            </a>
                        </div>
                    </div>

                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-rojo-600">
                            <i class="fas fa-shield-alt text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <a href="/" class="underline text-lg font-semibold text-rojo-600">Protección al comprador</a>                          
                        </div>
                    </div>

                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-rojo-600">
                            <i class="fas fa-phone-alt text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <a href="/" class="underline text-lg font-semibold text-rojo-600">Comuniquese con nosotros</a>                          
                        </div>
                    </div>
                </div>
            </div>

        
        </div>
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