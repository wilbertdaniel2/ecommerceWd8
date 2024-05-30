<div class="container py-12">

    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva publicidad
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre de la publicidad
                </x-jet-label>

                <x-jet-input wire:model="createForm.title" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.title" />

            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="start_at">
                    Fecha de inicio
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.start_at" type="date" id="start_at" class="w-full mt-1" />

                <x-jet-input-error for="createForm.start_at" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="end_at">
                    Fecha final
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.end_at" type="date" id="end_at" class="w-full mt-1" />

                <x-jet-input-error for="createForm.end_at" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="mr-6">
                    <input wire:model.defer="createForm.is_active" type="radio" name="is_active" value="0">
                    Marcar publicidad como inactiva
                </label>
                <label>
                    <input wire:model.defer="createForm.is_active" type="radio" name="is_active" value="1">
                    Marcar publicidad como activa
                </label>

                @if (session('error'))
                    <div class="bg-rojo-400 text-gray-800 p-2 mb-4">
                        {{ session('error') }}
                    </div>
                @endif

            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image_path" accept="image/*" type="file" class="mt-1" name=""
                    id="{{ $rand }}">

                <div class="mt-5">
                    <p>
                        La imagen seleccionada para la publicidad debe tener las siguientes medidas, ancho: 1903 x alto:
                        564
                    </p>
                </div>

                @if (isset($createForm['image_path']))
                    <div class="mt-2">
                        <img src="{{ $createForm['image_path']->temporaryUrl() }}" alt="Imagen Temporal"
                            class="max-w-full h-auto">
                    </div>
                @endif

                <x-jet-input-error for="createForm.image_path" />
            </div>

            
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Publicidad creada
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>


    <x-jet-action-section>
        <x-slot name="title">
            Lista de publicidades
        </x-slot>

        <x-slot name="description">
            Aqui encontrará todas las publicidades agregadas
        </x-slot>

        <x-slot name="content">
            <div class="container py-12">

                <x-table-responsive>

                    @if ($covers->count())

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Titulo
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Publicidad
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Fecha inicio
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Fecha fin
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Estado
                                    </th>
                                    <th class="py-2">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($covers as $cover)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $cover->title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <img class="h-48 w-full md:w-56 object-cover object-center"
                                                src="{{ Storage::url($cover->image_path) }}" alt="">
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $cover->start_at }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $cover->end_at }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">

                                            @switch($cover->is_active)
                                                @case(0)
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-rojo-800 bg-rojo-100 rounded-full">
                                                        Inactivo
                                                    </span>
                                                @break

                                                @case(1)
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                        Activo
                                                    </span>
                                                @break

                                                @default
                                            @endswitch

                                        </td>
                                        <td class="py-2">
                                            <div class="flex divide-x divide-gray-300 font-semibold">
                                                <a class="pr-2 hover:text-tahiti-600 cursor-pointer"
                                                    wire:click="edit('{{ $cover->id }}')">Editar</a>
                                                <a class="pl-2 hover:text-rojo-600 cursor-pointer"
                                                    wire:click="$emit('deleteCover', '{{ $cover->id }}')">Eliminar</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            No hay registro de publicidades.
                        </div>

                    @endif

                </x-table-responsive>
            </div>

        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar publicidad
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">

                <div>
                    @if ($editImage)
                        <img class="w-full h-64 object-cover object-center" src="{{ $editImage->temporaryUrl() }}"
                            alt="">
                    @elseif($editForm['image_path'])
                        <img class="w-full h-64 object-cover object-center"
                            src="{{ Storage::url($editForm['image_path']) }}" alt="">
                    @endif
                </div>

                <div>
                    <x-jet-label>
                        Nombre de la publicidad
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.title" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.title" />

                </div>

                <div>
                    <x-jet-label>
                        Fecha de inicio
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.start_at" type="date" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.start_at" />

                </div>

                <div>
                    <x-jet-label>
                        Fecha final
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.end_at" type="date" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.end_at" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label class="mr-6">
                        <input wire:model.defer="editForm.is_active" type="radio" name="is_active" value="0">
                        Marcar publicidad como inactiva
                    </label>
                    <label>
                        <input wire:model.defer="editForm.is_active" type="radio" name="is_active" value="1">
                        Marcar publicidad como activa
                    </label>
                </div>

                @if (session('error'))
                    <div class="bg-rojo-400 text-gray-800 p-2 mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- <div>
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
                    </div> --}}

                <div>
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                        id="{{ $rand }}">

                    <x-jet-input-error for="editImage" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                Actualizar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteCover', coverId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.create-cover', 'delete',
                            coverId); // Emitir evento al componente correcto
                        Swal.fire(
                            'Borrado!',
                            'Tu archivo ha sido borrado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
