<x-app-layout>
    <x-slot name="header">
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
            </svg>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-2">
                {{ __('Obavijesti') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-200" style="height: 100%;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ }}" class="btn btn-warning">Vrati se natrag</a>
             
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if($notifications->isNotEmpty())
                    @foreach($notifications as $notification)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="alert alert-success">
                                Prijava: Kandidat {{ $notification->data['name'] }} {{ $notification->data['surname'] }} iz {{ $notification->data['city'] }}, je uspješno prijavio na Vaš oglas!
                                    <a href="{{ }}" class="float-right mark-as-read">Označi kao pročitano</a>   
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ }}" class="btn btn-warning">Označi sve kao pročitano</a>
                    </div>
                @else
                <strong>Trenutno nema novih obavijesti</strong>
                @endif
            </div>
        </div>
    </div>                
</x-app-layout>