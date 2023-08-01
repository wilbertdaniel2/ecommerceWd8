<div class="container py-12">

    {{-- Formulario crear --}}
    <x-jet-form-section submit="save" class="mb-6">

        <x-slot name="title">
            Agregar nuevo color
        </x-slot>

        <x-slot name="description">
            En esta sección podra agregar un nuevo color
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label> 
                    Nombre
                </x-jet-label>

                <x-jet-input type="text" wire:model="createForm.name" class="w-full"/>
                <x-jet-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>

        </x-slot>

    </x-jet-form-section>

    {{-- Lista de colores --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de colores
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas los colores agregados
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        {{-- <th class="py-2">Acción</th> --}}
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($colors as $color)
                        <tr>
                            <td class="py-2">

                                <a class="uppercase">
                                    {{$color->name}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    {{-- <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$color->id}}')">Editar</a> --}}
                                    {{-- <a class="pl-2 hover:text-rojo-600 cursor-pointer" wire:click="$emit('deleteColor', '{{$color->id}}')">Eliminar</a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar color
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                Nombre
            </x-jet-label>
            
            <x-jet-input wire:model="editForm.name" type="text" class="w-full" />
            <x-jet-input-error for="editForm.name" /> 
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteColor', colorId => {
            
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-component', 'delete', colorId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
</div>
