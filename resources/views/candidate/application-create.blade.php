<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nova prijava
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="post" action="{{route('candidate.store_application', [$id])}}">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="date" value="{{ __('Datum intervjua') }}"/>
                        <x-jet-input id="date" class="block mt-1 w-full bg-gray-100" type="select" name="date"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="time" value="{{ __('Vrijeme intervjua') }}"/>
                        <x-jet-input id="time" class="block mt-1 w-full bg-gray-100" type="select" name="time"
                                     required/>
                    </div>
                    <div class="mb-4 flex justify-center">
                        <x-jet-button type="submit" class="hover:bg-green-new"> SPREMI</x-jet-button>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('candidate.candidate_dashboard') }}">
                            <x-jet-button class="hover:bg-red-delete"> ODUSTANI</x-jet-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
