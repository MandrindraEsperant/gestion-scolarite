<div class="p-12 bg-white shadow-sm">
    <div class="mx-12 my-5 bg-white shadow-lg">
        <form action="" method="post" wire:submit.prevent="store">
            @csrf
            @method('post')
            @if (session()->has('error'))
                <div class="p-4 bg-red-100 border-red-500 animate-bounce">{{ Session::get('error') }}</div>
            @endif
            <div class="p-5">
                <div class="block mb-5">
                    <label for="niveau">Niveau<span class="text-red-700 font-lgbold text-">*</span> </label>
                    <input type="text" name="niveau" id="niveau"
                        class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                        wire:model='niveau'>

                    @error('niveau')
                        <div class="mt-1 text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="block mb-5">
                    <label for="prix_droit">Frais d'inscription en (Ariary) <span
                            class="text-red-700 font-lgbold text-">*</span></label>
                    <input type="number" name="prix_droit" id="prix_droit" required
                    min="0" 
                        class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                        wire:model='prix_droit'>

                    @error('prix_doit')
                        <div class="mt-1 text-red-500">* Le champs frais d'inscription est requis</div>
                    @enderror
                </div>
                <div class="block mb-5">
                    <label for="prix_ecolage">Prix d'écolage en (Ariary) <span
                            class="text-red-700 font-lgbold text-">*</span></label>
                    <input type="number" name="prix_ecolage" id="prix_ecolage"
                    min="0" minlength="4"
                        class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                        wire:model='prix_ecolage'>

                    @error('prix_ecolage')
                        <div class="mt-1 text-red-500">* Le champs prix d'écolage est requis</div>
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

