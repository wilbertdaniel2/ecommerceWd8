<div class="container py-12">
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva publicidad
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-12 sm:col-span-4">
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
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>
            
                <input wire:model="createForm.image_path" accept="image/*" type="file" class="mt-1" name="" id="{{ $rand }}">
            
                @if(isset($createForm['image_path']))
                    <img src="{{ $createForm['image_path']->temporaryUrl() }}" alt="Imagen Temporal">
                @endif
            
                <x-jet-input-error for="createForm.image_path" />
            </div>
        </x-slot>



        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Categoria creada!
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
