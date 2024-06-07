<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @if (Session::has('message'))
        <div class="bg-indigo-600" x-data="{ open: true }" x-show="open" role="alert">
            <strong class="font-bold text-white text-center">{{ Session::get('message') }}</strong>
            {{-- <span class="block sm:inline">{{ Session::get('message') }}</span> --}}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <button type="button" @click="open=false"
                        class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-200">
                        <span class="sr-only">Dismiss</span>
                    </button>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        @include('admin.navigation')
        <div class="flex w-full bg-slate-50">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
