@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-rojo-600']) }}>{{ $message }}</p>
@enderror
