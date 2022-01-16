<x-app-layout>
    <x-slot name="header">
        <div class="input-group">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Sve prijave') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 " style="height: 100%;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('alert')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed text-lg space-y-12 w-10/12 " align="center">
                        <tbody class="divide-y divide-gray-300">
                        <tr>
                            <th>Pozicija</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Status</th>
                            <th>Stanje prijave</th>
                            <th colspan="2">Promjeni status</th>
                            <th>Opcije</th>
                        </tr>

                        @foreach ($all_jobs as $all_job)
                        <tr align="center">
                            <td>{{ $all_job->position }}</td>
                            <td>{{ $all_job->name }}</td>
                            <td>{{ $all_job->surname }}</td>
                            <td>{{ $all_job->status_type }}</td>
                            <td>
                            @if($all_job->status == 'Čekanje')
                                <p style="color: blue;">{{ $all_job->status }}</p>
                            </td>
                            @elseif($all_job->status == 'Odbijeno')
                            <p style="color: red;">{{ $all_job->status }}</p>
                            @elseif($all_job->status == 'Prihvaćeno')
                            <p style="color: green;">{{ $all_job->status }}</p>
                            @endif
                            </td>

                            <td>
                            @if($all_job->status == 'Odbijeno')
                                <x-jet-button class="hover:bg-green-new" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                    </svg>
                                </x-jet-button> 
                            </td>          
                            <td>   
                                <x-jet-button class="hover:bg-red-delete" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </x-jet-button>
                            @else
                            <x-jet-button class="hover:bg-green-new">
                            <a href="{{ route('company.jobsAccept',  $all_job->application_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </a>
                            </x-jet-button>
                            </td>          
                            <td>
                            <x-jet-button class="hover:bg-red-delete">
                            <a href="{{ route('company.jobsReject',  $all_job->application_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </x-jet-button>
                            </td>
                            @endif                        
                            <td class="flex justify-center">
                                <a href="{{ route('company.email_applications', $all_job->user_id) }}" class="btn btn-info" style="margin:5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </a>
                                 
                                <a href="{{ route('company.show_applications', $all_job->user_id) }}" class="btn btn-info" style="margin:5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                </a>       
                            </td>
                        </tr>             
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>               
</x-app-layout>
