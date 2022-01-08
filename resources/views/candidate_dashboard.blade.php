<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
