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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 flex flex-wrap justify-start m-3">
                    @forelse($jobs as $job)
                        <div class="flex p-5 space-x-4 items-center shadow-md max-w-sm rounded-md">
                            <img
                                src="https://stemgames.hr/wp-content/uploads/2017/12/riteh.gif"
                                alt="image"
                                class="h-14 w-14 rounded-full"/>
                            <div class="w-full">
                                <h2 class="text-black font-semibold text-xl">{{$job->company->name}}</h2>
                                <p class="mt-1 mb-4 text-gray-400 text-sm">{{$job->position}}</p>
                                <div class="flex justify-end">
                                    <a href="">
                                        <x-jet-button class="mr-3 hover:bg-blue-details">Detalji</x-jet-button>
                                    </a>
                                    <a href="{{ route('company.delete_job', [$job->id]) }}"
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
