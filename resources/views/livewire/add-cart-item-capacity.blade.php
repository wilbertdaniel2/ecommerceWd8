<div x-data>
    <div>
        <p class="text-xl text-truegray">
            Capacidad:
        </p>
        <select wire:model="capacity_id" class="form-control w-full">
            <option value="" selected disabled>Selecciona la capacidad</option>
            @foreach ($capacities as $capacity)
                <option value="{{$capacity->id}}">{{$capacity->name}}</option>
            @endforeach
        </select>
    </div>

    {{-- <pre>
        @php
            var_dump($capacities);
            echo $product->id;
        @endphp
    </pre> --}}

    <div class="mt-2">
        <p class="text-xl text-truegray">
            Color:
        </p>
        <select wire:model="color_id" class="form-control w-full">
            <option value="" selected disabled>Selecciona un color</option>

            @foreach ($colors as $color)
                <option value="{{$color->id}}">{{ __($color->name)}}</option>
            @endforeach
        </select>
    </div>

    <p class="text-truegray my-4">
        <span class="font-semibold text-lg"> Stock disponible: </span> 
        @if ($quantity)
            {{$quantity}}
        @else
            {{$product->stock}}
        @endif
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button 
            disabled
            x-bind:disabled="$wire.qty <= 1"
            wire:loading.attr="disabled"
            wire:target="decrement"
            wire:click="decrement">
                -
            </x-jet-secondary-button>

            <span class="mx-2 text-truegray">{{$qty}}</span>

            <x-jet-secondary-button 
            x-bind:disabled="$wire.qty >= $wire.quantity"
            wire:loading.attr="disabled"
            wire:target="increment"
            wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-button
            {{--Solo cuando el valor de quantity sea igual a 0 el boton quedara deshabilitado--}}
             x-bind:disabled="!$wire.quantity"
             class="w-full"
             wire:click="addItem"
             wire:loading.attr="disabled"
             wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
