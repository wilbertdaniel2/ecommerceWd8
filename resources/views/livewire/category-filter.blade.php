<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-rojo-500' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-rojo-500' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <aside>

            <h2 class="font-semibold text-center mb-2">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-rojo-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-rojo-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoria', '{{ $subcategory->slug }}')">{{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($marcas as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-rojo-500 capitalize {{ $marca == $brand->name ? 'text-rojo-500 font-semibold' : '' }}"
                            wire:click="$set('marca', '{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
                       {{-- @php
                       echo '<pre>';
                           print_r($marcas);
                           echo '</pre>';
                       @endphp  --}}
            </ul>

            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')

                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                            <article>

                                
                                @if ($product->images->count())
                                    <a href="{{ route('products.show', $product) }}">
                                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                            <img src="{{ Storage::url($product->images->first()->url) }}"
                                                alt=""
                                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                    </a>
                                @else
                                    <img class="h-40 w-40 object-center object-cover"
                                        src="{{ asset('img/noPhoto.jpg') }}" alt="">
                                @endif    

                                <div class="py-4 px-6">
                                    <h3 class="mt-2 text-lg font-semibold text-gray-700">{{ Str::limit($product->name, 20) }}</h3>

                                    {{-- <p class="mt-1 text-sm font-medium text-gray-700"><del>Antes: $ {{number_format($product->false_price) }}</del></p>
                                    <p class="mt-1 text-lg font-medium text-gray-900">$ {{number_format($product->price) }}</p> --}}
                                </div>


                                {{-- <a href="{{ route('products.show', $product) }}" class="mr-4">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                        <img src="{{ Storage::url($product->images->first()->url) }}"
                                            alt=""
                                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg font-semibold text-gray-700">{{ Str::limit($product->name, 20) }}</h3>
                                    <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($product->price) }}</p>
                                </a> --}}
                            </article>
                        

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-rojo-100 border border-rojo-400 text-rojo-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse ($products as $product)
                        <x-product-list :product="$product" />

                    @empty

                        <div class="bg-rojo-100 border border-rojo-400 text-rojo-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</div>
