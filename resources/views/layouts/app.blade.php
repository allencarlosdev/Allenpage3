<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Allenblog') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')


            <!-- Page Content -->
            <main class="pt-28 mb-12">
                {{ $slot }}
            </main>
            {{-- Social networks --footer--}}
            <div class="bg-white p-4 fixed bottom-0 w-full">
                <ul class="flex space-x-6 text-2xl justify-center">
                    <li><a href="https://github.com/allencarlosdev" target="_blank"><i class="text-gray-700 fa fa-github"></i></a></li>
                    <li><a href="https://stackoverflow.com/users/16209550/carlos-allen" target="_blank"><i class="text-gray-700 fa fa-stack-overflow"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/allencarlosdev/" target="_blank"><i
                                class="text-gray-700 fa fa-linkedin"></i></a></li>
                    <li class="li-icon"><a href="https://www.sololearn.com/profile/20725585" target="_blank"><i class="text-gray-700 fab fa-stripe-s"></i></a></li>
                </ul>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://kit.fontawesome.com/0b01b67c65.js" crossorigin="anonymous"></script>
    </body>
</html>
