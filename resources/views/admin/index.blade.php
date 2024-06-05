<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                @can('read job-cards')
                    You can READ Job Cards.
                @endcan
                @can('create job-cards')
                    You can Create Job Cards
                @endcan
                @can('create user')
                    Congratulations, you are a super-admin!
                @endcan
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
