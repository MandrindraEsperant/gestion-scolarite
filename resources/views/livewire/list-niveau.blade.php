<div class="m-5">
    <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
        {{-- Titre et bouton créer --}}
        <div class="flex items-center justify-between">

            <input type="text" class="block mt-1 border-gray-300 rounded" placeholder="Rechercher" wire:model="search"
                wire:poll>
            <a href="{{ route('niveau.create_level') }}"
                class="px-4 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Ajouter niveau
            </a>
        </div>

        <div class="flex flex-col">
            {{-- Message aprés opération --}}

            @if (Session::get('success'))
                <div lass="p-2 mt-2 text-white bg-green-500 rounded shadow-sm bloc animate-bounce">
                    {{ Session::get('success') }}
                </div>
            @endif

            {{-- Style de tableau --}}
            <div class="overflow-x-auto ">
                <div class="inline-block min-w-full py-4">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Id</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Code</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Libelle</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Montant scolaire</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($levels as $item)
                                    <tr class="border-b-2 border-gray-100">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->id }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->code }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->libelle }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->scolarite }}
                                            ariary</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            <a href="{{ route('niveau.edit_level', $item->id) }}"
                                                class="px-2 py-1 text-sm text-gray-200 bg-blue-500 rounded">Modifier</a>
                                            <span class="px-2 py-1 text-sm text-gray-200 bg-red-500 rounded" wire:click="delete({{$item->id}})">Supprimer</span>
                                            <a href="{{ route('classe', $item->libelle) }}"
                                                class="px-2 py-1 text-sm text-gray-200 bg-green-500 rounded">Voir classe</a>
                                               
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="flex justify-center itemes-center">
                                                <img src="{{ asset('storage/empty.svg') }}" alt="no data"
                                                    class="w-20 h-20 ">
                                            </div>
                                            <div class="text-sm text-gray-500">Aucune élement trouvé</div>
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="mt-2 ">
                {{ $levels->links() }}
            </div>


        </div>
    </div>
</div>
