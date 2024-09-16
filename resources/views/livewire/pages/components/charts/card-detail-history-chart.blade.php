<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div id="chart-container" style="width: 90%; height: 300px; margin: auto;" wire:ignore>
        <canvas id="myChart"></canvas>
    </div>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('myChart');
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
    </script>
@endscript
