<div class="m-5">
    <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
        {{-- Titre et bouton créer --}}
        <div class="flex items-center justify-between">

            <input type="text" class="block mt-1 border-gray-300 rounded" placeholder="Rechercher" wire:model="search"
                wire:poll>
            <a href="{{ route('student.create') }}"
                class="px-4 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Ajouter élève
            </a>
        </div>

        <div class="flex flex-col">
            {{-- Message aprés opération --}}

            @if (Session::get('success'))
                <div class="p-2 mt-2 text-white bg-green-500 rounded shadow-sm bloc animate-bounce">
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
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Matricule</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Nom</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Prénoms</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Sexe</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Date de naissance</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Adresse</th>
                                    <th class="px-6 py-4 text-sm font-medium text-gray-900">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $item)
                                    <tr class="border-b-2 border-gray-100">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->matricule }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->nom }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->prenom }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->sexe=='M' ?"Masculin": "Féminin" }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->date_naissance }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->adresse }}</td>
                                        <td class="flex justify-center gap-2 px-6 py-4 text-sm font-medium text-gray-900">
                                            <a href="{{route('student.edit',$item->id)}}">
                                                <x-heroicon-o-pencil-square
                                                class="text-blue-500 transition duration-500 rounded cursor-pointer hover:p-1 h-7 w-7 hover:bg-blue-600 hover:text-white" />
                                            </a>
                                            <a href="">
                                                <x-heroicon-o-trash
                                                class="text-red-500 transition duration-500 rounded cursor-pointer hover:p-1 h-7 w-7 hover:bg-red-600 hover:text-white"
                                                wire:click="delete({{ $item->id }})" />
                                            </a>                                            
                                        </td>  
                                      
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
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
                {{ $students->links() }}
            </div>


        </div>
    </div>
</div>
