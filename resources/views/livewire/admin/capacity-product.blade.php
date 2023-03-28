<div>

    <div class="bg-white shadow-lg rounded-lg p-6 mt-12">

        <div>
            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input wire:model="name" type="text" placeholder="Ingrese una capacidad" class="w-full" />

            <x-jet-input-error for="name" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-button wire:click="save"
                          wire:loading.attr="disabled"
                          wire:target="save">
                          
                Agregar
            </x-jet-button>
        </div>

    </div>

    <ul class="mt-12 space-y-4">
        @foreach ($capacities as $capacity)
        <li class="bg-white shadow-lg rounded-lg p-6" wire:key="capacity-{{ $capacity->id }}">
                <div class="flex items-center">
                    <span class="text-xl font-medium">{{$capacity->name}}</span>

                    <div class="ml-auto">
                        <x-jet-button 
                        wire:click="edit({{$capacity}})"
                        wire:loading.attr="disabled" 
                        wire:target="edit({{$capacity}})">
                            <i class="fas fa-edit"></i>
                        </x-jet-button>

                        <x-jet-danger-button>
                            <i class="fas fa-trash"></i>
                        </x-jet-danger-button>
                        
                    </div>
                </div>
            </li>
        @endforeach
    </ul>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar capacidad
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                Capacidad
            </x-jet-label>

            <x-jet-input wire:model="name_edit" type="text" class="w-full"/>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
