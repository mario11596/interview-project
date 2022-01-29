<x-guest-layout>
    <x-jet-validation-errors class="mb-4"/>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @   @endif
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
                        <h1 class="text-2xl font-semibold self-center">Prijava</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div>
                                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                 :value="old('email')" required autofocus/>
                                </div>
                                <div class="relative">
                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Lozinka') }}"/>
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                                     name="password" required autocomplete="current-password"/>
                                    </div>
                                </div>

                                </br>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                           href="{{ route('password.request') }}">
                                            {{ __('Zaboravili lozinku?') }}
                                        </a>
                                    @endif
                                    <x-jet-button class="ml-4">
                                        <a href="{{ route('register') }}">
                                            {{ __('Registracija') }}
                                        </a>
                                    </x-jet-button>

                                    <x-jet-button class="ml-4">
                                        {{ __('Prijavi se') }}
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
