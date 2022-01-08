<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Moje informacije') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                <div class="m-3">
                    <div class="flex">
                        <div class="mr-4 h-28 w-28">
                            <img src="https://stemgames.hr/wp-content/uploads/2017/12/riteh.gif" alt="image"
                                 class="rounded-full"/></div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl"> {{$user->name}} </label>
                                    <label class="text-2xl"> {{$user->surname}} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-5 animate-pulse"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-300">
                                <tr>
                                    <td class="w-1/4 p-2">OIB:</td>
                                    <td>{{$user->OIB}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Grad:</td>
                                    <td>{{$user->city}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Adresa:</td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Broj mobitela:</td>
                                    <td>{{$user->mobile_number}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Status:</td>
                                    <td>{{$user->status}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">CV:</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <div class="w-auto h-5">
                            <a href="{{ route('candidate.edit_information', [$user->candidate_id])}}">
                            <x-jet-button class="hover:bg-blue-details w-auto"> UREDI PODATKE </x-jet-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

