<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Detalji o oglasu') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                <div class="m-3">
                    <div class="flex">
                        <div class="mr-4 h-28 w-28">
                            <img src="{{ asset('files/photos/'.$job->company->email_id.'.JPG') }}" class="rounded-full"/>
                        </div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl"> {{$job->description}} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-5 animate-pulse"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-300">
                                <tr>
                                    <td class="w-1/4 p-2">Pozicija:</td>
                                    <td>{{$job->position}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Tip:</td>
                                    <td>{{$job->type}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Grad:</td>
                                    <td>{{$job->city}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Plaća:</td>
                                    <td>{{$job->salary}} HRK</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Rok:</td>
                                    <td>{{date('d.m.Y.', strtotime($job->deadline))}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Uvjeti:</td>
                                    <td>{{$job->conditions}}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    @if(!$application)
                        <div class="mt-4 flex items-center justify-end">
                            <div class="w-auto h-5">
                                <a href="{{ route('candidate.create_application', [$job->job_id])}}">
                                    <x-jet-button class="hover:bg-blue-details w-auto"> PRIJAVI SE </x-jet-button>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="mt-4 flex items-center justify-end">
                            <div class="w-auto h-5">
                                <a href="{{ route('candidate.index_applications', [$job->job_id])}}">
                                    <x-jet-button class="hover:bg-blue-details w-auto"> PRIJAVE </x-jet-button>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

