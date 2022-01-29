<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Informacije o kandidatu') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                <div class="m-3">
                    <div class="flex">
                        <div class="mr-8 h-32 w-36">
                        <img src="{{ asset('files/photos/'.$candidate->email_id.'.JPG') }}"
                                alt="slika"
                                class="h-28 w-28 rounded-full"/></div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl"> {{ $candidate->name }} </label>
                                    <label class="text-2xl"> {{ $candidate->surname }} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-5 animate-pulse"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-300">

                                <tr>
                                    <td class="w-1/4 p-2">OIB:</td>
                                    <td>{{ $candidate->OIB }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Grad:</td>
                                    <td>{{ $candidate->city }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Adresa:</td>
                                    <td>{{ $candidate->address }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Broj mobitela:</td>
                                    <td>{{ $candidate->mobile_number }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Status:</td>
                                    <td>{{ $candidate->status_type }}</td>
                                </tr>
                                @php($file = public_path().'/files/uploads/'.$candidate->email_id.'.pdf')
                                @if(file_exists($file))
                                <tr>
                                    <td class="w-1/4 p-2">Životopis:</td>
                                    <td><a target="blank" href="{{ route('company.show_pdf',$candidate->email_id ) }}" class="underline">Životopis kandidata</a></td>
                                </tr>
                                @else
                                <tr>
                                    <td class="w-1/4 p-2">Životopis:</td>
                                    <td style="color:red">Kandidat nije priložio!</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="w-1/4 p-2 align-top">Motivacijsko pismo:</td>
                                    <td>{{ $message }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="w-auto h-5">
                        <x-jet-button TYPE="button" onClick="history.go(-1);" class="w-auto hover:bg-blue-details" title="Povratak"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg> </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

