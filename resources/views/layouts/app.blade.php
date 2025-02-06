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

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <!-- Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Toast Notifications -->
    <div x-data="{ show: false, message: '', type: '' }" x-show="show" x-transition x-cloak
        class="fixed px-4 py-2 text-white rounded-lg shadow-lg bottom-5 right-5"
        :class="type === 'success' ? 'bg-green-500' : 'bg-red-500'" x-text="message">
    </div>

    <script>
        window.addEventListener('toast', event => {
            let toast = event.detail;
            let el = document.querySelector('[x-data]');

            el.message = toast.message;
            el.type = toast.type;
            el.show = true;
            setTimeout(() => el.show = false, 3000);
        });
    </script>
</body>

</html>
