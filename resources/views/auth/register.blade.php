<script type="text/javascript">

    function radioChecked() {
        const company = document.getElementById("is_company");
        const inputs_company = document.getElementById("companyInputs");
        const inputs_candidate = document.getElementById("candidateInputs");

        if (company.checked === true) {
            inputs_company.style.display = "block";
            inputs_candidate.style.display = "none";
        } else {
            inputs_candidate.style.display = "block";
            inputs_company.style.display = "none";
        }
    }

</script>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                             autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <span class="text-gray-700">Account Type</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" value='candidate' id="is_candidate"
                               onchange="radioChecked()">
                        <span class="ml-2">Personal</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" value='company' id="is_company"
                               onchange="radioChecked()">
                        <span class="ml-2">Business</span>
                    </label>
                </div>
            </div>

            {{-- firma pitanja --}}
            <div style="display:none" id="companyInputs">
                <div class="mt-4">
                    <x-jet-label for="addressCompany">Adresa:</x-jet-label>
                    <x-jet-input id="addressCompany" class="block mt-1 w-full" type="text" name="addressCompany"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="cityCompany">Grad:</x-jet-label>
                    <x-jet-input id="cityCompany" class="block mt-1 w-full" type="text" name="cityCompany"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="number_employees">Broj zaposlenih:</x-jet-label>
                    <x-jet-input id="number_employees" class="block mt-1 w-full" type="number" name="number_employees"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="type">Vrsta djelatnosti:</x-jet-label>
                    <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type"/>
                </div>
            </div>

            {{-- kandidat pitanja --}}
            <div style="display:none" id="candidateInputs">
                <div class="mt-4">
                    <x-jet-label for="surname">Prezime:</x-jet-label>
                    <x-jet-input id="surname" class="block mt-1 w-full" type="text" name="surname"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="addressCandidate">Adresa:</x-jet-label>
                    <x-jet-input id="addressCandidate" class="block mt-1 w-full" type="text" name="addressCandidate"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="cityCandidate">Grad:</x-jet-label>
                    <x-jet-input id="cityCandidate" class="block mt-1 w-full" type="text" name="cityCandidate"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="mobile_number">Broj mobitela:</x-jet-label>
                    <x-jet-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="OIB">Osobni identifikacijski broj:</x-jet-label>
                    <x-jet-input id="OIB" class="block mt-1 w-full" type="text" name="OIB"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="status_type">Trenutni status:</x-jet-label>
                    <x-jet-input id="status_type" class="block mt-1 w-full" type="text" name="status_type"/>
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

