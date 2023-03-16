<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-truegray">
        <h1 class="text-lg font-semibold mb-6">CARRO DE COMPRAS</h1>

        @if (Cart::count())

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

                @foreach (Cart::content() as $item)

                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                <div>
                                    <p class="font-bold">{{$item->name}}</p>

                                    @if ($item->options->color)
                                        <span class="">
                                            Color: {{ __($item->options->color)}}
                                        </span>
                                    @endif

                                    @if ($item->options->capacity)

                                        <span class="mx-1">-</span>
                                        <span>
                                         Capacidad: {{ $item->options->capacity}}
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </td>

                        <td class="text-center">
                            <span>COP {{$item->price}} </span>
                            <a class="ml-6 cursor-pointer hover:text-rojo-600"
                                wire:click="delete('{{$item->rowId}}')"
                                wire:loading.class="text-rojo-600 opacity-25"
                                wire:target="delete('{{$item->rowId}}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                        <td>
                            <div class="flex justify-center">

                                @if ($item->options->capacity)

                            @livewire('update-cart-item-capacity', ['rowId' => $item->rowId], key($item->rowId))

                            @elseif($item->options->color)

                            @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                
                            @else

                            @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                
                            @endif

                            </div>
                            
                        </td>

                        <td class="text-center">

                                COP {{$item->price * $item->qty}}

                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
            wire:click="destroy">
            <i class="fas fa-trash">

            </i>
            Borrar carrito de compras
        </a>
            
        @else
            
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-truegray mt-4">TU CARRO DE COMPRAS ESTA VACIO</p>

                <x-button-enlace href="/" class="mt-4 px-16">
                    IR AL INICIO
                </x-button-enlace>
            </div>

        @endif
    </section>

    @if (Cart::count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">      
            <div class="flex justify-between items-center">
                <p class="text-truegray">
                    <span class="font-bold text-lg">Total:</span>
                    COP {{Cart::subTotal()}}
                </p>

                <div>
                    <x-button-enlace href="{{ route('orders.create') }}">
                        CONTINUAR CON LA COMPRA
                    </x-button-enlace>
                </div>

            </div>     

        </div>
        
    @endif
</div>
