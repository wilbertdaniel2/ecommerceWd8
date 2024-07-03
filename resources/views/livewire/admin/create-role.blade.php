<div>
    {{-- Agregar rol --}}
    <x-jet-form-section submit="save" class="mb-6">

        <x-slot name="title">
            Agregar un nuevo rol
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo rol
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Rol agregado
            </x-jet-action-message>

            @can('admin.roles.create')
            <x-jet-button>
                Agregar
            </x-jet-button>
            @endcan
            
        </x-slot>
    </x-jet-form-section>

    {{-- Mostrar roles --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de roles
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todos los roles agregados
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
                    @foreach ($roles as $role)
                        <tr>
                            <td class="py-2">

                                <a href="{{route('admin.roles.show', $role)}}" class="uppercase underline hover:text-blue-600">
                                    {{strtoupper($role->name)}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">

                                    @can('admin.roles.edit')
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit({{$role}})">Editar</a>
                                    @endcan
                                    
                                    @can('admin.roles.delete')
                                    <a class="pl-2 hover:text-rojo-600 cursor-pointer" wire:click="$emit('deleteRol', {{$role->id}})">Eliminar</a>
                                    @endcan

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
            Editar rol
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">
               
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.name" />
                </div>

             
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
