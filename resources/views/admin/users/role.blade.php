<x-admin-layout>
    <div class="py-12 w-full bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-800">
                        Users Index
                    </a>
                </div>
            </div>
            <div class="flex flex-col p-2 bg-slate-100">
                <div class="">User name: {{ $user->name }} </div>
                <div class="">User email: {{ $user->email }}</div>
            </div>
            <div class="mt-6 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Role</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                            <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                method="post" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ $user_role->name }}</button>
                            </form>
                        @endforeach
                    @endif
                </div>
                <div class="max-w-xl mt-6">
                    <form action="{{ route('admin.users.roles', $user->id) }}" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="role" class="block text-sm font-medium text-gray-700">
                                Roles
                            </label>
                            <select name="role" id="role" autocomplete="role-name"
                                class="mt-1 block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
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
            <div class="mt-6 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Permissions</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($user->permissions)
                        @foreach ($user->permissions as $user_permission)
                            <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                method="post" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ $user_permission->name }}</button>
                            </form>
                        @endforeach
                    @endif
                </div>
                <div class="max-w-xl mt-6">
                    <form action="{{ route('admin.users.permissions', $user->id) }}" method="post">
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
