<div class="p-1 bg-white shadow-sm">
    <div class="mx-12 my-5 bg-white shadow-lg">
        <form action="" method="post" wire:submit.prevent="store">
            @csrf
            @method('post')
            
            @if (session()->has('error'))
                <div class="p-4 bg-red-100 border-red-500 animate-bounce">{{ Session::get('error') }}</div>
            @endif
            
            <div class="p-5">
                <label for="annee_scolaire">Année scolaire<span
                        class="text-red-700 font-lgbold text-">*</span></label>
                <input type="text" name="annee_scolaire" id="annee_scolaire" maxlength="9" minlength="9"
                    class="block w-full mt-1 border-gray-300 rounded @error('annee_scolaire') border-red-500 bg-red-100 animate-bounce @enderror"
                    wire:model='annee_scolaire'>

                @error('annee_scolaire')
                    <div class="mt-1 text-red-500">*  {{ $message }}</div>
                @enderror
            </div>
            <div class="p-5">
                <label for="debut">Début <span
                        class="text-red-700 font-lgbold text-">*</span></label>
                <input type="date" name="debut" id="debut"
                    class="block w-full mt-1 border-gray-300 rounded @error('debut') border-red-500 bg-red-100 animate-bounce @enderror"
                    wire:model='debut'>

                @error('debut')
                    <div class="mt-1 text-red-500">* Le champs est requis</div>
                @enderror
                
            </div>
            <div class="p-5">
                <label for="fin">Fin <span
                        class="text-red-700 font-lgbold text-">*</span></label>
                <input type="date" name="fin" id="fin"
                    class="block w-full mt-1 border-gray-300 rounded @error('fin') border-red-500 bg-red-100 animate-bounce @enderror"
                    wire:model='fin'>

                @error('fin')
                    <div class="mt-1 text-red-500">* {{$message}}</div>
                @enderror
            </div>
            <div class="flex justify-between p-5 item-center">
                <button type="submit"
                    class="px-4 py-1 text-white bg-blue-600 rounded-md hover:bg-blue-500">Ajouter</button>
                <button type="reset"
                    class="px-4 py-1 text-white bg-red-600 rounded-md hover:bg-red-700">Annuler</button>
            </div>

        </form>
    </div>
</div>
