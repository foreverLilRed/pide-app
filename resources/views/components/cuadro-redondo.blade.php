@props(['service'])
<div {{$attributes->merge(['class'=>'w-min rounded-md text-white bg-gray-800 p-4 text-2xl uppercase tracking-widest m-3 '])}}>
    {{ $service ?? $slot }}
</div>


