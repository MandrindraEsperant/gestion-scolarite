<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Modification d\'un niveau') }}
        </h2>
    </x-slot>

    <div class="px-2 py-2">
        <livewire:edit-level :level="$level"/>
    </div>
</x-app-layout> 
