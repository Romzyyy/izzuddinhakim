@props(['title'])
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
       
        {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ isset($title) ? $title : 'Document' }}</title>
    </head>

    <body x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }" class="antialiased h-full">
        <div
            class=" min-h-full bg-white dark:bg-gray-950 transition duration-300 ease-in-out text-gray-900 dark:text-gray-100">
            @include('layouts.user-navigation')
            <main>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-12">
                    {{ $slot }}
                </div>
            </main>
            {{-- <div class="flex justify-end container ml-10 md:sticky bottom-8 fixed">
                <x-theme-toggle />
            </div> --}}
            <x-footer></x-footer>
        </div>
        {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script> --}}
    </body>

</html>
