<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public $card, $populations, $cardPricesTimeseries, $cardTransactionTimeseries;
    public $chartGrade = 'PSA10';
    public $showableCharts = ['PSA9', 'PSA10'];
    public $timeFrame = 'ALL'; // Default to 'ALL'
    public $timeFrameAvailability = [
        '6M' => true,
        '1Y' => true,
        '5Y' => true,
        'ALL' => true, // Default is 'ALL'
    ];

    public $saleChartData = [
        'labels' => [],
        'grade9Prices' => [],
        'grade10Prices' => [],
        'transactions' => [],
    ];

    public function mount()
    {
        $this->loadChartData();
        $this->checkTimeFrameAvailability();
    }

    public function updatedChartGrade()
    {
        $this->refreshChartData();
    }

    public function updatedShowableCharts()
    {
        $this->dispatch('saleChartDataUpdated');
    }

    public function updatedTimeFrame()
    {
        $this->refreshChartData();
    }

    private function refreshChartData()
    {
        $this->loadChartData();
        $this->dispatch('saleChartDataUpdated');
    }

    // Loads and prepares chart data based on the selected time frame
    private function loadChartData()
    {
        $filteredPriceData = $this->filterPriceData([9, 10]);
        $filteredTransactionData = $this->filterTransactionData();

        $this->saleChartData['labels'] = $this->getFormattedLabels($filteredPriceData, $filteredTransactionData);
        $this->saleChartData['grade9Prices'] = $this->mapDataToLabels($filteredPriceData, 'fair_price', 9);
        $this->saleChartData['grade10Prices'] = $this->mapDataToLabels($filteredPriceData, 'fair_price', 10);
        $this->saleChartData['transactions'] = $this->mapDataToLabels($filteredTransactionData, 'transaction_count');
    }

    // Filters price data based on allowed grades
    private function filterPriceData(array $allowedGrades)
    {
        return collect($this->cardPricesTimeseries)->filter(fn($item) => in_array((int) preg_replace('/[^0-9]/', '', $item['psa_grade']), $allowedGrades));
    }

    // Filters transaction data based on the selected chart grade
    private function filterTransactionData()
    {
        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);
        return collect($this->cardTransactionTimeseries)->firstWhere('psa_grade', $numericGrade);
    }

    // Formats the labels based on the selected time frame and price/transaction data
    private function getFormattedLabels($filteredPriceData, $filteredTransactionData)
    {
        $labels = $this->extractLabelsFromTimeseries($filteredPriceData);

        if ($filteredTransactionData) {
            $labels = array_merge($labels, $this->extractLabelsFromTimeseries([$filteredTransactionData]));
        }

        return $this->filterAndFormatLabels($labels);
    }

    // Filters and formats labels based on the time frame
    private function filterAndFormatLabels(array $labels)
    {
        if ($this->timeFrame === 'ALL') {
            return $this->formatLabels($labels);
        }

        $lastDate = collect($labels)->max(); // Find the latest date
        $startDate = $this->calculateStartDate($lastDate); // Calculate the start date for the selected time frame

        $filteredLabels = collect($labels)->filter(fn($date) => Carbon::parse($date)->greaterThanOrEqualTo($startDate))->unique()->sort()->toArray();

        return $this->formatLabels($filteredLabels);
    }

    // Extracts labels from the timeseries data
    private function extractLabelsFromTimeseries($data)
    {
        return collect($data)
            ->flatMap(
                fn($item) => collect($item['timeseries_data'])
                    ->pluck('date')
                    ->toArray(),
            )
            ->toArray();
    }

    // Formats labels into the required format ('M d, Y')
    private function formatLabels(array $labels)
    {
        return array_values(collect($labels)->map(fn($date) => Carbon::parse($date)->format('M d, Y'))->toArray());
    }

    // Maps data to the corresponding labels for the chart
    private function mapDataToLabels($data, $field, $grade = null)
    {
        if (!$data) {
            return array_fill(0, count($this->saleChartData['labels']), 0); // Return 0-filled array if no data
        }

        $filteredData = $grade ? $this->extractGradePriceData($data, $grade) : $data;
        $timeseries = collect($filteredData['timeseries_data'])->sortBy('date');

        $dataByDate = $timeseries->pluck($field, 'date')->mapWithKeys(function ($value, $date) {
            return [Carbon::parse($date)->format('Y-m-d') => $value];
        });

        return $this->matchDataToLabels($dataByDate);
    }

    // Matches data values with the labels for the chart
    private function matchDataToLabels($dataByDate)
    {
        return collect($this->saleChartData['labels'])
            ->map(function ($label) use ($dataByDate) {
                try {
                    $parsedDate = Carbon::createFromFormat('M d, Y', $label)->format('Y-m-d');
                    return $dataByDate[$parsedDate] ?? 0;
                } catch (\Exception $e) {
                    return 0;
                }
            })
            ->toArray();
    }

    // Calculates the start date for a given time frame
    private function calculateStartDate($lastAvailableDate)
    {
        switch ($this->timeFrame) {
            case '6M':
                return Carbon::parse($lastAvailableDate)->subMonths(6);
            case '1Y':
                return Carbon::parse($lastAvailableDate)->subYear();
            case '5Y':
                return Carbon::parse($lastAvailableDate)->subYears(5);
            default:
                return Carbon::parse($lastAvailableDate);
        }
    }

    // Checks if each time frame has enough data (at least 5 labels) and updates availability
    private function checkTimeFrameAvailability()
    {
        $this->timeFrameAvailability['6M'] = $this->hasSufficientDataForTimeFrame('6M');
        $this->timeFrameAvailability['1Y'] = $this->hasSufficientDataForTimeFrame('1Y');
        $this->timeFrameAvailability['5Y'] = $this->hasSufficientDataForTimeFrame('5Y');
        $this->timeFrameAvailability['ALL'] = count($this->getFormattedLabels($this->filterPriceData([9, 10]), $this->filterTransactionData())) > 0;
    }

    // Helper function to check if a given time frame has at least 5 labels
    private function hasSufficientDataForTimeFrame($timeFrame)
    {
        $originalTimeFrame = $this->timeFrame;
        $this->timeFrame = $timeFrame;
        $labels = $this->getFormattedLabels($this->filterPriceData([9, 10]), $this->filterTransactionData());
        $this->timeFrame = $originalTimeFrame;
        return count($labels) >= 10;
    }

    // Extracts grade-specific price data from the filtered data
    private function extractGradePriceData($filteredPriceData, $grade)
    {
        return $filteredPriceData->firstWhere('psa_grade', $grade);
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
        <div class="flex items-center gap-5">
            {{-- <x-wui-select placeholder="Select Grades" wire:model.live='chartGrade' :options="array_keys($this->populations)" /> --}}
            <x-wui-checkbox id="label" label="Volume" wire:model.live="showableCharts" value="VOLUME" />
            <x-wui-checkbox id="label" label="PSA 9" wire:model.live="showableCharts" value="PSA9" />
            <x-wui-checkbox id="label" label="PSA 10" wire:model.live="showableCharts" value="PSA10" />

        </div>
    </div>
    <div id="chart-container" style="width: 100%; height: auto; margin: auto;">
        <canvas id="myChart2"></canvas>
    </div>
</div>

@script
    <script>
        const ctx = document.getElementById('myChart2');

        // Initial data setup from Livewire
        let labelsArray = $wire.saleChartData.labels;
        let grade9Data = $wire.showableCharts.includes('PSA9') ? $wire.saleChartData.grade9Prices : [];
        let grade10Data = $wire.showableCharts.includes('PSA10') ? $wire.saleChartData.grade10Prices : [];
        let transactionData = $wire.showableCharts.includes('VOLUME') ? $wire.saleChartData.transactionVolumes : [];

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
            myChart2.data.labels = $wire.saleChartData.labels;
            myChart2.data.datasets[0].data = $wire.showableCharts.includes('PSA9') ? $wire.saleChartData
                .grade9Prices : [];
            myChart2.data.datasets[1].data = $wire.showableCharts.includes('PSA10') ? $wire.saleChartData
                .grade10Prices : [];
            myChart2.data.datasets[2].data = $wire.showableCharts.includes('VOLUME') ? $wire.saleChartData
                .transactions : [];

            myChart2.update(); // Refresh the chart
        });
    </script>
@endscript
