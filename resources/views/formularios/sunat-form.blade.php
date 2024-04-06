<form class="h-min bg-transparent dark:bg-gray-800 rounded-md" method="post" action="{{ route('bsunat') }}">
    @csrf
    @method('post')
    <div class="px-5 py-2">
        <x-texto-busqueda for="ruc" :value="__('RUC')" />
        <x-text-input id="ruc" name="ruc" type="text" class="mt-1 block w-full"/>
        <x-boton-busqueda>{{ __('BUSCAR') }}</x-boton-busqueda>
    </div>
</form>