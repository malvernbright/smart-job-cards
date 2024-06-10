<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($jobCards)
                    <div class="flex flex-wrap justify-normal mt-10">
                        @foreach ($jobCards as $jobCard)
                            <div class="p-4 max-w-sm">
                                <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col">
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white dark:text-white text-lg font-medium">
                                            {{ $jobCard->title }}</h2>
                                    </div>
                                    <div class="flex flex-col justify-between flex-grow">
                                        <p class="leading-relaxed text-base text-white dark:text-gray-300">
                                            {{ substr($jobCard->description, 0, 40) }}
                                        </p>

                                        <a href="#"
                                            class="mt-3 text-black dark:text-white hover:text-blue-600 inline-flex items-center">Assign
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                                viewBox="0 0 24 24">
                                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-wrap justify-center mt-10">
                        <h3>You don't have job cards yet. Create one</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
