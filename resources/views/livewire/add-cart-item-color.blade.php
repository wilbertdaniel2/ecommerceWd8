<div x-data>
    <p class="text-xl text-truegray">Color</p>

    <select wire:model="color_id" class="form-control w-full">
        <option value="" selected disabled> Seleccionar un color </option>
        @foreach ($colors as $color)
            <option value="{{$color->id}}">{{$color->name}}</option>
        @endforeach
    </select>

    <div class="flex mt-4">
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
             class="w-full">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
