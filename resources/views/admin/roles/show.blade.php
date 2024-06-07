<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overfolw-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end">
                    <a class="px-4 py-2 bg-green-700 my-2 text-white hover:bg-green-500 rounded-md" href="#">Create
                        Role</a>
                </div>

                <div class="relative overflow-x-auto">
                    {{ $role->name }}
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
