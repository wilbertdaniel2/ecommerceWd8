<div>
        @php
            // SDK de Mercado Pago
            require base_path('/vendor/autoload.php');
            // Agrega credenciales
            MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
            
            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();
    
            $shipments = new MercadoPago\Shipments();
    
            $shipments->cost = $order->shipping_cost;
            $shipments->mode = "not_specified";
    
            $preference->shipments = $shipments;
            
            // Crea un ítem en la preferencia
            foreach ($items as $product) {
                $item = new MercadoPago\Item();
                $item->title = $product->name;
                $item->quantity = $product->qty;
                $item->unit_price = $product->price;
    
                $products[] = $item;
            }
    
            $preference->back_urls = array(
                "success" => route('orders.pay', $order),
                "failure" => "http://www.tu-sitio/failure",
                "pending" => "http://www.tu-sitio/pending"
            );
    
            $preference->items = $products;
            $preference->save();
        @endphp
    
        <div class="grid grid-cols-5 gap-6 container py-8">
            <div class="col-span-3">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                    <p class="text-truegray uppercase"><span class="font-semibold">Numero de orden:</span>
                        Orden-{{ $order->id }}</p>
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
                                <p>{{ $order->address }}</p>
                                <p>{{ $order->department->name }} - {{ $order->city->name }} - {{ $order->district->name }}</p>
                            @endif
                        </div>
                        <div>
                            <p class="text-lg font-semibold uppercase">Datos de contacto</p>
        
                            <p class="text-sm">Persona que recibira el producto: {{ $order->contact }}</p>
                            <p class="text-sm">Telefono de contacto: {{ $order->phone }}</p>
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
                                            <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                                alt="">
                                            <article>
                                                <h1 class="font-bold">{{ $item->name }}</h1>
                                                <div class="flex text-xs">
                                                    @isset($item->options->color)
                                                        Color: {{ __($item->options->color) }}
                                                    @endisset
        
                                                    @isset($item->options->capacity)
                                                        - {{ $item->options->capacity }}
                                                    @endisset
                                                </div>
                                            </article>
                                        </div>
                                    </td>
        
                                    <td class="text-center">
                                        {{ $item->price }} COP
                                    </td>
                                    <td class="text-center">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->price * $item->qty }} COP
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                
        
            </div>
    
            <div class="col-span-2">
                <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
    
                    <div class=" flex justify-between items-center mb-4">
                        <img class="h-12" src="{{ asset('img/images.png') }}" alt="">
                        <div class="text-truegray">
                            <p class="text-sm font-semibold">
                                Subtotal: {{ $order->total - $order->shipping_cost }} COP
                            </p>
                            <p class="text-sm font-semibold">
                                Envio: {{ $order->shipping_cost }} COP
                            </p>
                            <p class="text-lg font-semibold uppercase">
                                Total: {{ $order->total }} COP
                            </p>
            
                            
                            
                            
                        </div>
                    </div>

                    <div class="cho-container py-6"></div>
                    
                    {{-- <div id="paypal-button-container"></div> --}}
    
                </div>
            </div>
        </div>
    
        
    @push('script')
        
   
        {{-- SDK MercadoPago.js --}}
        <script src="https://sdk.mercadopago.com/js/v2"></script>
    
        <div class="cho-container"></div>
        <script>
            const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'es-CO'
            });
    
            mp.checkout({
                preference: {
                    id: '{{$preference->id}}'
                },
                render: {
                    container: '.cho-container', //Indica donde se mostrara el boton de pago
                    label: 'Pagar', // cambia el texto del boton de pago (opcional)
                }
            });
        </script>
    
        {{-- <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>
    
        <script>
            paypal.Buttons({
              // Order is created on the server and the order id is returned
              createOrder() {
                return fetch("/my-server/create-paypal-order", {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json",
                  },
                  // use the "body" param to optionally pass additional order information
                  // like product skus and quantities
                  body: JSON.stringify({
                    cart: [
                      {
                        sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                        quantity: "YOUR_PRODUCT_QUANTITY",
                      },
                    ],
                  }),
                })
                .then((response) => response.json())
                .then((order) => order.id);
              },
              // Finalize the transaction on the server after payer approval
              onApprove(data) {
                return fetch("/my-server/capture-paypal-order", {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json",
                  },
                  body: JSON.stringify({
                    orderID: data.orderID
                  })
                })
                .then((response) => response.json())
                .then((orderData) => {
                  // Successful capture! For dev/demo purposes:
                  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                  const transaction = orderData.purchase_units[0].payments.captures[0];
                  alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                  // When ready to go live, remove the alert and show a success message within this page. For example:
                  // const element = document.getElementById('paypal-button-container');
                  // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                  // Or go to another URL:  window.location.href = 'thank_you.html';
                });
              }
            }).render('#paypal-button-container');
          </script> --}}
    
          @endpush
</div>
