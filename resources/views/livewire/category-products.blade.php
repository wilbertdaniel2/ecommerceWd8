<div wire:init="loadPosts">
    @if (count($products))

        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                
                @foreach ($products as $product)
                    
                <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
                        
                    <article>
                        <a href="{{route('products.show', $product)}}">
                            <figure>
                                <img class="h-48 w-full object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                            </figure>
                        </a>    

                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="{{route('products.show', $product)}}">
                                        {{Str::limit($product->name, 20)}} {{--Con esta linea de codigo estoy limitando a que solo se muestre los primeros 20 caracteres del nombre del producto--}}
                                    </a>
                                </h1>
                                <p class="font-bold text-truegray">COL$ {{number_format($product->price)}}</p>
                            </div>        
                    </article>
                </li>

                @endforeach
            </ul>
        
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            {{--Con esta linea de codigo muestro los puntos debajo de las imagenes--}}
            {{-- <div role="tablist" class="dots"></div> --}}
        </div>

    @else
        {{--Spiner de carga, puede ser modificado en un futuro dependiendo del gusto--}}
        <div class="flex items-center justify-center">
            <div
              class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
              role="status">
              <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                >Loading...</span
              >
            </div>
          </div>	    

    @endif
 
</div>
