<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    productos
                </h1>

                @can('admin.products.delete')
                <x-jet-danger-button wire:click="$emit('deleteProduct')">
                    Eliminar
                </x-jet-danger-button>
                @endcan
            </div>
        </div>
    </header>


    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-4 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">
            Complete esta informacion para crear un producto
        </h1>

        <div class="mb-2" wire:ignore>
            <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        <p class="mb-4"><b>Recomendacion</b>, la imagen debe ser menor a 2 mb de lo contrario el sistema no permitira subir dicha imagen. 
            El formato de la imagen debe ser jpg, para una buena visualizacion del producto la imagen debe ser 566*522, Si el producto aun
        no tiene imagenes, el estado del producto debe ser siempre "Borrador"</p>


        @if ($product->images->count())


            <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>

                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)
                        <li class="relative" wire:key="image-{{ $image->id }}">
                            <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-jet-danger-button>
                        </li>
                    @endforeach

                </ul>
            </section>

        @endif

        @livewire('admin.status-products', ['product' => $product], key('status-product-' . $product->id))

        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">


                {{-- Categoria --}}
                <div>
                    <x-jet-label value="Categorias" />
                    <select class="w-full form-control" wire:model="category_id">
                        <option value="" selected disabled>Seleccione una categoria</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="category_id" />
                </div>

                {{-- Subcategoria --}}
                <div>
                    <x-jet-label value="Subcategorias" />
                    <select class="w-full form-control" wire:model="product.subcategory_id">
                        <option value="" selected disabled>Seleccione una subcategoria</option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="product.subcategory_id" />
                </div>

            </div>


            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="product.name"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="product.name" />
            </div>


            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled class="w-full bg-gray-200" wire:model="slug"
                    placeholder="Ingrese el slug del producto" />
                <x-jet-input-error for="slug" />
            </div>


            {{-- Caracteristicas destacadas --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Caracteristicas destacadas" />
                    <textarea class="w-full form-control" rows="4" wire:model="product.description" x-data x-init="ClassicEditor
                        .create($refs.miEditor)
                        .then(function(editor) {
                            editor.model.document.on('change:data', () => {
                                @this.set('product.description', editor.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });"
                        x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="product.description" />
            </div>

            {{-- Resumen del producto --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Resumen del producto" />
                    <textarea class="w-full form-control" rows="4" wire:model="product.detail_description" x-data x-init="ClassicEditor
                        .create($refs.miEditor)
                        .then(function(editor) {
                            editor.model.document.on('change:data', () => {
                                @this.set('product.detail_description', editor.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });"
                        x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="product.detail_description" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Marca --}}
                <div>
                    <x-jet-label value="Marca" />
                    <select class="form-control w-full" wire:model="product.brand_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="product.brand_id" />
                </div>

                {{-- Precio antes--}}
                <div>
                    <x-jet-label value="Precio original" />
                    <x-jet-input wire:model="product.false_price" type="number" class="w-full" step=".01" />

                    <x-jet-input-error for="product.false_price" />
                </div>

                {{-- Precio --}}
                <div>
                    <x-jet-label value="Precio con descuento" />
                    <x-jet-input wire:model="product.price" type="number" class="w-full" step=".01" />

                    <x-jet-input-error for="product.price" />
                </div>
            </div>


            @if ($this->subcategory)

                @if (
                    !$this->subcategory->color &&
                        !$this->subcategory->capacity &&
                        !$this->subcategory->detail &&
                        !$this->subcategory->screen &&
                        !$this->subcategory->camera &&
                        !$this->subcategory->grid)
                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="product.quantity" type="number" class="w-full" />
                        <x-jet-input-error for="product.quantity" />
                    </div>
                @endif

            @endif


            <div class="flex justify-end items-center mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado!
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire.target="save" wire:click="save">
                    Actualizar producto
                </x-jet-button>
            </div>

        </div>

        @if ($this->subcategory)

            @if ($this->subcategory->capacity)

                @livewire('admin.capacity-product', ['product' => $product], key('capacity-product-' . $product->id))

            @elseif($this->subcategory->color)

                @livewire('admin.color-product', ['product' => $product], key('color-product-' . $product->id))

            @endif

        @endif



    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-4 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">
            Complete las especificaciones para crear un producto
        </h1>

        {{-- @php
        var_dump($product->feature_details);  
        @endphp --}}

        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-jet-label value="Caracteristica" />
                    <select class="form-control w-full" wire:model="feature_id">
                        <option value="" selected>Seleccione una caracteristica</option>
                        @foreach ($features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="feature_id" />
                </div>

                <div>
                    <x-jet-label value="Descripción" />
                    <x-jet-input wire:model="feature_detail" type="text" class="w-full" step=".01" />

                    <x-jet-input-error for="feature_detail" />

        
                </div>

            </div>

            <div class="flex justify-end items-center m-4">

                <x-jet-action-message class="mr-3" on="save">
                    Actualizado!
                </x-jet-action-message>

                @if ($feature_id && $feature_detail)
                    
                <x-jet-button wire:loading.attr="disabled" wire.target="save" wire:click="{{ $action == 'update' ? 'updateFeature' : 'addFeature'}}">
                   {{ $action == 'update' ? 'Actualizar' : 'Agregar'}} caracteristica
                </x-jet-button>

                @endif
            </div>

            <table class="text-gray-600 w-full">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2">Nombre</th>
                        <th class="py-2">Descripción</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($product->feature_details as $detail)
                        <tr>
                            <td class="py-2">
                                <span class="uppercase">
                                    {{$detail->feature->name}}
                                </span>
                            </td>

                            <td class="py-2">
                                <span class="uppercase">
                                    {{$detail->description}}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                  
                                    <a class="pl-2 hover:text-rojo-600 cursor-pointer" wire:click="editFeature({{$detail->id}})">Editar</a>

                                    
                                    <a class="pl-2 hover:text-rojo-600 cursor-pointer" wire:click="deleteFeature({{$detail}})">Eliminar</a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>

    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };

            Livewire.on('deleteCapacity', capacityId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.capacity-product', 'delete', capacityId);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado!',
                            'Aceptar'
                        )
                    }
                })

            })

            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-product', 'delete');

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado!',
                            'Aceptar'
                        )
                    }
                })

            })

            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-product', 'delete', pivot);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado!',
                            'Aceptar'
                        )
                    }
                })
            })

            Livewire.on('deleteColorSize', pivot => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-capacity', 'delete', pivot);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado!',
                            'Aceptar'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
