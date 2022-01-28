
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
                        <div class="mr-4 h-28 w-28">
                        <img src="{{ asset('files/photos/'.$candidate->email_id.'.JPG') }}"
                                alt="slika"
                                class="h-14 w-14 rounded-full"/></div>
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
                                    <td><a href="{{ route('company.show_pdf',$candidate->email_id ) }}">životopis kandidata</a></td>
                                </tr>
                                @else
                                <tr>
                                    <td class="w-1/4 p-2">Životopis:</td>
                                    <td style="color:red">Kandidat nije priložio!</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="w-1/4 p-2">Motivacijsko pismo:</td>
                                    <td>{{ $message }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 p-5">
                    <div class="m-3">
                        <iframe width="100%" height="400px" id="gmap_canvas" src="https://maps.google.com/maps?q={{$candidate->address}},%20{{$candidate->city}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>           
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

