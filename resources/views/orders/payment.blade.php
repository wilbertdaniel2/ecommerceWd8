<x-app-layout>


    <div class="container py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-truegray uppercase"><span class="font-semibold">Numero de orden:</span> Orden-{{$order->id}}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-truegray">
                <div>
                    <p class="text-lg font-semibold uppercase">Envio</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p>Calle falsa 123</p>
                    @else
                        <p class="text-sm">Los productos seran enviados a:</p>
                        <p>{{$order->address}}</p>
                        <p>{{$order->department->name}} - {{$order->city->name}} - {{$order->district->name}}</p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                    <p class="text-sm">Persona que recibira el producto: {{$order->contact}}</p>
                    <p class="text-sm">Telefono de contacto: {{$order->phone}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-truegray">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-300">
                   @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4"
                                    src="{{$item->options->image}}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>
                                        <div class="flex text-xs">
                                            @isset ($item->options->color)
                                               Color: {{__($item->options->color)}}
                                            @endisset

                                            @isset ($item->options->capacity)
                                               - {{($item->options->capacity)}}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{$item->price}} COP
                            </td>
                            <td class="text-center">
                                {{$item->qty}}
                            </td>
                            <td class="text-center">
                                {{$item->price * $item->qty}} COP
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">
            <img class="h-12" src="{{ asset('img/images.png') }}" alt="">
            <div class="text-truegray">
                <p class="text-sm font-semibold">
                    Subtotal: {{$order->total - $order->shipping_cost}} COP  
                </p> 
                <p class="text-sm font-semibold">
                    Envio: {{$order->shipping_cost}} COP  
                </p>  
                <p class="text-lg font-semibold uppercase">
                    Total: {{$order->total}} COP  
                </p>  
            </div>
        </div>

    </div>
    
</x-app-layout>