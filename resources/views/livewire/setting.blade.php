<div class="m-5">
    <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
        {{-- Titre et bouton créer --}}
        <div class="flex items-center justify-between">

            <input type="text" class="block mt-1 border-gray-300 rounded" placeholder="Rechercher" wire:model="search"
                wire:poll>
            <a href="{{ route('setting.create_school_year') }}"
                class="px-4 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Nouvelle année scolaire
            </a>
        </div>

        <div class="flex flex-col">
            {{-- Message aprés opération --}}

            @if (session()->has('success'))
                <div class="p-2 mt-2 text-white bg-green-500 rounded shadow-sm bloc animate-bounce">
                    {{ Session::get('success') }}</div>
            @endif
            <div class="flex flex-wrap justify-center gap-4 p-4">
                @forelse ($schoolYearList as $item)
                    <div class="p-2 sm:w-1/2 md:w-1/3 lg:w-1/4">
                        <div
                            class="w-full h-full min-h-[1px] p-8 bg-white rounded-md shadow-lg cursor-pointer transition duration-500 hover:bg-gray-100 hover:shadow-xl flex flex-col justify-between">
                            <h2 class="px-6 py-4 text-sm font-medium text-gray-900"><span class="text-gray-400">Année
                                    Scolaire: </span>{{ $item->annee_scolaire }}</h2>
                            <h2 class="px-6 py-4 text-sm font-medium text-gray-900"><span class="text-gray-400">Début:
                                </span>{{ $item->debut }}</h2>
                            <h2 class="px-6 py-4 text-sm font-medium text-gray-900"><span class="text-gray-400">Fin:
                                </span>{{ $item->fin }}</h2>
                            <p class="px-6 py-4 text-sm font-medium text-gray-900">
                                <span class="text-gray-400">Statut : </span>
                                <span class="relative inline-block">
                                    <span
                                        class="px-2 py-1 
                                        {{ $item->active == 1 ? 'bg-green-300 text-green-600' : 'bg-red-300 text-red-600' }} 
                                        rounded shadow-sm z-10">
                                        {{ $item->active == 1 ? 'Actif' : 'Inactif' }}
                                    </span>
                                    <span
                                        class="absolute inset-0 bg-opacity-50 
                                        {{ $item->active == 1 ? 'bg-green-300 blur-sm' : 'bg-red-300 blur-sm' }} 
                                        rounded"></span>
                                </span>
                            </p>
                            <p class="flex items-end gap-2 px-6 py-4 text-sm font-medium text-gray-900">
                                <button
                                    class="px-2 py-1 text-white {{ $item->active == 1 ? ' bg-red-500 hidden' : ' bg-green-500' }} rounded"
                                    wire:click="toggleStatus({{ $item->id }})">
                                    {{ $item->active == 1 ? ' Désactivé' : ' Activé' }}
                                </button>

                                <x-heroicon-o-pencil-square
                                    class="text-blue-500 transition duration-500 rounded cursor-pointer hover:p-1 h-7 w-7 hover:bg-blue-600 hover:text-white" />
                                <x-heroicon-o-trash
                                    class="text-red-500 transition duration-500 rounded cursor-pointer hover:p-1 h-7 w-7 hover:bg-red-600 hover:text-white"
                                    wire:click="delete({{$item->id}})"
                                    />

                            </p>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center w-full">
                        <img src="{{ asset('storage/empty.svg') }}" alt="no data" class="w-20 h-20">
                        <div class="text-sm text-gray-500">Aucun élément trouvé</div>
                    </div>
                @endforelse
            </div>

            <div class="mt-2 ">
                {{ $schoolYearList->links() }}
            </div>


        </div>
    </div>
</div>
