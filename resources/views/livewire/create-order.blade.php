<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text"
                {{--El punto defer, actualizara la informacion cuando le de click al boton continuar, mas no lo hara cada vez que agregue informacion en el input--}}
                             wire:model.defer="contact"
                             placeholder="Ingrese el nombre de la persona que recibira el producto" 
                             class="w-full" />
                <x-jet-input-error for="contact" />
            </div>

            <div>
                <x-jet-label value="Telefono de contacto" />
                <x-jet-input type="text"
                             wire:model.defer="phone"
                             placeholder="Ingrese un numero de telefono de contacto" 
                             class="w-full" />
                <x-jet-input-error for="phone" />
            </div>
        </div>

        <p class="mt-6 mb-3 text-lg text-truegray font-semibold">Envios</p>

        <div x-data="{ envio_type: @entangle('envio_type') }">

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <Input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-zinc-600">
                    <span class="ml-2 text-truegray">
                        Recojo en tienda (Calle falsa 123)
                    </span>

                    <span class="font-semibold text-truegray ml-auto">
                        Gratis
                    </span>
            </label>


            <div class="bg-white rounded-lg shadow">
                
                <label class="px-6 py-4 flex items-center">
                    <Input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-zinc-600">
                        <span class="ml-2 text-truegray">
                            Envio a domicilio
                        </span>
                          
                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2}">
                    {{--Departamentos--}}
                    <div>
                        <x-jet-label value="Departamento"/>

                        <select class="form-control w-full" wire:model="department_id">

                            <option value="" disabled selected>Selecione un departamento</option>

                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="department_id" />
                    </div>

                    {{--Municipios--}}
                    <div>
                        <x-jet-label value="Municipio"/>

                        <select class="form-control w-full" wire:model="municipality_id">

                            <option value="" disabled selected>Selecione un municipio, ciudad o localidad</option>

                            @foreach ($municipalities as $municipality)
                                <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="municipality_id" />
                    </div>

                    {{--Barrios--}}
                    <div>
                        <x-jet-label value="Barrio"/>

                        <select class="form-control w-full" wire:model="neighborhood_id">

                            <option value="" disabled selected>Selecione un barrio</option>

                            @foreach ($neighborhoods as $neighborhood)
                                <option value="{{$neighborhood->id}}">{{$neighborhood->name}}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="neighborhood_id" />
                    </div>

                    <div>
                        <x-jet-label value="Direccion"/>
                        <x-jet-input class="w-full" wire:model="address" type="text" />
                        <x-jet-input-error for="address" />
                    </div>

                    <div class="col-span-2">
                        <x-jet-label value="Referencia"/>
                        <x-jet-input class="w-full" wire:model="references" type="text" />
                        <x-jet-input-error for="references" />
                    </div>
                </div>

            </div>
            

            <div>
                <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="create_order"
                    class="mt-4 mb-4" 
                    wire:click="create_order">
                    Continuar con la compra
                </x-jet-button>

                <hr>

                <p class="text-sm text-truegray mt-2">Al realizar esta compra, te riges a nuestras politicas, despues ira un link donde mostremos nuestras politicas y le 
                    podemos colocar un enlace que lo lleve a ver detalladamente las politicas <a href="" class="font-semibold text-rojo-500">Politicas y privacidad</a>
                </p>
            </div>

        </div>
           
    </div>

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">

            <ul>
                @forelse (Cart::content() as $item)     
                <li class="flex p-2 border-b border-gray">
                    <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                    <article class="flex-1">
                        <h1 class="font-bold">{{$item->name}}</h1>

                        <div class="flex">
                            <p>Cant: {{$item->qty}}</p>
                            {{--Con esta directiva pregunto si el campo color esta definido, si lo esta me lo agrega al carrito
                                y si no, solamente lo ignora--}}
                            @isset($item->options['color'])
                                <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                            @endisset

                            @isset($item->options['capacity'])
                            <p>{{($item->options['capacity']) }}</p>
                        @endisset
                            
                        </div>

                        <p>COP {{number_format($item->price)}}</p>
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


            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{Cart::subtotal()}} COP</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            {{number_format($shipping_cost)}} COP
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1)
                        {{Cart::subtotal()}} COP
                    @else
                        {{str_replace(',', '', Cart::subtotal()) + $shipping_cost}} COP
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
