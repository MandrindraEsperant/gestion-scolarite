<div class="p-12 bg-white shadow-sm">
    <div class="mx-12 my-5 bg-white shadow-lg">
        <form action="" method="post" wire:submit.prevent="update">
            @csrf
            @method('post')
            @if (Session::get('error'))
                <div class="p-4 bg-red-100 border-red-500 animate-bounce">{{ Session::get('error') }}</div>
            @endif
            <div class="p-5">
                <div class="block mb-5">
                    <select name="" id="" class="block w-full mt-1 border-gray-300 rounded" wire:model="level_id">
                        <option value="">Selectionné un niveau</option>
                        @foreach ($currentLevels as $item)
                        <option value="{{$item->id}}">{{$item->libelle }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="block mb-5">
                    <label for="libelle">Libelle de la classe <span
                            class="text-red-700 font-lgbold text-">*</span></label>
                    <input type="text" name="libelle" id="libelle"
                        class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                        wire:model='libelle'>

                    @error('libelle')
                        <div class="mt-1 text-red-500">* Le champs libelle est requis</div>
                    @enderror
                </div>

            </div>
            <div class="flex justify-between p-5 item-center">
                <button type="submit"
                    class="px-4 py-1 text-white bg-blue-600 rounded-md hover:bg-blue-500">Valider</button>
                <button type="reset"
                    class="px-4 py-1 text-white bg-red-600 rounded-md hover:bg-red-700">Annuler</button>
            </div>

        </form>
    </div>
</div>
