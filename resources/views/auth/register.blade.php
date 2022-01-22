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
    <x-jet-validation-errors class="mb-4"/>

<!-- component -->
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-100 to-blue-900 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div class="text-center flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#1a2747"
                             class="bi bi-briefcase mr-3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <h1 class="text-2xl font-semibold self-center">Register</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 w-80">
                                <div>
                                    <x-jet-label for="name" value="{{ __('Ime') }}"/>
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                 :value="old('name')" required
                                                 autofocus autocomplete="name"/>
                                </div>
                                <div class="relative">
                                    <div class="mt-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                     :value="old('email')"
                                                     required/>
                                    </div>
                                </div>
                                <div class="relative">
                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Lozinka') }}"/>
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                                     name="password"
                                                     required
                                                     autocomplete="new-password"/>
                                    </div>
                                </div>
                                <div class="relative">
                                    <div class="mt-4">
                                        <x-jet-label for="password_confirmation" value="{{ __('Potvrda lozinke') }}"/>
                                        <x-jet-input id="password_confirmation" class="block mt-1 w-full"
                                                     type="password"
                                                     name="password_confirmation" required autocomplete="new-password"/>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <span class="text-gray-700">Vrsta korisničkog računa</span>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio" name="accountType" value='candidate'
                                                   id="is_candidate"
                                                   onchange="radioChecked()">
                                            <span class="ml-2">Privatni</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio" name="accountType" value='company'
                                                   id="is_company"
                                                   onchange="radioChecked()">
                                            <span class="ml-2">Poslovni</span>
                                        </label>
                                    </div>
                                </div>

                                {{--firma pitanja--}}

                                <div style="display:none" id="companyInputs">
                                    <div class="mt-4">
                                        <x-jet-label for="addressCompany">Adresa:</x-jet-label>
                                        <x-jet-input id="addressCompany" class="block mt-1 w-full" type="text"
                                                     name="addressCompany"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="cityCompany">Grad:</x-jet-label>
                                        <x-jet-input id="cityCompany" class="block mt-1 w-full" type="text"
                                                     name="cityCompany"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="number_employees">Broj zaposlenih:</x-jet-label>
                                        <x-jet-input id="number_employees" class="block mt-1 w-full" type="number"
                                                     name="number_employees"/>
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
                                        <x-jet-input id="addressCandidate" class="block mt-1 w-full" type="text"
                                                     name="addressCandidate"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="cityCandidate">Grad:</x-jet-label>
                                        <x-jet-input id="cityCandidate" class="block mt-1 w-full" type="text"
                                                     name="cityCandidate"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="mobile_number">Broj mobitela:</x-jet-label>
                                        <x-jet-input id="mobile_number" class="block mt-1 w-full" type="text"
                                                     name="mobile_number"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="OIB">Osobni identifikacijski broj:</x-jet-label>
                                        <x-jet-input id="OIB" class="block mt-1 w-full" type="text" name="OIB"/>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="status_type">Trenutni status:</x-jet-label>
                                        <x-jet-input id="status_type" class="block mt-1 w-full" type="text"
                                                     name="status_type"/>
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
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                       href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <x-jet-button class="ml-4">
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

