<x-app-layout>
    <x-slot name="header">
        <div class="input-group">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Moje prijave') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 " style="height: 100%;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('alert')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed text-lg space-y-14 w-11/12" align="center">
                        <tbody class="divide-y divide-gray-300">
                        <tr>
                            <th>Tvrtka</th>
                            <th>Pozicija</th>
                            <th>Grad</th>
                            <th>Status</th>
                            <th>Opcije</th>
                        </tr>

                        @foreach ($all_jobs as $all_job)
                        <tr align="center">
                            <td>{{ $all_job->name }}</td>
                            <td>{{ $all_job->position }}</td>
                            <td>{{ $all_job->city }}</td>
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
                            <td class="flex justify-center">
                                <a href="{{ route('candidate.show_applications', $all_job->company_id) }}" class="btn btn-info" style="margin:5px;"  title="Detalji">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('candidate.email_applications', $all_job->company_id) }}" class="btn btn-info" style="margin:5px;" title="E-mail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16" >
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('candidate.delete_applications', $all_job->application_id) }}" title="Obriši">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16" style="margin:5px;">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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
