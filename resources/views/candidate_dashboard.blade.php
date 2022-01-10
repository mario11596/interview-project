<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate dashboard') }}
        </h2>
    </x-slot>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('candidate.search') }}" method="GET" role="search">
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
                            <img
                                src="https://stemgames.hr/wp-content/uploads/2017/12/riteh.gif"
                                alt="image"
                                class="h-20 w-20 rounded-full"/>
                            <div class="w-full">
                                <h2 class="text-black font-semibold text-xl">{{$job->company->name}}</h2>

                                <p class="mt-1 mb-4 text-gray-800 text-sm">Radno mjesto: {{$job->position}}</p>
                                <div class="flex justify-end">
                                    <a href="{{ route('candidate.job_details', [$job->job_id])}}">
                                        <x-jet-button class="mr-3 hover:bg-blue-details">Detalji</x-jet-button>
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
