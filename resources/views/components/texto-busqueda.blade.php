@props(['value'])

<label {{ $attributes->merge(['class' => 'mt-3 block font-medium text-m text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
