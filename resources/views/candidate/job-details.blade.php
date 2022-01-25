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
                            <img src="{{ asset('files/photos/'.$job->company->email_id.'.JPG') }}"
                                 class="rounded-full"/>
                        </div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl"> {{$job->position}} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-5 animate-pulse"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-300">
                                <tr>
                                    <td class="w-1/4 p-2">Opis posla:</td>
                                    <td>{{$job->description}}</td>
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

                    <div class="mt-4 flex px-2 items-center justify-end">
                        <div class="w-auto h-5">
                            <a href="{{ route('candidate.show_company', $job->job_id)}}">
                                <x-jet-button class="hover:bg-blue-details w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-briefcase-fill mr-1" viewBox="0 0 16 16">
                                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                                    </svg>
                                    Detalji tvrtke
                                </x-jet-button>
                            </a>
                            @if(!$application)
                                <a href="{{ route('candidate.create_application', [$job->job_id])}}">
                                    <x-jet-button class="hover:bg-blue-details w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-person-plus-fill mr-1"
                                             viewBox="0 0 16 16">
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        PRIJAVI SE
                                    </x-jet-button>
                                </a>
                            @else
                                <a href="{{ route('candidate.index_applications', [$job->job_id])}}">
                                    <x-jet-button class="hover:bg-blue-details w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-person-lines-fill mr-1"
                                             viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                        PRIJAVE
                                    </x-jet-button>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

