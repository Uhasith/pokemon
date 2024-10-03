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

    public $saleChartData = [
        'labels' => [],
        'prices' => [],
        'grade9Prices' => [],
        'grade10Prices' => [],
    ];

    public function updatedChartGrade()
    {
        $this->getTransactionData();
        $this->dispatch('saleChartDataUpdated');
    }

    public function updatedTimeFrame()
    {
        $this->getTransactionData();
        $this->dispatch('saleChartDataUpdated');
    }

    public function mount()
    {
        $this->getInitialChartData();
        $this->getTransactionData();
    }

    public function getTransactionData()
    {
        // Remove 'PSA' from the string and convert the remaining part to an integer
        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);

        // Now use $numericGrade to filter the transaction data
        $filteredData = collect($this->cardTransactionTimeseries)
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

            // Extract the dates and transaction counts based on the time frame
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

            $transactionCounts = $filteredTimeseries->pluck('transaction_count')->toArray();

            // Set the transaction chart data
            $this->saleChartData['transactionLabels'] = $dates;
            $this->saleChartData['transactions'] = $transactionCounts;
        } else {
            Log::info('No data found for the selected grade.');
        }
    }

    public function getInitialChartData()
    {
        // Define the grades to filter (9 and 10)
        $allowedGrades = [9, 10];

        // Filter the data for the numeric grades 9 or 10
        $filteredData = collect($this->cardPricesTimeseries)->filter(function ($item) use ($allowedGrades) {
            return in_array((int) preg_replace('/[^0-9]/', '', $item['psa_grade']), $allowedGrades);
        });

        // Initialize arrays for storing data of each grade
        $grade9Data = [];
        $grade10Data = [];
        $mergedLabels = [];

        // If there is data for the selected grades
        if ($filteredData->isNotEmpty()) {
            // Loop through each dataset (one for grade 9 and one for grade 10)
            foreach ($filteredData as $data) {
                $numericGrade = (int) preg_replace('/[^0-9]/', '', $data['psa_grade']);
                $timeseries = collect($data['timeseries_data']);

                // Determine the start date based on the selected time frame
                $startDate = null;
                switch ($this->timeFrame) {
                    case '6M':
                        $startDate = Carbon::now()->subMonths(6);
                        break;
                    case '1Y':
                        $startDate = Carbon::now()->subYear();
                        break;
                    case '5Y':
                        $startDate = Carbon::now()->subYears(5);
                        break;
                    default:
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
                $dates = $filteredTimeseries->pluck('date')->toArray();
                $fairPrices = $filteredTimeseries->pluck('fair_price')->toArray();

                // Add dates to merged labels (avoid duplicates)
                $mergedLabels = array_unique(array_merge($mergedLabels, $dates));

                // Store prices for each grade separately
                if ($numericGrade === 9) {
                    $grade9Data = $filteredTimeseries->pluck('fair_price')->toArray();
                } elseif ($numericGrade === 10) {
                    $grade10Data = $filteredTimeseries->pluck('fair_price')->toArray();
                }
            }

            // Format the merged labels based on the time frame (removing duplicates)
            $mergedLabels = collect($mergedLabels)
                ->sort()
                ->map(function ($date) {
                    if ($this->timeFrame === '6M') {
                        return Carbon::parse($date)->format('M Y'); // Show only month for 6M
                    } elseif (in_array($this->timeFrame, ['1Y', '5Y'])) {
                        return Carbon::parse($date)->format('M Y'); // Month and year for 1Y and 5Y
                    } else {
                        return Carbon::parse($date)->format('M d, Y'); // Full date for All
                    }
                })
                ->toArray();

            // Set the chart data with merged labels and separate price arrays
            $this->saleChartData['labels'] = $mergedLabels;
            $this->saleChartData['grade9Prices'] = $grade9Data;
            $this->saleChartData['grade10Prices'] = $grade10Data;
        } else {
            Log::info('No data found for the selected grades.');
        }
    }
}; ?>

<div wire:ignore>
    <div class="flex justify-between items-center mb-5" x-data="{ timeFrame: $wire.entangle('timeFrame').live, timeFrameAvailability: $wire.entangle('timeFrameAvailability').live }">
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
        <canvas id="myChart2"></canvas>
    </div>
</div>

@script
    <script>
        const ctx = document.getElementById('myChart2');

        // Convert the labels to an array
        const labelsArray = Array.isArray($wire.saleChartData.labels) ? $wire.saleChartData.labels : Object.values($wire
            .saleChartData.labels);
        const grade9Data = $wire.saleChartData.grade9Prices;
        const grade10Data = $wire.saleChartData.grade10Prices;
        const transactionData = $wire.saleChartData.transactions;

        // Initialize the chart with empty data arrays first
        const data = {
            labels: labelsArray,
            datasets: [{
                    label: 'PSA 9',
                    data: grade9Data,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y', // Link this dataset to the primary Y axis (left)
                },
                {
                    label: 'PSA 10',
                    data: grade10Data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y', // Link this dataset to the primary Y axis (left)
                },
                {
                    label: 'Volume',
                    data: transactionData,
                    borderColor: 'rgba(75, 192, 75, 1)', // Green border color
                    backgroundColor: 'rgba(75, 192, 75, 0.5)', // Green with 50% transparency for background
                    stack: 'combined',
                    type: 'bar',
                    yAxisID: 'y1' // Link this dataset to the secondary Y axis (right)
                }
            ]
        };

        const myChart2 = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        stacked: true, // Stack the line charts on the left axis
                        beginAtZero: true // Ensure the y-axis starts at zero for line charts
                    },
                    y1: {
                        type: 'linear',
                        position: 'right', // Position this Y axis on the right side
                        stacked: false, // No need to stack the bar data
                        beginAtZero: true, // Start at zero for the bar chart
                        grid: {
                            drawOnChartArea: false // Avoid grid lines overlapping with the left Y-axis
                        }
                    }
                }
            }
        });

        // Listen for Livewire event to update chart with new data
        Livewire.on('saleChartDataUpdated', () => {
            // Update chart data with new values
            myChart2.data.datasets[2].data = $wire.saleChartData.transactions;
            myChart2.update();
        });
    </script>
@endscript
