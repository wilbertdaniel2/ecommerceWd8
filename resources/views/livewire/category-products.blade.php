<div wire:init="loadPosts">
    @if (count($products))

        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">

                @foreach ($products as $product)
                    {{-- <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
                        
                    <article>
                        <a href="{{route('products.show', $product)}}">
                            <figure>
                                <img class="h-48 w-full object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                            </figure>
                        </a>

                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="{{route('products.show', $product)}}">
                                        {{Str::limit($product->name, 20)}} {{-- Con esta linea de codigo estoy limitando a que solo se muestre los primeros 20 caracteres del nombre del producto
                                    </a>
                                </h1>
                                <p class="font-bold text-truegray">COP {{number_format($product->price)}}</p>
                            </div>        
                    </article>
                    </li> --}}
                    <article class="mr-4">

                        @if ($product->images->count())
                            <a href="{{ route('products.show', $product) }}">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                    <img src="{{ Storage::url($product->images->first()->url) }}" alt=""
                                        class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                            </a>
                        @else
                            <img class="h-40 w-40 object-center object-cover" src="{{ asset('img/noPhoto.jpg') }}"
                                alt="">
                        @endif

                        <div class="py-4 px-6">
                            <h3 class="mt-2 text-lg font-semibold text-gray-700">{{ Str::limit($product->name, 20) }}
                            </h3>

                            {{-- <p class="mt-1 text-sm font-medium text-gray-900"><del>Antes: $ {{ number_format($product->false_price) }}</del></p>
                            <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($product->price) }}</p> --}}
                        </div>

                    </article>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            {{-- Con esta linea de codigo muestro los puntos debajo de las imagenes --}}
            {{-- <div role="tablist" class="dots"></div> --}}
        </div>


        <style>
            .float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 40px;
                right: 40px;
                background-color: #37d45e;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 100;
            }

            .float:hover {
                text-decoration: none;
                color: #FFF;
                background-color: #2a8a52;

                animation: shake 1s;


                animation-iteration-count: infinite;
            }

            .my-float {
                margin-top: 16px;
            }

            .pulse {
                animation: pulse-animation 2s infinite;
            }


            @keyframes pulse-animation {
                0% {
                    box-shadow: 0 0 0 0px #25d36657 rgba(0, 0, 0, 0.2);
                }

                100% {
                    box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
                }
            }
        </style>

        {{-- Boton de whatsapp --}}
        <div style="position: fixed; bottom: 20px; right: 20px;">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=53161377&text=HOLA,%20QUISIERA%20CONSULTAR%20SOBRE%20TUS%20PRODUCTOS"
                class="float pulse" target="_blank">
                <i class="fa fa-whatsapp my-float "></i>
            </a>
        </div>

        {{-- Mensaje "Contáctanos" --}}
        <div style="position: fixed; bottom: 90px; right: 20px; background-color: black; color: white; padding: 10px; border-radius: 5px; margin-bottom: 20px; z-index: 999;">
            Contáctanos!
        </div>
        
        
    @else
        {{-- Spiner de carga, puede ser modificado en un futuro dependiendo del gusto --}}
        <div class="flex items-center justify-center">
            <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                role="status">
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
            </div>
        </div>

    @endif


</div>
