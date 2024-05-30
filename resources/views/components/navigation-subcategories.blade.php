@props(['category'])

<div class="">


    <div class="">

        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">

    </div>

    <div>
        <p class="text-lg font-bold text-center text-truegray py-3">
           Subcategorias 
        </p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category) . '?subcategoria=' . $subcategory->slug}}" class="text-truegray inline-block font-semibold py-1 px4 hover:text-rojo-600">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    
</div>