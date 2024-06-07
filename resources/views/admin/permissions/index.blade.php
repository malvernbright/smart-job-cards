<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overfolw-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end">
                    <a class="px-4 py-2 bg-green-700 my-2 text-white hover:bg-green-500 rounded-md"
                        href="{{ route('admin.permissions.create') }}">Create
                        Permission</a>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex justify-end">
                                        Options
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $permission->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                    action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                    method="post" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
