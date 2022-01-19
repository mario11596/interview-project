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
                            <td>{{ $all_job->status }}</td>
                            <td>
                            @if($all_job->status == 'Odbijeno')
                                <x-jet-button class="hover:bg-green-new" disabled>Odobri</x-jet-button>
                            </td>
                            <td>
                                <x-jet-button class="hover:bg-red-delete" disabled>Odbij</x-jet-button>
                            @else
                            <x-jet-button class="hover:bg-green-new">
                            <a href="{{ route('company.jobsAccept',  $all_job->job_id) }}">Odobri</a></x-jet-button>
                            </td>
                            <td>
                            <x-jet-button class="hover:bg-red-delete">
                            <a href="{{ route('company.jobsReject',  $all_job->job_id) }}">Odbij</a></x-jet-button>
                            </td>
                            @endif
                            <td class="flex justify-center">
                                <a href="{{ route('company.email_applications', $all_job->user_id) }}" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </a>

                                <a href="{{ route('company.show_applications', [$all_job->application_id]) }}" class="btn btn-info">
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
