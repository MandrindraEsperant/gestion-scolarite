<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nouvelle année scolaire') }}
        </h2>
    </x-slot>

    <div class="px-2 py-2">
        <livewire:create-school-year/>
        
    </div>
</x-app-layout> 
