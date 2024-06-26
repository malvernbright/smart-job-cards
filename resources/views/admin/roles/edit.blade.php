<x-admin-layout>
    <div class="py-12 w-full bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-800">
                        Roles Index
                    </a>
                </div>
            </div>
            <div class="flex flex-col p-2 bg-slate-100">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <h2>Assign permissions to {{ $role->name }} role</h2>
                    {{-- <form action="{{ route('admin.roles.update', $role) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Role name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    value="{{ $role->name }}" />
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">
                                Save
                            </button>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="mt-6 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Role Permissions for "{{ $role->name }}"</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($role->permissions)
                        <div class="grid grid-cols-4 gap-x-4 text-center">
                            @foreach ($role->permissions as $role_permission)
                                <div class="p-6">
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                        action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                        method="post" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{ $role_permission->name }}</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="max-w-xl mt-6">
                    <form action="{{ route('admin.roles.permissions', $role) }}" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="permission" class="block text-sm font-medium text-gray-700">
                                Permission
                            </label>
                            <select name="permission" id="permission" autocomplete="permission-name"
                                class="mt-1 block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">
                                Assign
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
