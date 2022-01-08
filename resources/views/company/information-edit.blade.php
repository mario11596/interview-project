<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uređivanje informacija
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="POST" action="{{route('company.update_information', [$company->company_id])}}">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="name" value="Naziv"/>
                        <x-jet-input id="name" class="block mt-1 w-full bg-gray-100" type="text" name="name"
                                     value="{{$company->name}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="address" value="Adresa"/>
                        <x-jet-input id="address" class="block mt-1 w-full bg-gray-100" type="text" name="address"
                                     value="{{$company->address}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="city" value="Grad"/>
                        <x-jet-input id="city" class="block mt-1 w-full bg-gray-100" type="text" name="city"
                                     value="{{$company->city}}" required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="number_employees" value="Broj zaposlenih"/>
                        <x-jet-input id="number_employees" class="block mt-1 w-full bg-gray-100" type="number"
                                     name="number_employees" value="{{$company->number_employees}}"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="type" value="Područje rada"/>
                        <x-jet-input id="type" class="block mt-1 w-full bg-gray-100" type="text" name="type"
                                     value="{{$company->type}}"
                                     required/>
                    </div>
                    <div class="flex justify-center">
                        <x-jet-button type="submit" name="submit" value="submit" class="hover:bg-green-new">SPREMI</x-jet-button>
                    </div>
                </form>
                <div class="flex justify-center">
                    <a href="{{ route('company.index_information') }}">
                        <x-jet-button class="hover:bg-red-delete"> ODUSTANI</x-jet-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
