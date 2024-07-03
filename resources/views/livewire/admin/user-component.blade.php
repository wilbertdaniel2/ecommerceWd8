<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Escriba algo para filtrar" />

            </div>

            @if (count($users))

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($users as $user)
                            <tr wire:key="{{ $user->email }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $user->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $user->email }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">

                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="pr-2 hover:text-tahiti-600 cursor-pointer"
                                        wire:click="edit('{{ $user->id }}')">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->


                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($users->hasPages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif
        </x-table-responsive>
    </div>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Usuario
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">
                <div>
                    <x-jet-label>
                        Nombre del usuario
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.name" type="text" class="w-full mt-1 bg-gray-100" />

                    <x-jet-input-error for="editForm.name" />

                </div>
                
                <div>
                    <x-jet-label>
                        Email
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.email" type="text" class="w-full mt-1 bg-gray-100" />

                    <x-jet-input-error for="editForm.email" />
                </div>

                <div>
                    <x-jet-label>
                        Password
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.password" type="text" class="w-full mt-1 bg-gray-100" />

                    <x-jet-input-error for="editForm.password" />
                </div>

                <div>
                    <x-jet-label value="Rol" />
                    <select class="form-control w-full" wire:model="editForm.role">
                        <option value="" selected disabled>Seleccione un rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                
                    <x-jet-input-error for="editForm.role" />
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
