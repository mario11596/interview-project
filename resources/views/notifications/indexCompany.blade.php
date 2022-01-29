
<x-app-layout>
    <x-slot name="header">
        <div class="input-group">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Obavijesti') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 " style="height: 100%;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b border-gray-200">
                @if($notifications->isNotEmpty())
                    @foreach($notifications as $notification)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="alertCustom">
                                {{ $notification->created_at->diffForhumans() }} </br>
                                Prijava: Kandidat {{ $notification->data['name'] }} {{ $notification->data['surname'] }} iz {{ $notification->data['city'] }}, se uspješno prijavio na Vaš oglas!
                                <a href="{{ route('company.notificationMarkOne', $notification->id) }}" class="flex justify-end">Označi kao pročitano</a>   
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ route('company.notificationMark', $notification->id) }}">
                        <x-jet-button type="button" class="mr-3 hover:bg-green-new">
                            Označi sve kao pročitano
                        </x-jet-button>
                    </a>
                    </div>
                @else
                <strong>Trenutno nema novih obavijesti</strong>
                @endif
            </div>
        </div>
    </div>                
</x-app-layout>
