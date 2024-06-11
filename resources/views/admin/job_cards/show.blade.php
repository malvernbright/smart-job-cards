<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overfolw-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 max-w-sm">
                    <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-6 flex-col">
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
                            <p class="leading-relaxed text-base text-white font-thin">Created at: {{$jobCard->created_at}}</p>

                            <a href="{{route('admin.job_card.show', $jobCard->id)}}"
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
            </div>
        </div>
    </div>
</x-admin-layout>
