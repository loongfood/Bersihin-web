@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#10241C]']) }}>
    {{ $value ?? $slot }}
</label>
