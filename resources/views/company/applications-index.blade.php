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
                    <table class="table-fixed text-lg space-y-12 w-11/12 " align="center" style="white-space:nowrap;">
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
                                <p class="text-blue-pen">{{ $all_job->status }}</p>
                            </td>
                            @elseif($all_job->status == 'Odbijeno')
                            <p class="text-red-den">{{ $all_job->status }}</p>
                            @elseif($all_job->status == 'Prihvaćeno')
                            <p class="text-green-acc">{{ $all_job->status }}</p>
                            @endif
                            </td>

                            <td class="text-right">
                            @if($all_job->status == 'Odbijeno' || $all_job->status == 'Prihvaćeno')
                                <x-jet-button class="rounded-full" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </x-jet-button>
                            </td>
                            <td class="text-left">
                                <x-jet-button class="rounded-full" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                    </svg>
                                </x-jet-button>
                            @else
                            <x-jet-button class="hover:bg-green-new rounded-full">
                            <a href="{{ route('company.jobsAccept',  $all_job->application_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </a>
                            </x-jet-button>
                            </td>
                            <td class="text-left">
                            <x-jet-button class="hover:bg-red-delete rounded-full">
                            <a href="{{ route('company.jobsReject',  $all_job->application_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </a>
                        </x-jet-button>
                            </td>
                            @endif
                            <td class="flex justify-center">
                                <a href="{{ route('company.show_applications', $all_job->application_id) }}" class="btn btn-info" style="margin:5px;" title="Detalji">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('company.email_applications', $all_job->user_id) }}" class="btn btn-info" style="margin:5px;" title="E-mail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
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
