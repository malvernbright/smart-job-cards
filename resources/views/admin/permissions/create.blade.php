<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-800">
                        Permissions Index
                    </a>
                </div>
            </div>
            <div class="flex flex-col">
                <form action="{{ route('admin.permissions.store') }}" method="post">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Permission name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('name')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
