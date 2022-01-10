<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Novi oglas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="post" action="{{route('company.store_job')}}">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="position" value="{{ __('Radno mjesto') }}"/>
                        <x-jet-input id="position" class="block mt-1 w-full bg-gray-100" type="text" name="position"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="description" value="{{ __('Opis posla') }}"/>
                        <textarea id="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 bg-gray-100 w-full"
                                  name="description" required></textarea>
                    </div>
                    <div class="flex">
                        <div class="mb-4 w-1/2">
                            <x-jet-label for="type" value="{{ __('Područje rada') }}"/>
                            <x-jet-input id="type" class="block mt-1 bg-gray-100" type="text" name="type"
                                         required/>
                        </div>
                        <div class="mb-4 w-1/2">
                            <x-jet-label for="city" value="{{ __('Grad') }}"/>
                            <x-jet-input id="city" class="block mt-1 bg-gray-100" type="text" name="city"
                                         required/>
                        </div>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="conditions" value="{{ __('Uvjeti') }}"/>
                        <textarea id="conditions" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 bg-gray-100 w-full"
                                     name="conditions" required></textarea>
                    </div>
                    <div class="flex">
                        <div class="mb-4 w-1/2">
                            <x-jet-label for="salary" value="{{ __('Plaća') }}"/>
                            <x-jet-input id="salary" class="block mt-1 placeholder-gray-400 bg-gray-100"
                                         type="number"
                                         name="salary" placeholder="kn"
                                         required/>
                        </div>
                        <div class="mb-4 w-1/2">
                            <x-jet-label for="deadline" value="{{ __('Rok trajanja oglasa') }}"/>
                            <x-jet-input id="deadline" class="block mt-1 bg-gray-100" type="date" name="deadline"
                                         required/>
                        </div>
                    </div>
                    <div class="mb-4 flex justify-center">
                        <x-jet-button type="submit" class="hover:bg-green-new"> SPREMI</x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
