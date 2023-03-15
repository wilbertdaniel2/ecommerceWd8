<div>

    
    {{-- <section class="bg-white rounded-lg shadow-lg p-6 text-truegray">
        <h1 class="text-lg font-semibold mb-6">CARRO DE COMPRAS</h1>

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
                                        <span class="mr-1">
                                            Color: {{ __($item->options->color)}}
                                        </span>
                                    @endif

                                    @if ($item->options->capacity)
                                        <span>
                                            Capacidad: {{ $item->options->capacity}}
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </section> --}}
</div>
