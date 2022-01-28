

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
                <div class="p-6 bg-white border-b border-gray-200">
                @if($notifications->isNotEmpty())
                    @foreach($notifications as $notification)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @if($notification->data['status'] == 'Prihvaćeno')
                            <div class="alertCustom" role="alert">
                            {{ $notification->created_at->diffForhumans() }} </br>
                                Prijava za poziciju {{ $notification->data['position'] }} tvrtke {{ $notification->data['company'] }} u gradu {{ $notification->data['city'] }} ima status {{ $notification->data['status'] }}!
                                <a href="{{ route('candidate.notificationMarkOne', $notification->id) }}" class="flex justify-end">Označi kao pročitano</a>   
                            </div>
                            @else
                            <div class="alertCustomWarning" role="alert">
                            {{ $notification->created_at->diffForhumans() }} </br>
                                Prijava za poziciju {{ $notification->data['position'] }} tvrtke {{ $notification->data['company'] }} u gradu {{ $notification->data['city'] }} ima status {{ $notification->data['status'] }}!
                                <a href="{{ route('candidate.notificationMarkOne', $notification->id) }}" class="flex justify-end">Označi kao pročitano</a>   
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ route('candidate.notificationMark', $notification->id) }}">
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
