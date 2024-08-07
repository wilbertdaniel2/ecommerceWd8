<div>
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre de la categoria
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1"/>

                <x-jet-input-error for="createForm.name" />

            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input disabled wire:model="createForm.slug" type="text" class="w-full mt-1 bg-gray-100"/>

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Url
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.url" type="text" class="w-full mt-1"/>

                <x-jet-input-error for="createForm.url" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Icono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" type="text" class="w-full mt-1"/>

                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4">

                    @foreach ($brands as $brand)
                        
                    <x-jet-label>
                        <x-jet-checkbox 
                        wire:model.defer="createForm.brands"
                        name="brands[]"
                        value="{{$brand->id}}"/>
                        {{$brand->name}}
                    </x-jet-label>

                    @endforeach

                </div>
                <x-jet-input-error for="createForm.brands" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen para la categoria oculta
                </x-jet-label>

                <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">

                <x-jet-input-error for="createForm.image" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen de la categoria en la pagina principal
                </x-jet-label>

                <input wire:model="createForm.image_banner" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">

                <x-jet-input-error for="createForm.image_banner" />
            </div>
        </x-slot>

        

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Categoria creada!
            </x-jet-action-message>

            @can('admin.categories.create')
            <x-jet-button>
                Agregar
            </x-jet-button>
            @endcan
           
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>

        <x-slot name="description">
            Aqui encontrará todas las categorias agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!!$category->icon!!}
                                </span>

                                <a href="{{route('admin.categories.show', $category)}}" class="uppercase underline hover:text-rojo-600">
                                    {{$category->name}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    @can('admin.categories.edit')
                                    <a class="pr-2 hover:text-tahiti-600 cursor-pointer" wire:click="edit('{{$category->slug}}')">Editar</a>
                                    @endcan
                                    
                                    @can('admin.categories.delete')
                                    <a class="pl-2 hover:text-rojo-600 cursor-pointer" wire:click="$emit('deleteCategory', '{{$category->slug}}')">Eliminar</a>
                                    @endcan
                                
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Categoria
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">

                <div>
                    <x-jet-label>
                        Imagen para la categoria oculta
                    </x-jet-label>
                    @if ($editImage)
                        <img class="w-full h-64 object-cover object-center" src="{{$editImage->temporaryUrl()}}" alt="">
                    @elseif($editForm['image'])
                        <img class="w-full h-64 object-cover object-center" src="{{Storage::url($editForm['image'])}}" alt="">
                    @endif
                </div>

                <div>
                    <x-jet-label>
                        Imagen para la categoria en la pagina principal
                    </x-jet-label>
                    @if ($editImageBanner)
                        <img class="w-full h-64 object-cover object-center" src="{{$editImageBanner->temporaryUrl()}}" alt="">
                    @elseif($editForm['image_banner'])
                        <img class="w-full h-64 object-cover object-center" src="{{Storage::url($editForm['image_banner'])}}" alt="">
                    @endif
                </div>

                    <div>
                        <x-jet-label>
                            Nombre de la categoria
                        </x-jet-label>
        
                        <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1"/>
        
                        <x-jet-input-error for="editForm.name" />
        
                    </div>
        
                    <div>
                        <x-jet-label>
                            Slug
                        </x-jet-label>
        
                        <x-jet-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100"/>
        
                        <x-jet-input-error for="editForm.slug" />
                    </div>

                    <div>
                        <x-jet-label>
                            Url
                        </x-jet-label>
        
                        <x-jet-input wire:model="editForm.url" type="text" class="w-full mt-1"/>
        
                        <x-jet-input-error for="editForm.url" />
                    </div>
        
                    <div>
                        <x-jet-label>
                            Icono
                        </x-jet-label>
        
                        <x-jet-input wire:model.defer="editForm.icon" type="text" class="w-full mt-1"/>
        
                        <x-jet-input-error for="editForm.icon" />
                    </div>
        
                    <div>
                        <x-jet-label>
                            Marcas
                        </x-jet-label>
        
                        <div class="grid grid-cols-4">
        
                            @foreach ($brands as $brand)
                                
                            <x-jet-label>
                                <x-jet-checkbox 
                                wire:model.defer="editForm.brands"
                                name="brands[]"
                                value="{{$brand->id}}"/>
                                {{$brand->name}}
                            </x-jet-label>
        
                            @endforeach
        
                        </div>
                        <x-jet-input-error for="editForm.brands" />
                    </div>
        
                    <div>
                        <x-jet-label>
                            Imagen para la categoria oculta
                        </x-jet-label>
        
                        <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">
        
                        <x-jet-input-error for="editImage" />
                    </div>
                    <div>
                        <x-jet-label>
                            Imagen de la categoria en la pagina principal
                        </x-jet-label>
        
                        <input wire:model="editImageBanner" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">
        
                        <x-jet-input-error for="editImageBanner" />
                    </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                Actualizar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>
</div>
