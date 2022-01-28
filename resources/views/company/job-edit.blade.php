<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uređivanje oglasa
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="POST" action="{{route('company.update_job', [$job->job_id])}}">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="description" value="Opis"/>
                        <textarea id="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 bg-gray-100 w-full" type="text"
                                     name="description"
                                     required/>{{$job->description}}</textarea>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="position" value="Radno mjesto"/>
                        <x-jet-input id="position" class="block mt-1 w-full bg-gray-100" type="text" name="position"
                                     value="{{$job->position}}"
                                     required/>
                    </div>

                    <div class="mb-4">
                        <x-jet-label for="conditions" value="Uvjeti"/>
                        <textarea id="conditions" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 bg-gray-100 w-full" type="text" name="conditions"
                                     required/>{{$job->conditions}}</textarea>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="type" value="Područje rada"/>
                        <x-jet-input id="type" class="block mt-1 w-full bg-gray-100" type="text" name="type"
                                     value="{{$job->type}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="city" value="Grad"/>
                        <x-jet-input id="city" class="block mt-1 w-full bg-gray-100" type="text" name="city"
                                     value="{{$job->city}}" required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="salary" value="Plaća"/>
                        <x-jet-input id="salary" class="block mt-1 w-full bg-gray-100" type="number"
                                     name="salary" value="{{$job->salary}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="deadline" value="Rok trajanja oglasa"/>
                        <x-jet-input id="deadline" class="block mt-1 w-full bg-gray-100" type="date" name="deadline"
                                     value="{{$job->deadline}}"
                                     required/>
                    </div>
                    <div class="flex justify-center">
                        <x-jet-button type="submit" name="submit" value="submit" class="hover:bg-green-new mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-check2 mr-1" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            SPREMI
                        </x-jet-button>
                        <a href="{{ route('company.index_information') }}">
                            <x-jet-button type="button" class="hover:bg-red-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-x-lg mr-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                                ODUSTANI
                            </x-jet-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
