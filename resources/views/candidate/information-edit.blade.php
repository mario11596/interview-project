<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uređivanje informacija
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="POST" action="{{route('candidate.update_information', $candidate->candidate_id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="name" value="Ime"/>
                        <x-jet-input id="name" class="block mt-1 w-full bg-gray-100" type="text" name="name"
                                     value="{{$candidate->name}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="surname" value="Prezime"/>
                        <x-jet-input id="surname" class="block mt-1 w-full bg-gray-100" type="text" name="surname"
                                     value="{{$candidate->surname}}" required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="OIB" value="OIB"/>
                        <x-jet-input id="OIB" class="block mt-1 w-full bg-gray-100" type="text" name="OIB"
                                     value="{{$candidate->OIB}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="city" value="Grad"/>
                        <x-jet-input id="city" class="block mt-1 w-full bg-gray-100" type="text"
                                     name="city" value="{{$candidate->city}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="address" value="Adresa"/>
                        <x-jet-input id="address" class="block mt-1 w-full bg-gray-100" type="text" name="address"
                                     value="{{$candidate->address}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="mobile_number" value="Broj mobitela"/>
                        <x-jet-input id="mobile_number" class="block mt-1 w-full bg-gray-100" type="text"
                                     name="mobile_number"
                                     value="{{$candidate->mobile_number}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="status_type" value="Trenutni status"/>
                        <x-jet-input id="status_type" class="block mt-1 w-full bg-gray-100" type="text" name="status_type"
                                     value="{{$candidate->status_type}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="file" value="Životopis (.pdf format)"/>
                        <x-jet-input id="file" class="block mt-1 w-full bg-gray-100" type="file" name="file" />
                    </div>

                    <div class="flex justify-center">
                        <x-jet-button type="submit" class="hover:bg-green-new"> SPREMI</x-jet-button>
                    </div>
                </form>
                <div class="flex justify-center">
                    <a href="{{ route('candidate.index_information') }}">
                        <x-jet-button class="hover:bg-red-delete"> ODUSTANI</x-jet-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
