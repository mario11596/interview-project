<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Oglasi') }}
        </h2>
    </x-slot>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('alert')
            <form action="{{ route('candidate.search') }}" method="GET" role="search" class="flex items-end">
                <div class="w-10/12 items-center flex">
                    <input type="text" style="border-radius: 10px;" class="focus:border-blue" placeholder="Pretraži..." name="search"/>
                    <x-jet-button type="submit" class="hover:bg-blue-details ml-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16" type="submit">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </x-jet-button>
                </div>

                <select name="count" id="count" style="border-radius: 10px;" class="block mr-2 w-40 bg-gray-100">
                    <option value="9" disabled selected>Broj oglasa po stranici</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                </select>
                <select name="sortby" id="sortby" style="border-radius: 10px;" class="block mr-2 w-40 bg-gray-100">
                    <option value="" disabled selected>Sortiranje po</option>
                    <option value="position">Poziciji</option>
                    <option value="created_at">Datumu</option>
                    <option value="salary">Plaći</option>
                </select>
                <select name="sortdir" id="sortdir" style="border-radius: 10px;" class="block mr-2 w-40 bg-gray-100">
                    <option value="asc" selected>Uzlazno</option>
                    <option value="desc">Silazno</option>
                </select>

                <a href="{{ route('candidate.candidate_dashboard')}}">
                    <x-jet-button type="submit" class="mr-1 h-10 hover:bg-blue-details">Sortiraj</x-jet-button>
                </a>
            </form>

            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 flex flex-wrap justify-start m-3">
                    @forelse($jobs as $job)
                        <div class="flex p-5 space-x-4 items-center shadow-md max-w-sm rounded-md"
                             style="background-color: #f2f2f2;">
                            <img src="{{ asset('files/photos/'.$job->company->email_id.'.JPG') }}"
                                 alt="slika"
                                 class="h-24 w-24 rounded-full"/>
                            <div class="w-full">
                                <h2 class="text-black font-semibold text-xl">{{$job->position}}</h2>
                                <p class="mt-2 text-gray-800 text-sm">{{$job->company->name}} </p>
                                <p class="mt-1 mb-4 text-gray-900 text-sm">Prijave su moguće do {{date('d.m.Y', strtotime($job->deadline))}}</p>
                                <div class="flex justify-end">
                                    <a href="{{ route('candidate.job_details', [$job->job_id])}}">
                                        <x-jet-button class=" hover:bg-blue-details">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-justify-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                            Detalji
                                        </x-jet-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>Trenutno nema otvorenih oglasa.</div>
                    @endforelse
                </div>
                <div class="items-center">
                    {{isset($search)? $jobs->appends(['search'=> $search])->links() : $jobs->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
