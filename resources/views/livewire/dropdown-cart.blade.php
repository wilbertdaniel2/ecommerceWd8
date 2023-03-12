<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                 <x-cart color="white" size="30"/>

                 @if (Cart::count())
                 <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray transform translate-x-1/2 -translate-y-1/2 bg-red rounded-full">{{Cart::count()}}</span>
                 @else
                 <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red rounded-full"></span>
                 @endif
            </span>
        </x-slot>

        <x-slot name="content">

            <ul>
                @forelse (Cart::content() as $item)     
                <li class="flex p-2 border-b border-gray">
                    <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                    <article class="flex-1">
                        <h1 class="font-bold">{{$item->name}}</h1>
                        <p>Cant: {{$item->qty}}</p>
                        <p>COP {{$item->price}}</p>
                    </article>
                </li>

                @empty

                <li class="py-6 px-4">
                    <p class="text-center text-zinc">
                        No tiene agregado ningún item en el carrito
                    </p>
                </li>

                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class="text-lg text-truegray mt-2 mb-3"><span class="font-bold">Total</span>: COP {{cART::subtotal()}}</p>


                    <x-button-enlace color="red" class="w-full">
                        Ir al carrito de compras
                    </x-button-enlace>

                </div>
            @endif
          
        </x-slot>
    </x-jet-dropdown>
</div>
