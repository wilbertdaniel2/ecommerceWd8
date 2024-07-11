<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear un producto
    </h1>



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
            <select class="w-full form-control" wire:model="subcategory_id">
                <option value="" selected disabled>Seleccione una subcategoria</option>

                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategory_id" />
        </div>

    </div>


    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="name" placeholder="Ingrese el nombre del producto" />
        <x-jet-input-error for="name" />
    </div>


    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" disabled class="w-full bg-gray-200" wire:model="slug"
            placeholder="Ingrese el slug del producto" />
        <x-jet-input-error for="slug" />
    </div>


    {{-- Caracteristicas destacadas --}}
    <div class="mb-4" >
        <div wire:ignore>
            <x-jet-label value="Caracteristicas destacadas" />
            <textarea class="w-full form-control" rows="4" wire:model="description" x-data x-init="ClassicEditor
                .create($refs.miEditor)
                .then(function(editor) {
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch(error => {
                    console.error(error);
                });"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>

    {{-- Resumen del producto --}}
    <div class="mb-4" >
        <div wire:ignore>
            <x-jet-label value="Resumen del producto" />
            <textarea class="w-full form-control" rows="4" wire:model="detail_description" x-data x-init="ClassicEditor
                .create($refs.miEditor)
                .then(function(editor) {
                    editor.model.document.on('change:data', () => {
                        @this.set('detail_description', editor.getData())
                    })
                })
                .catch(error => {
                    console.error(error);
                });"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="detail_description" />
    </div>

    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- Marca --}}
        <div>
            <x-jet-label value="Marca" />
            <select class="form-control w-full" wire:model="brand_id">
                <option value="" selected disabled>Seleccione una marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <x-jet-input-error for="brand_id" />
        </div>

        {{-- Precio antes --}}
        <div>
            <x-jet-label value="Precio original" />
            <x-jet-input wire:model="false_price" 
                         type="number" 
                         class="w-full" 
                         step=".01" />

            <x-jet-input-error for="false_price" />
        </div>

        {{-- Precio original --}}
        <div>
            <x-jet-label value="Precio con descuento" />
            <x-jet-input wire:model="price" 
                         type="number" 
                         class="w-full" 
                         step=".01" />

            <x-jet-input-error for="price" />
        </div>
    </div>

    @if ($subcategory_id)

        @if (
            !$this->subcategory->color &&
                !$this->subcategory->capacity &&
                !$this->subcategory->detail &&
                !$this->subcategory->screen &&
                !$this->subcategory->camera &&
                !$this->subcategory->grid)
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="quantity" 
                             type="number" 
                             class="w-full" />
                <x-jet-input-error for="quantity" />
            </div>
        @endif

    @endif

    <div class="flex mt-4">
        <x-jet-button 
            wire:loading.attr="disabled"
            wire.target="save"
            wire:click="save"
            class="ml-auto">
            Crear producto
        </x-jet-button>
    </div>
</div>
