<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uređivanje informacija
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="POST" action="{{route('candidate.update_information', $candidate->candidate_id)}}"
                      enctype="multipart/form-data">
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
                        <x-jet-input id="status_type" class="block mt-1 w-full bg-gray-100" type="text"
                                     name="status_type"
                                     value="{{$candidate->status_type}}"
                                     required/>
                    </div>
                    @php($file = public_path().'/files/uploads/'.Auth::user()->email.'.pdf')
                    @if(file_exists($file))
                        <div class="mb-4">
                            <x-jet-label for="file" value="Životopis (.pdf format)"/>
                            <td class="block mt-1 w-full bg-gray-100"><a
                                    href="{{ route('candidate.show_pdf', Auth::user()->email) }}">Moj životopis</a></td>
                        </div>
                    @else
                        <div class="mb-4">
                            <x-jet-label for="file" value="Životopis (.pdf format)"/>
                            <x-jet-input id="file" class="block mt-1 w-full bg-gray-100" type="file" name="file"/>
                        </div>
                    @endif

                    @php($photo = 'files/photos/'.Auth::user()->email.'.JPG')
                    @if(file_exists($photo))
                        <div class="mb-4">
                            <x-jet-label for="photo" value="Profilna fotografija"/>
                            <div class="flex space-x-4">
                            <img src="{{ asset('files/photos/'.Auth::user()->email.'.JPG') }}" width="150"
                                 height="150 "/>
                            <a href="{{ route('candidate.destroy_photo',Auth::user()->email) }}"
                               onclick="return confirm('Jeste li sigurni da želite izbrisati fotografiju?');" class="self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="red"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                            </div>
                        </div>
                    @else
                        <div class="mb-4">
                            <x-jet-label for="photo" value="Profilna fotografija (.jpg format)"/>
                            <x-jet-input id="photo" class="block mt-1 w-full bg-gray-100" type="file" name="photo"/>
                        </div>
                    @endif

                    <div class="flex justify-center">
                        <x-jet-button type="submit" class="hover:bg-green-new mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-check2 mr-1" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            SPREMI
                        </x-jet-button>
                        <a href="{{ route('candidate.index_information') }}">
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
