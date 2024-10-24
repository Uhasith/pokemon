<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    @stack('meta-tags')

    <link rel="icon" type="image/png" href="{{ asset('assets/card-images/logoo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Tippy JS for tooltips -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>

    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @livewireStyles
    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased" x-data>
    <div class="min-h-screen">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-wui-dialog />

    @livewire('notifications')

    @filamentScripts
    @livewireScripts
    @stack('scripts')

    <!-- Include the Filepond library -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-get-file@1.0.6/dist/filepond-plugin-get-file.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
</body>

<footer>
    <div class="w-full !bg-[#1C1C1C] py-8">
        <div class="max-w-[1440px] relative flex justify-center items-center flex-col gap-4 mx-auto p-5">
            <h3 class="text-center font-manrope text-white text-xl font-semibold">Got a Question? Email <a
                    href="">website@pokemonprice.com</a></h3>
            <h4 class="text-center font-manrope leading-8 text-white text-sm font-medium">When you click on links to
                various merchants on this site and make a purchase, this can result in this site earning a commission.
                Affiliate programs and <br> affiliations include, but are not limited to, the eBay partner network.</a>
            </h4>
            <h4 class="text-center font-manrope leading-8 text-white text-sm font-medium">Pokémon © 2002-2024 Pokémon. ©
                1995-2024 Nintendo/Creatures Inc./GAME FREAK inc. TM, ® and Pokémon character names are trademarks off
                Ninetendo. This website is not produced, endorsed, supported, or affiliated with Nintendo/Creatures
                Inc./GAME FREAK inc.</h4>
        </div>
    </div>

</footer>

</html>