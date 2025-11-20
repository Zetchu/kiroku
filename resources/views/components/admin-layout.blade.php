<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - {{ config('app.name', 'Kiroku') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen flex" x-data="{ sidebarOpen: false }">

    <aside class="bg-[#1a1a1a] text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <div class="flex items-center space-x-2 px-4">
            <span class="text-2xl font-extrabold text-purple-500">Kiroku</span>
            <span class="text-gray-400 text-sm uppercase tracking-wider font-bold">Admin</span>
        </div>

        <nav class="space-y-1 mt-6">


            <div class="border-t border-gray-700 my-4"></div>

            <a href="/"
               class="block py-2.5 px-4 rounded hover:bg-gray-700 text-gray-400 hover:text-white transition duration-200">
                &larr; Back to Website
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col relative">

        <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
            <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <h2 class="text-xl font-semibold text-gray-800">
                {{ $header ?? 'Admin Area' }}
            </h2>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
</div>

</body>
</html>