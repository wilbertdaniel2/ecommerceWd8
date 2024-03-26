<x-admin-layout>
    <div class="container py-12">

        <form action="{{ route('admin.covers.store') }}" 
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <figure class="relative mb-4">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center px-4 py-2 rounded-lg bg-gray-400 cursor-pointer">
                        <i class="fas fa-camera mr-2"></i>
                        Actualizar imagen

                        <input type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>
                <img src="{{ asset('img/noImage.png') }}" class="aspect-[3/1] w-full object-cover object-center border border-gray-300 rounded-lg"
                    id="imgPreview">
            </figure>

            <div class="mb-4">
                <x-jet-label>
                    Titulo
                </x-jet-label>

                <x-jet-input type="text" class="w-full" name="title" placeholder="Ingrese el titulo de la publicidad" />
                
            </div>

            <div class="mb-4">
                <x-jet-label>
                    Fecha de inicio
                </x-jet-label>

                <x-jet-input name="start_at" type="date" class="w-full" value="{{old('start_at', now()->format('Y-m-d'))}}" />
                {{-- <x-jet-input-error for="start_at" /> --}}
            </div>

            <div class="mb-4">
                <x-jet-label>
                    Fecha fin (opcional)
                </x-jet-label>

                <x-jet-input name="end_at" type="date" class="w-full" value="{{old('end_at')}}" />
                {{-- <x-jet-input-error for="start_at" /> --}}
            </div>

            <div class="mb-4 flex space-x-2">

                <label>
                    <x-jet-input type="radio" name="is_active" value="1" 
                    checked
                    />
                    Activo
                </label>

                <label>
                    <x-jet-input type="radio" name="is_active" value="0"/>
                    Inactivo
                </label>

            </div>

            <div class="flex justify-end">
                <x-jet-button>
                    Crear publicidad
                </x-jet-button>
            </div>

        </form>

        
            <script>
                function previewImage(event, querySelector) {

                    //Recuperamos el input que desencadeno la acción
                    const input = event.target;

                    //Recuperamos la etiqueta img donde cargaremos la imagen
                    $imgPreview = document.querySelector(querySelector);

                    // Verificamos si existe una imagen seleccionada
                    if (!input.files.length) return

                    //Recuperamos el archivo subido
                    file = input.files[0];

                    //Creamos la url
                    objectURL = URL.createObjectURL(file);

                    //Modificamos el atributo src de la etiqueta img
                    $imgPreview.src = objectURL;

                }
            </script>
        
    </div>
    
</x-admin-layout>
