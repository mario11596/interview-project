<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Email slanje
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
            <form action="{{ route('candidate.email_send_applications', $company->company_id ) }}" method="POST" >
                @csrf
                <div class="mb-4">
                        <x-jet-label for="title" value="Naslov"/>
                        <x-jet-input id="title" class="block mt-1 w-full bg-gray-100" type="text" name="title" required/>
                </div>
                <div class="mb-4">
                        <x-jet-label for="email" value="E-mail adresa primatelja"/>
                        <x-jet-input id="email" class="block mt-1 w-full bg-gray-100" type="text" name="email" value="{{ $company->email_id}}" disabled/>
                </div>

                <div class="mb-4">
                        <x-jet-label for="content" value="Sadržaj"/>
                        <textarea id="content" class="block mt-1 w-full bg-gray-100" type="text" name="content" style="height:150px;" required></textarea>
                </div>

                <div class="flex justify-center">
                        <x-jet-button type="submit" name="submit" value="submit" class="hover:bg-green-new">Pošalji</x-jet-button>
                </div>

            </form>
                <div class="flex justify-center">
                    <a href="{{ route('candidate.index_applications') }}">
                        <x-jet-button class="hover:bg-red-delete"> ODUSTANI</x-jet-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
