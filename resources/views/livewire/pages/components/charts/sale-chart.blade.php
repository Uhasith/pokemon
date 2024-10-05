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
        'grade9Prices' => [],
        'grade10Prices' => [],
        'transactions' => [],
    ];

    public function updatedChartGrade()
    {
        $this->getChartData();
        $this->dispatch('saleChartDataUpdated');
    }

    public function updatedTimeFrame()
    {
        $this->getChartData();
        $this->dispatch('saleChartDataUpdated');
    }

    public function mount()
    {
        $this->getChartData();
    }

    // Generate the common labels from all datasets (Grade 9, Grade 10, and transactions)
    private function generateCommonLabels($filteredPriceData, $filteredTransactionData)
    {
        $labels = [];

        // Get dates from Grade 9 and 10 price data
        foreach ($filteredPriceData as $data) {
            $timeseries = collect($data['timeseries_data'])->sortBy('date'); // Sort by date (old to newest)
            $startDate = $this->getStartDate($timeseries->first()['date']);
            $filteredTimeseries = $this->filterTimeseriesByDate($timeseries, $startDate);
            $labels = array_merge($labels, $filteredTimeseries->pluck('date')->toArray());
        }

        // Get dates from transaction data
        if (!empty($filteredTransactionData)) {
            $timeseries = collect($filteredTransactionData['timeseries_data'])->sortBy('date'); // Sort by date (old to newest)
            $filteredTimeseries = $this->filterTimeseriesByDate($timeseries, $this->getStartDate($timeseries->first()['date']));
            $labels = array_merge($labels, $filteredTimeseries->pluck('date')->toArray());
        }

        // Remove duplicates and sort dates (in 'Y-m-d' format)
        $uniqueSortedLabels = collect(array_unique($labels))
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d'); // Keep in 'Y-m-d' format for sorting
            })
            ->sort() // Sort the dates from oldest to newest in 'Y-m-d' format
            ->toArray();

        return $uniqueSortedLabels; // Return the sorted labels in 'Y-m-d' format
    }

    public function getChartData()
    {
        $allowedGrades = [9, 10];
        $filteredPriceData = collect($this->cardPricesTimeseries)->filter(function ($item) use ($allowedGrades) {
            return in_array((int) preg_replace('/[^0-9]/', '', $item['psa_grade']), $allowedGrades);
        });

        $grade9PriceData = collect($filteredPriceData)
            ->filter(function ($item) {
                return $item['psa_grade'] == 9;
            })
            ->first(); // Get first matching grade 9 data

        $grade10PriceData = collect($filteredPriceData)
            ->filter(function ($item) {
                return $item['psa_grade'] == 10;
            })
            ->first(); // Get first matching grade 10 data

        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);
        $filteredTransactionData = collect($this->cardTransactionTimeseries)
            ->filter(function ($item) use ($numericGrade) {
                return $item['psa_grade'] == $numericGrade;
            })
            ->first();

        // Generate the common labels from both price and transaction data
        $commonLabels = $this->generateCommonLabels($filteredPriceData, $filteredTransactionData);

        // Now format labels for display, but keep the internal 'Y-m-d' format for sorting
        $this->saleChartData['labels'] = array_values(
            collect($commonLabels)
                ->map(function ($date) {
                    // Format labels depending on the time frame
                    if ($this->timeFrame === '6M') {
                        return Carbon::parse($date)->format('M Y');
                    } elseif (in_array($this->timeFrame, ['1Y', '5Y'])) {
                        return Carbon::parse($date)->format('M Y');
                    } else {
                        return Carbon::parse($date)->format('M d, Y');
                    }
                })
                ->toArray(), // Ensures that the output is an array
        );

        $grade9Data = [];
        $grade10Data = [];
        $transactionData = [];

        // Populate Price Data for Grade 9 (extract the timeseries_data first)
        if (!empty($grade9PriceData)) {
            $grade9Timeseries = collect($grade9PriceData['timeseries_data'])->sortBy('date');
            $grade9Data = $this->fillDataByCommonDates($grade9Timeseries, 'fair_price');
        }

        // Populate Price Data for Grade 10 (extract the timeseries_data first)
        if (!empty($grade10PriceData)) {
            $grade10Timeseries = collect($grade10PriceData['timeseries_data'])->sortBy('date');
            $grade10Data = $this->fillDataByCommonDates($grade10Timeseries, 'fair_price');
        }

        // Populate Transaction Data
        if (!empty($filteredTransactionData)) {
            $transactionTimeseries = collect($filteredTransactionData['timeseries_data'])->sortBy('date'); // Sort by date (old to newest)
            $transactionData = $this->fillDataByCommonDates($transactionTimeseries, 'transaction_count');
        }

        // Assign the generated datasets
        $this->saleChartData['grade9Prices'] = $grade9Data;
        $this->saleChartData['grade10Prices'] = $grade10Data;
        $this->saleChartData['transactions'] = $transactionData;
    }

    private function getStartDate($oldestDate)
    {
        switch ($this->timeFrame) {
            case '6M':
                return Carbon::now()->subMonths(6);
            case '1Y':
                return Carbon::now()->subYear();
            case '5Y':
                return Carbon::now()->subYears(5);
            default:
                return Carbon::parse($oldestDate);
        }
    }

    private function filterTimeseriesByDate($timeseries, $startDate)
    {
        return $timeseries
            ->filter(function ($item) use ($startDate) {
                $date = Carbon::parse($item['date']);
                return $date->greaterThanOrEqualTo($startDate);
            })
            ->sortBy('date');
    }

    // This method will align the data to the common labels, filling gaps with 0
    private function fillDataByCommonDates($timeseries, $field)
    {
        // Create a dictionary where the keys are the original dates in 'Y-m-d' format
        $dataByDate = $timeseries
            ->mapWithKeys(function ($item) use ($field) {
                $date = Carbon::parse($item['date'])->format('Y-m-d');
                return [$date => $item[$field]];
            })
            ->toArray();

        $filledData = [];

        foreach ($this->saleChartData['labels'] as $label) {
            // Parse the label back to 'Y-m-d' for accurate comparison
            $originalDate = Carbon::createFromFormat('M d, Y', $label)->format('Y-m-d');
            // Add the data in the correct order based on the sorted labels
            $filledData[] = $dataByDate[$originalDate] ?? 0; // If no value exists, default to 0
        }

        return $filledData;
    }
};
?>

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

        // Initial data setup from Livewire
        let labelsArray = $wire.saleChartData.labels;
        let grade9Data = $wire.saleChartData.grade9Prices;
        let grade10Data = $wire.saleChartData.grade10Prices;
        let transactionData = $wire.saleChartData.transactions;

        // Define the chart data
        const data = {
            labels: labelsArray,
            datasets: [{
                    label: 'PSA 9',
                    data: grade9Data,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y', // Link to primary Y axis (left)
                },
                {
                    label: 'PSA 10',
                    data: grade10Data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y', // Link to primary Y axis (left)
                },
                {
                    label: 'Volume',
                    data: transactionData,
                    borderColor: 'rgba(75, 192, 75, 1)', // Green border color
                    backgroundColor: 'rgba(75, 192, 75, 0.5)', // Green with 50% transparency
                    stack: 'combined',
                    type: 'bar',
                    yAxisID: 'y1' // Link to secondary Y axis (right)
                }
            ]
        };

        // Create the chart
        const myChart2 = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        stacked: true, // Stack line charts
                        beginAtZero: true, // Ensure the y-axis starts at zero
                    },
                    y1: {
                        type: 'linear',
                        position: 'right', // Position secondary Y axis on the right
                        stacked: false, // No stacking for bar chart
                        beginAtZero: true, // Start at zero for the bar chart
                        grid: {
                            drawOnChartArea: false // Prevent grid lines from overlapping with the left Y-axis
                        }
                    }
                }
            }
        });

        // Listen for Livewire event to update chart with new data
        Livewire.on('saleChartDataUpdated', () => {
            // Update chart data with new values from Livewire
            myChart2.data.labels = $wire.saleChartData.labels;
            myChart2.data.datasets[0].data = $wire.saleChartData.grade9Prices; // Update PSA 9 data
            myChart2.data.datasets[1].data = $wire.saleChartData.grade10Prices; // Update PSA 10 data
            myChart2.data.datasets[2].data = $wire.saleChartData.transactions; // Update Volume data
            myChart2.update(); // Refresh the chart
        });
    </script>
@endscript
