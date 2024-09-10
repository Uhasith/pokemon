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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Tippy JS for tooltips -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>

    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: '',
                        data: [200, 400, 600, 450, 550, 350],
                        backgroundColor: 'rgba(255, 165, 0, 0.2)', // Line fill color
                        borderColor: 'rgba(255, 165, 0, 1)', // Line color (orange)
                        borderWidth: 2,
                        tension: 0.3, // Smoothness of the line
                        pointBackgroundColor: 'transparent', // Point color
                        pointBorderColor: 'transparent',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 200,
                                color: '#fff', // Y-axis label color
                                callback: function(value) {
                                    return '$' + value; // Format Y-axis values as currency
                                }
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)' // Y-axis grid line color
                            }
                        },
                        x: {
                            ticks: {
                                color: '#fff' // X-axis label color
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)' // X-axis grid line color
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Hide legend
                        },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#fff',
                            titleColor: '#000',
                            bodyColor: '#000',
                            borderColor: '#ddd',
                            borderWidth: 1
                        }
                    }
                }
            });
        });
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @wireUiScripts
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
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-get-file@1.0.6/dist/filepond-plugin-get-file.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
</body>

</html>
