<script type="text/javascript">
  
    function companyCheck() {
        var x = document.getElementById("is_companyCheck");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                 x.style.display = "none";
            }
    } 

    function candidateCheck() {
        var x = document.getElementById("is_candidateCheck");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                 x.style.display = "none";
            }
    } 

</script>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <input name="is_company" type="checkbox" value = '1' id="is_company" onclick="companyCheck()">
            <label for="is_company">Tvrtka</label>
            <input name="is_candidate" type="checkbox" value = '1' id="is_candidate" onclick="candidateCheck()">
            <label for="is_candidate">Kandidat</label>
        
            {{-- firma pitanja --}}
            <div style="display:none" id="is_companyCheck">
            <div class="mt-4">
                    <label for="addressCompany">Adresa: </label>
                    <input id="addressCompany" class="block mt-1 w-full" type="text" name="addressCompany"/>
                </div>
            
                <div class="mt-4">
                    <label for="cityCompany">Grad: </label>
                    <input id="cityCompany" class="block mt-1 w-full" type="text" name="cityCompany"/>
                </div>

                <div class="mt-4">
                    <label for="number_employees">Broj zaposlenih: </label>
                    <input id="number_employees" class="block mt-1 w-full" type="number" name="number_employees"/>
                </div>

                <div class="mt-4">
                    <label for="type">Vrsta djelatnosti: </label>
                    <input id="type" class="block mt-1 w-full" type="text" name="type"/>
                </div>
            </div>

            {{-- kandidat pitanja --}}
            <div style="display:none" id="is_candidateCheck">
                <div class="mt-4">
                    <label for="surname">Prezime: </label>
                    <input id="surname" class="block mt-1 w-full" type="text" name="surname"/>
                </div>

                <div class="mt-4">
                    <label for="addressCandidate">Adresa: </label>
                    <input id="addressCandidate" class="block mt-1 w-full" type="text" name="addressCandidate"/>
                </div>
            
                <div class="mt-4">
                    <label for="cityCandidate">Grad: </label>
                    <input id="cityCandidate" class="block mt-1 w-full" type="text" name="cityCandidate"/>
                </div>

                <div class="mt-4">
                    <label for="mobile_number">Broj mobitela: </label>
                    <input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number"/>
                </div>

                <div class="mt-4">
                    <label for="OIB">Osobni identifikacijski broj: </label>
                    <input id="OIB" class="block mt-1 w-full" type="text" name="OIB"/>
                </div>

                <div class="mt-4">
                    <label for="status">Trenutni status: </label>
                    <input id="status" class="block mt-1 w-full" type="text" name="status"/>
                </div>
            </div>
           
            

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    
</x-guest-layout>

