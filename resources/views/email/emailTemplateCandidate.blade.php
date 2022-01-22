<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Email slanje
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form action="{{ route('candidate.email_send_applications', $company->company_id ) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-jet-label for="title" value="Naslov"/>
                        <x-jet-input id="title" class="block mt-1 w-full bg-gray-100" type="text" name="title"
                                     required/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="email" value="E-mail adresa primatelja"/>
                        <x-jet-input id="email" class="block mt-1 w-full bg-gray-100" type="text" name="email"
                                     value="{{ $company->email_id}}" disabled/>
                    </div>

                    <div class="mb-4">
                        <x-jet-label for="content" value="Sadržaj"/>
                        <textarea id="content" class="block mt-1 w-full bg-gray-100" type="text" name="content"
                                  style="height:150px;" required></textarea>
                    </div>

                    <div class="flex justify-center">
                        <x-jet-button type="submit" name="submit" value="submit" class="hover:bg-green-new mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-send-fill mr-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
                            </svg>
                            POŠALJI
                        </x-jet-button>

                        <a href="{{ route('candidate.index_applications') }}">
                            <x-jet-button type="button" class="hover:bg-red-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-x-lg mr-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd"
                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
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
