<x-app-layout>
    <x-slot name="header">
        <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Company dashboard') }}
        </h2>
        <a href="{{ route('company.create_job')}}">
            <x-jet-button class="mr-3 hover:bg-green-new">+ Stvori novi oglas</x-jet-button>
        </a>
        </div>
    </x-slot>


    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('company.search') }}" method="GET" role="search">
                <input type="text" style="border-radius: 10px;" placeholder="Pretraži..." name="search" required/>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" type="submit">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
            </form>
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 flex flex-wrap justify-start m-3">
                    @forelse($jobs as $job)
                        <div class="flex p-5 space-x-4 items-center shadow-md max-w-sm rounded-md">
                            <img src="{{ asset('files/photos/'.Auth::user()->email.'.JPG') }}"
                                alt="slika"
                                class="h-14 w-14 rounded-full"/>
                            <div class="w-full">
                                <h2 class="text-black font-semibold text-xl">{{$job->company->name}}</h2>
                                <p class="mt-1 mb-4 text-gray-400 text-sm">{{$job->position}}</p>
                                <div class="flex justify-end">
                                    <a href="{{ route('company.job_details', [$job->job_id])}}">
                                        <x-jet-button class="mr-3 hover:bg-blue-details">Detalji</x-jet-button>
                                    </a>
                                    <a href="{{ route('company.delete_job', [$job->job_id]) }}"
                                       onclick="return confirm('Are you sure?')">
                                        <x-jet-button class="mr-3 hover:bg-red-delete">Obriši</x-jet-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>No records found</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
