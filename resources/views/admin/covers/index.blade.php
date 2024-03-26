<x-admin-layout>

    <x-slot name="header">
        <div class="flex items-center">

            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de publicidades
            </h2>
    
            <x-button-enlace class="ml-auto" href="{{route('admin.covers.create')}}">
                Agregar publicidad
            </x-button-enlace>

        </div>
        
    </x-slot>
    
    

</x-admin-layout>