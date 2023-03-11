<div>
    <div>
        <p class="text-xl text-truegray">
            Capacidad:
        </p>
        <select class="form-control w-full">
            <option value="" selected disabled>Selecciona la capacidad</option>
            @foreach ($capacities as $capacity)
                <option value="{{$capacity->id}}">{{$capacity->name}}</option>
            @endforeach
        </select>
    </div>
</div>
