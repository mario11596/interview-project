<script type="text/javascript">
    var times = @json($times);

    function dateSelected(value) {
        if (value.length == 0) document.getElementById("time").innerHTML = "<option></option>";
        else {
            var timeOptions = "";

            for (let i = 0; i < times[value].length; i++) {
                timeOptions += "<option>" + times[value][i] + "</option>";
            }

            document.getElementById("time").innerHTML = timeOptions;
        }
    }

</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nova prijava
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5 w-1/2 p-6 space-y-4">
                <form method="POST" action="{{route('candidate.store_application', [$id])}}">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <x-jet-label for="message" value="{{ __('Motivacijsko pismo') }}"/>
                        <textarea id="message"
                                  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 bg-gray-100 w-full"
                                  name="message" required></textarea>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="date" value="{{ __('Datum intervjua') }}"/>
                        <select name="date" id="date" class="block mt-1 w-full bg-gray-100"
                                onChange="dateSelected(this.value);" required>
                            <option value="" disabled selected>Odabir</option>
                            @foreach($times as $date => $time)
                                <option value="{{$date}}">{{date('d.m.Y', strtotime($date))}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="time" value="{{ __('Vrijeme intervjua') }}"/>
                        <select name="time" id="time" class="block mt-1 w-full bg-gray-100" required>
                            <option value="" disabled selected>Odabir</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="type" value="{{ __('Vrsta intervjua') }}"/>
                        <select name="type" id="type" class="block mt-1 w-full bg-gray-100" required>
                            <option value="" disabled selected>Odabir</option>
                            <option value="live">Uživo</option>
                            <option value="online">Online</option>
                        </select>
                    </div>

                    <div class="mb-4 flex justify-center">
                        <x-jet-button type="submit" class="hover:bg-green-new mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-check2 mr-1" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            SPREMI
                        </x-jet-button>

                        <a href="{{url()->previous()}}">
                            <x-jet-button type="button" class="hover:bg-red-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-x-lg mr-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                                ODUSTANI
                            </x-jet-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
