<x-app-layout>
    <x-slot name="header">
        {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-10/12">
                    {{ __('Interviews') }}
                </h2>--}}
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-4/5 p-2">

                <div class="w-10/12 lg:6/12 mx-auto relative py-5">
                    <h1 class="text-3xl text-center font-bold text-gray-600">Čekaju na povratnu informaciju</h1>
                    <div class="border-l-2 mt-10">
                        <!-- Card 0 -->
                        @forelse($before as $interview)
                            <div
                                class="transform transition cursor-pointer hover:-translate-y-0.5 ml-10 relative flex items-center px-6 py-2 bg-blue-pending text-white rounded mb-10 flex-col md:flex-row space-y-1 md:space-y-0">
                                <!-- Dot Follwing the Left Vertical Line -->
                                <div
                                    class="w-5 h-5 bg-blue-300 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

                                <!-- Line that connecting the box with the vertical line -->
                                <div class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>

                                <!-- Content that showing in the box -->
                                <div class="flex-auto">
                                    <h1 class="text-lg">Za radno mjesto: {{$interview->position}}</h1>
                                    <h1 class="text-xl font-bold">{{date('d.m.Y', strtotime($interview->date))}}
                                        u {{date('H:i', strtotime($interview->time))}} {{$interview->interview_type}}</h1>
                                    <h3>{{$interview->name}} {{$interview->surname}}</h3>
                                </div>
                                <a href="#" class="text-center text-white hover:text-gray-300"></a>
                            </div>
                        @empty
                            <div>Nema proteklih razgovora</div>
                        @endforelse
                    </div>
                </div>

                <!-- component -->
                <div class="w-10/12 lg:6/12 mx-auto relative py-5">
                    <h1 class="text-3xl text-center font-bold text-gray-600">Nadolazeći razgovori</h1>
                    <div class="border-l-2 mt-10">
                    @forelse($after as $interview)
                        <!-- Card 1 -->
                            <div
                                class="transform transition cursor-pointer hover:-translate-y-0.5 ml-10 relative flex items-center px-6 py-2 bg-blue-upcoming text-white rounded mb-10 flex-col md:flex-row space-y-0.5 md:space-y-0">
                                <!-- Dot Follwing the Left Vertical Line -->
                                <div
                                    class="w-5 h-5 bg-blue-upcoming absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

                                <!-- Line that connecting the box with the vertical line -->
                                <div class="w-10 h-1 bg-blue-upcoming absolute -left-10 z-0"></div>

                                <!-- Content that showing in the box -->
                                <div class="flex-auto">
                                    <h1 class="text-lg">Za radno mjesto: {{$interview->position}}</h1>
                                    <h1 class="text-xl font-bold">{{date('d.m.Y', strtotime($interview->date))}}
                                        u {{date('H:i', strtotime($interview->time))}} {{$interview->interview_type}}</h1>
                                    <h3>{{$interview->name}} {{$interview->surname}}</h3>
                                </div>

                                <a href="{{ route('company.show_applications', $interview->application_id) }}"
                                   class="text-center text-white hover:text-gray-300"> Informacije o kandidatu
                                </a>
                            </div>
                        @empty
                            <div>Nema nadolazećih razgovora</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
