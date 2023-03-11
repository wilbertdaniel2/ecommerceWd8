<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)

                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>

                        @endforeach
                        
                    </ul>
                  </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-zinc">{{$product->name}}</h1>
                <div class="flex">
                    <p class="text-zinc">Marca: <a class="underline capitalize hover:text-red" href=""> {{ $product->brand->name }}</a></p>
                    <p class="text-zinc mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-red underline" href="">39 Reseñas</a>
                </div>   
                
                <p class="text-2xl font-semibold text-truegray my-4">
                   COP {{ $product->price }}
                </p>

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-red">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-red">Se hacen envios a todo el atlántico</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                
                {{--Aqui condiciono la informacion que quiero mostrar dependiendo del producto--}}
                @if ($product->subcategory->capacity)

                    @livewire('add-cart-item-capacity', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else    

                @livewire('add-cart-item', ['product' => $product])

                @endif
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