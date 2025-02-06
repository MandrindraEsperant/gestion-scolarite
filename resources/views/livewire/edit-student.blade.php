<div class="p-12 bg-white shadow-sm">
    <div class="px-6 py-2 mx-6 my-2 bg-white shadow-lg">
        <form action="" method="post" wire:submit.prevent="store">
            @csrf
            @method('post')
            @if (session()->has('error'))
                <div class="p-4 bg-red-100 border-red-500 animate-bounce">{{ Session::get('error') }}</div>
            @endif
            <div class="flex justify-center w-full gap-10 p-2">
                <div class="w-full">
                    <div class="block mb-5">
                        <label for="matricule">Matricule<span class="text-red-700 font-lg-bold text-">*</span> </label>
                        <input type="text" name="matricule" id="matricule" minlength="2" maxlength="10" required
                            class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                            wire:model='matricule'>

                        @error('matricule')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="block mb-5">
                        <label for="nom">Nom <span class="text-red-700 font-lgbold text-">*</span></label>
                        <input type="text" name="nom" id="nom" required
                            class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                            wire:model='nom'>

                        @error('nom')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="block mb-5">
                        <label for="prenom">Prénom(s) </label>
                        <input type="text" name="prenom" id="prenom"
                            class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                            wire:model='prenom'>

                        @error('prenom')
                            <div class="mt-1 text-red-500"> Le champs prénom(s) doit être une chaine de caractére</div>
                        @enderror
                    </div>
                </div>
                <hr />
                <div class="w-full ">
                    <div class="flex justify-center w-full gap-5">
                        <div class="block w-full mb-5">
                            <label for="sex">Sexe<span class="text-red-700 font-lgbold text-">*</span></label>
                            <select name="sexe" id="sexe" required
                                class="block w-full mt-1 border-gray-300 rounded text-gray-500 text-md @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                                wire:model='sexe' id="sexe">
                                <option>choisir un sexe</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>


                            @error('sexe')
                                <div class="mt-1 text-red-500">* Le champs Sexe est requis</div>
                            @enderror
                        </div>
                        <div class="block w-full mb-5">
                            <label for="date_naissance">Date de naissance <span
                                    class="text-red-700 font-lgbold text-">*</span></label>
                            <input type="date" name="date_naissance" id="date_naissance" required
                                class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                                wire:model='date_naissance'>

                            @error('date_naissance')
                                <div class="mt-1 text-red-500">* Le champs date de naissance est requis</div>
                            @enderror
                        </div>
                    </div>

                    <div class="block mb-5">
                        <label for="adresse">Adresse<span class="text-red-700 font-lgbold text-">*</span></label>
                        <input type="text" name="adresse" id="adresse" required
                            class="block w-full mt-1 border-gray-300 rounded @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror"
                            wire:model='adresse'>

                        @error('adresse')
                            <div class="mt-1 text-red-500">* Le champs adresse est requis</div>
                        @enderror
                    </div>
                    <div class="flex justify-between p-5 item-center">
                        <button type="submit"
                            class="px-4 py-1 text-white bg-blue-600 rounded-md hover:bg-blue-500">Valider</button>
                        <button type="reset"
                            class="px-4 py-1 text-white bg-red-600 rounded-md hover:bg-red-700">Effacer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
