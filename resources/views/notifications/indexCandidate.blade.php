<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                            <div class="alert alert-success" role="alert">
                            {{ $notification->created_at->diffForhumans() }} </br>
                                Prijava za poziciju {{ $notification->data['position'] }} tvrtke {{ $notification->data['company'] }} u gradu {{ $notification->data['city'] }} je uspješno završena!
                                <a href="{{ route('candidate.notificationMarkOne', $notification->id) }}" class="flex justify-end">Označi kao pročitano</a>   
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ route('candidate.notificationMark', $notification->id) }}"  class="btn btn-warning">Označi sve kao pročitano</a>
                    </div>
                @else
                <strong>Trenutno nema novih obavijesti</strong>
                @endif
            </div>
        </div>
    </div>               
</x-app-layout>
