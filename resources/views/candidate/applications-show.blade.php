<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
            {{ __('Detaljne informacije') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                <div class="m-3">
                    <div class="flex">
                        <div class="mr-4 h-28 w-28">
                            <img src="{{ asset('files/photos/'.$company->email_id.'.JPG') }}" class="rounded-full"/></div>
                        <div class="space-y-1 flex flex-col w-full">
                            <div class="flex w-full flex items-center pb-8">
                                <div class="w-full h-3 mt-8">
                                    <label class="text-2xl"> {{$company->name}} </label>
                                </div>
                                <div class="ml-4 bg-ternary w-12 h-5 animate-pulse"></div>
                            </div>

                            <table class="table-fixed text-lg space-y-12 w-10/12">
                                <tbody class="divide-y divide-gray-400">
                                <tr>
                                    <td class="w-1/4 p-2">Opis:</td>
                                    <td>{{$company->description}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Grad:</td>
                                    <td>{{$company->city}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Adresa:</td>
                                    <td>{{$company->address}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Područje rada:</td>
                                    <td>{{$company->type}}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/4 p-2">Broj zaposlenih:</td>
                                    <td>{{$company->number_employees}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
