<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public $card;
    public $populations;
    public $cardPricesTimeseries;
    public $cardTransactionTimeseries;
    public $chartGrade = 'PSA10';
    public $timeFrame = 'ALL';
    public $timeFrameAvailability = [];

    public $chartData = [
        'labels' => [],
        'prices' => [],
    ];

    public function updatedChartGrade()
    {
        $this->getChartData();
        $this->dispatch('priceChartDataUpdated');
    }

    public function updatedTimeFrame()
    {
        $this->getChartData();
        $this->dispatch('priceChartDataUpdated');
    }

    public function mount()
    {
        $this->getChartData();
    }

    public function getChartData()
    {
        // Remove 'PSA' from the string and convert the remaining part to an integer
        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);

        // Now use $numericGrade to filter the data
        $filteredData = collect($this->cardPricesTimeseries)
            ->filter(function ($item) use ($numericGrade) {
                return $item['psa_grade'] == $numericGrade;
            })
            ->first(); // Assuming you want the first matching PSA grade

        // If there is data for the selected grade
        if ($filteredData) {
            $timeseries = collect($filteredData['timeseries_data']);

            // Initialize availability for each time frame
            $this->timeFrameAvailability = [
                '6M' => false,
                '1Y' => false,
                '5Y' => false,
                'All' => true, // Default is 'All'
            ];

            // Define time frames to check
            $timeFrames = [
                '6M' => Carbon::now()->subMonths(6),
                '1Y' => Carbon::now()->subYear(),
                '5Y' => Carbon::now()->subYears(5),
            ];

            // Check if there are at least 3 records for each time frame and set availability flags
            foreach ($timeFrames as $key => $startDate) {
                $timeFrameData = $timeseries->filter(function ($item) use ($startDate) {
                    $date = Carbon::parse($item['date']);
                    return $date->greaterThanOrEqualTo($startDate);
                });

                if ($timeFrameData->count() >= 3) {
                    // Ensure at least 3 records
                    $this->timeFrameAvailability[$key] = true;
                }
            }

            // Determine the start date based on the selected time frame
            $startDate = null;
            switch ($this->timeFrame) {
                case '6M':
                    $startDate = $timeFrames['6M'];
                    break;
                case '1Y':
                    $startDate = $timeFrames['1Y'];
                    break;
                case '5Y':
                    $startDate = $timeFrames['5Y'];
                    break;
                default:
                    // 'All' or any other case: no filtering based on time
                    $startDate = Carbon::parse($timeseries->first()['date']); // Oldest date in timeseries
                    break;
            }

            // Filter the timeseries data to include only entries within the start date and the latest date
            $filteredTimeseries = $timeseries->filter(function ($item) use ($startDate) {
                $date = Carbon::parse($item['date']);
                return $date->greaterThanOrEqualTo($startDate);
            });

            // Sort the filtered data by date (in case it's not already sorted)
            $filteredTimeseries = $filteredTimeseries->sortBy('date');

            // Extract the dates and fair prices based on the time frame
            $dates = $filteredTimeseries
                ->pluck('date')
                ->map(function ($date) {
                    // Format the date depending on the time frame
                    if ($this->timeFrame === '6M') {
                        return Carbon::parse($date)->format('M Y'); // Show only month for 6M
                    } elseif (in_array($this->timeFrame, ['1Y', '5Y'])) {
                        return Carbon::parse($date)->format('M Y'); // Month and year for 1Y and 5Y
                    } else {
                        return Carbon::parse($date)->format('M d, Y'); // Full date for All
                    }
                })
                ->toArray();

            $fairPrices = $filteredTimeseries->pluck('fair_price')->toArray();

            // Set the chart data
            $this->chartData['labels'] = $dates;
            $this->chartData['prices'] = $fairPrices;
        } else {
            Log::info('No data found for the selected grade.');
        }
    }
}; ?>

<div wire:ignore>
    <div class="flex justify-between items-center mb-5 relative" x-data="{ timeFrame: $wire.entangle('timeFrame').live, timeFrameAvailability: $wire.entangle('timeFrameAvailability').live }">
        <div class="flex rounded-lg bg-evengray p-1 w-auto gap-3">
            <!-- 6M Button -->
            <div>
                <div @click="timeFrameAvailability['6M'] && (timeFrame = '6M')" :disabled="!timeFrameAvailability['6M']"
                    class="p-2 rounded cursor-pointer"
                    :class="{
                        'bg-yellowish text-black': timeFrame === '6M',
                        'bg-evengray text-white': timeFrame !== '6M',
                        'opacity-50 cursor-not-allowed': !timeFrameAvailability['6M']
                    }">
                    <p class="font-manrope font-bold text-sm text-center">6M</p>
                </div>
            </div>

            <!-- 1Y Button -->
            <div>
                <div @click="timeFrameAvailability['1Y'] && (timeFrame = '1Y')" :disabled="!timeFrameAvailability['1Y']"
                    class="p-2 rounded cursor-pointer"
                    :class="{
                        'bg-yellowish text-black': timeFrame === '1Y',
                        'bg-evengray text-white': timeFrame !== '1Y',
                        'opacity-50 cursor-not-allowed': !timeFrameAvailability['1Y']
                    }">
                    <p class="font-manrope font-bold text-sm text-center">1Y</p>
                </div>
            </div>

            <!-- 5Y Button -->
            <div>
                <div @click="timeFrameAvailability['5Y'] && (timeFrame = '5Y')" :disabled="!timeFrameAvailability['5Y']"
                    class="p-2 rounded cursor-pointer"
                    :class="{
                        'bg-yellowish text-black': timeFrame === '5Y',
                        'bg-evengray text-white': timeFrame !== '5Y',
                        'opacity-50 cursor-not-allowed': !timeFrameAvailability['5Y']
                    }">
                    <p class="font-manrope font-bold text-sm text-center">5Y</p>
                </div>
            </div>

            <!-- All Button -->
            <div>
                <div @click="timeFrame = 'ALL'" class="p-2 rounded cursor-pointer"
                    :class="{
                        'bg-yellowish text-black': timeFrame === 'ALL',
                        'bg-evengray text-white': timeFrame !== 'ALL'
                    }">
                    <p class="font-manrope font-bold text-sm text-center">All</p>
                </div>
            </div>
        </div>

        <!-- Grade Selector -->
        <div>
            <x-wui-select placeholder="Select Grades" wire:model.live='chartGrade' :options="array_keys($this->populations)" />
        </div>
    </div>
    <div id="chart-container" style="width: 90%; height: 300px; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
</div>

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

        Livewire.on('priceChartDataUpdated', () => {
            // Update chart data with new values
            myChart.data.labels = $wire.chartData.labels;
            myChart.data.datasets[0].data = $wire.chartData.prices;

            // Now update the chart
            myChart.update();
        });
    </script>
@endscript
