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
    <link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div
            class="max-w-7xl mx-auto px-4 py-6 flex flex-col sm:flex-row items-center justify-between text-sm text-gray-600">
            <div class="mb-2 sm:mb-0">
                &copy; {{ date('Y') }} <strong class="text-gray-800">Stevent</strong>. All rights reserved.
            </div>

            <div class="flex space-x-4">
                <a href="https://github.com/stevent4" target="_blank"
                    class="text-gray-500 hover:text-gray-900 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 0.5C5.4 0.5 0 5.9 0 12.5C0 17.7 3.4 22.1 8.2 23.6C8.8 23.7 9 23.3 9 22.9V20.8C5.7 21.6 5 19.5 5 19.5C4.5 18.2 3.8 17.8 3.8 17.8C2.7 17 3.9 17 3.9 17C5.1 17.1 5.8 18.2 5.8 18.2C6.9 20 8.6 19.5 9.2 19.2C9.3 18.4 9.6 17.9 9.9 17.6C7.2 17.3 4.4 16.3 4.4 11.6C4.4 10.3 4.9 9.2 5.7 8.4C5.6 8.1 5.2 6.9 5.8 5.3C5.8 5.3 6.8 5 9 6.5C9.9 6.2 10.9 6 12 6C13.1 6 14.1 6.2 15 6.5C17.2 5 18.2 5.3 18.2 5.3C18.8 6.9 18.4 8.1 18.3 8.4C19.1 9.2 19.6 10.3 19.6 11.6C19.6 16.4 16.8 17.3 14.1 17.6C14.5 17.9 14.8 18.5 14.8 19.5V22.9C14.8 23.3 15 23.7 15.6 23.6C20.4 22.1 23.8 17.7 23.8 12.5C23.8 5.9 18.6 0.5 12 0.5Z" />
                    </svg>
                </a>
                <a href="https://instagram.com/a.stevents" target="_blank"
                    class="text-gray-500 hover:text-pink-500 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 2 .3 2.5.6.6.3 1.1.7 1.6 1.2.5.5.9 1 1.2 1.6.3.5.5 1.3.6 2.5.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.3 2-.6 2.5-.3.6-.7 1.1-1.2 1.6-.5.5-1 0.9-1.6 1.2-.5.3-1.3.5-2.5.6-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-2-.3-2.5-.6-.6-.3-1.1-.7-1.6-1.2-.5-.5-.9-1-1.2-1.6-.3-.5-.5-1.3-.6-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8c.1-1.2.3-2 .6-2.5.3-.6.7-1.1 1.2-1.6.5-.5 1-0.9 1.6-1.2.5-.3 1.3-.5 2.5-.6C8.4 2.2 8.8 2.2 12 2.2M12 0C8.7 0 8.3 0 7.1.1c-1.3.1-2.3.3-3.2.7-.9.4-1.7 1-2.5 1.8C.9 3.4.3 4.2 0 5.1.3 6 0 7.1.1 8.3.1 9.5 0 9.9 0 12s.1 2.5.1 3.7c.1 1.3.3 2.3.7 3.2.4.9 1 1.7 1.8 2.5.8.8 1.6 1.4 2.5 1.8.9.4 1.9.6 3.2.7C8.3 23.9 8.7 24 12 24s3.6-.1 4.8-.1c1.3-.1 2.3-.3 3.2-.7.9-.4 1.7-1 2.5-1.8.8-.8 1.4-1.6 1.8-2.5.4-.9.6-1.9.7-3.2.1-1.2.1-1.6.1-4.8s0-3.6-.1-4.8c-.1-1.3-.3-2.3-.7-3.2-.4-.9-1-1.7-1.8-2.5-.8-.8-1.6-1.4-2.5-1.8-.9-.4-1.9-.6-3.2-.7C15.6.1 15.2 0 12 0z" />
                        <path
                            d="M12 5.8a6.2 6.2 0 100 12.4 6.2 6.2 0 000-12.4zm0 10.2a4 4 0 110-8 4 4 0 010 8zM18.4 4.9a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
