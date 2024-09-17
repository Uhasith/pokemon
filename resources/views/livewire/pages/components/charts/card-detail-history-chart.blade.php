<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public $card;
    public $populations;
    public $cardPricesTimeseries;
    public $chartGrade = 'PSA10';
    public $timeFrame = '6M';

    public $chartData = [
        'labels' => [],
        'prices' => [],
    ];

    public function updatedChartGrade()
    {
        $this->getChartData();
        $this->dispatch('chartDataUpdated');
    }

    public function mount()
    {
        $this->getChartData();
    }

    public function getChartData()
    {
        // Remove 'PSA' from the string and convert the remaining part to an integer
        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);

        // Log the numeric grade for debugging
        Log::info('Numeric Grade: ' . $numericGrade);

        // Now use $numericGrade to filter the data
        $filteredData = collect($this->cardPricesTimeseries)
            ->filter(function ($item) use ($numericGrade) {
                return $item['psa_grade'] == $numericGrade;
            })
            ->first(); // Assuming you want the first matching PSA grade

        // If there is data for the selected grade
        if ($filteredData) {
            $timeseries = $filteredData['timeseries_data'];

            // Extract the dates and fair prices
            // Format the dates to 'M d' (e.g., Aug 23, Sep 03)
            $dates = collect($timeseries)
                ->pluck('date')
                ->map(function ($date) {
                    return Carbon::parse($date)->format('M d');
                })
                ->toArray();
            $fairPrices = collect($timeseries)->pluck('fair_price')->toArray();

            // Set the chart data
            $this->chartData['labels'] = $dates;
            $this->chartData['prices'] = $fairPrices;

            // Log the chart data for debugging
            Log::info($this->chartData);
        } else {
            Log::info('No data found for the selected grade.');
        }
    }
}; ?>

<div>
    <h2 class="font-manrope font-bold text-white text-xl mb-5">Market Price History</h2>

    <div wire:ignore>
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex -mb-px text-sm font-medium text-center bg-evengray rounded-t-xl relative overflow-x-auto"
                id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="tabactive bg-yellowish rounded-b-lg text-black"
                data-tabs-inactive-classes="text-gray-500 hover:text-black hover:bg-yellowish hover:rounded-lg"
                role="tablist">
                <li class="bg-grayish p-3 rounded-t-xl" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg" id="profile-styled-tab"
                        data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Price Changes - $</button>
                </li>
                <li class="bg-evengray p-3 rounded-t-xl" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg" id="dashboard-styled-tab"
                        data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard"
                        aria-selected="false">Number of Sales - Bar
                        chart</button>
                </li>
                <li class="bg-evengray p-3 rounded-t-xl" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg" id="settings-styled-tab"
                        data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings"
                        aria-selected="false">Population</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="hidden p-4 rounded-b-xl bg-grayish" id="styled-profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <div class="flex justify-between items-center mb-5">
                    <div class="flex rounded-lg bg-evengray p-1 w-auto gap-3">
                        <div>
                            <div class="p-2 rounded bg-yellowish hover:bg-yellowish group cursor-pointer">
                                <p class="font-manrope font-bold text-sm text-center group-hover:text-black">
                                    6M</p>
                            </div>
                        </div>
                        <div>
                            <div class="p-2 rounded hover:bg-yellowish group cursor-pointer">
                                <p class="font-manrope font-bold text-sm text-center text-white group-hover:text-black">
                                    1Y</p>
                            </div>
                        </div>
                        <div>
                            <div class="p-2 rounded hover:bg-yellowish group cursor-pointer">
                                <p class="font-manrope font-bold text-sm text-center text-white group-hover:text-black">
                                    5Y</p>
                            </div>
                        </div>
                        <div>
                            <div class="p-2 rounded hover:bg-yellowish group cursor-pointer">
                                <p class="font-manrope font-bold text-sm text-center text-white group-hover:text-black">
                                    All</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-wui-select placeholder="Select Grades" wire:model.live='chartGrade' :options="array_keys($this->populations)" />
                    </div>
                </div>
                <div id="chart-container" style="width: 90%; height: 300px; margin: auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder
                    content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard
                        tab's associated content</strong>. Clicking another tab will toggle the
                    visibility of this one for the next. The tab JavaScript swaps classes to control
                    the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder
                    content the <strong class="font-medium text-gray-800 dark:text-white">Settings
                        tab's associated content</strong>. Clicking another tab will toggle the
                    visibility of this one for the next. The tab JavaScript swaps classes to control
                    the content visibility and styling.</p>
            </div>
        </div>
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
                labels: $wire.chartData.labels,
                datasets: [{
                    label: 'Price Change',
                    data: $wire.chartData.prices,
                    backgroundColor: 'rgba(255, 165, 0, 0.2)', // Line fill color
                    borderColor: 'rgba(255, 165, 0, 1)', // Line color (orange)
                    borderWidth: 2,
                    tension: 0.4, // Increase smoothness of the line
                    pointBackgroundColor: 'rgba(255, 165, 0, 1)', // Make points visible
                    pointBorderColor: 'rgba(255, 165, 0, 1)',
                    pointRadius: 3, // Increase point size for better visibility
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false, // Adjusted to not always start at zero for price charts
                        ticks: {
                            stepSize: 100, // Customize based on your data range
                            color: '#fff', // Y-axis label color
                            callback: function(value) {
                                return '$' + value.toLocaleString(); // Format Y-axis values with $ and commas
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
                        display: true, // Show legend
                        labels: {
                            color: '#fff' // Legend label color
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        bodyColor: '#000',
                        borderColor: '#ddd',
                        borderWidth: 1,
                        callbacks: {
                            label: function(tooltipItem) {
                                // Format tooltip with $ and two decimals
                                let price = tooltipItem.raw;
                                return ' Price: $ ' + Number(price).toFixed(2);
                            }
                        }
                    }
                }
            }
        });

        Livewire.on('chartDataUpdated', () => {
            // Update chart data with new values
            myChart.data.labels = $wire.chartData.labels;
            myChart.data.datasets[0].data = $wire.chartData.prices;

            // Now update the chart
            myChart.update();
        });
    </script>
@endscript
