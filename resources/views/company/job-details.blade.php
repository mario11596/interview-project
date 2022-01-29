<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Detalji o oglasu') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                @include('alert')
                <div class="m-3">
                    <div class="flex">
                        <div class="mr-8 h-32 w-36">
                            <img src="{{ asset('files/photos/'.Auth::user()->email.'.JPG') }}" class="h-28 w-28 rounded-full"/>
                        </div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl">{{$job->position}} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-6"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-300">
                                <tr>
                                    <td class="w-1/4 p-2 align-top">Opis posla:</td>
                                    <td>{{$job->description}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Područje rada:</td>
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
                                    <td class="w-1/4 p-2">Rok trajanja oglasa:</td>
                                    <td>{{date('d.m.Y.', strtotime($job->deadline))}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2 align-top">Uvjeti:</td>
                                    <td>{{$job->conditions}}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <div class="w-auto h-5">
                            <a href="{{route('company.company_dashboard')}}">
                            <x-jet-button TYPE="button" class="w-auto hover:bg-blue-details" title="Povratak">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                            </x-jet-button>
                            </a>
                        </div>
                        <div class="w-auto h-5">
                            <a href="{{ route('company.edit_job', $job->job_id)}}">
                                <x-jet-button class="hover:bg-blue-details w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-pencil-square mr-1" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    UREDI PODATKE
                                </x-jet-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

