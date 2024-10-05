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
        'All' => true, // Default is 'All'
    ];

    public $saleChartData = [
        'labels' => [],
        'grade9Prices' => [],
        'grade10Prices' => [],
        'transactions' => [],
    ];

    public function mount()
    {
        // When mounting, load all data (default view)
        $this->getChartData();
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
        // Refresh chart data when the time frame is changed
        $this->refreshChartData();
    }

    private function refreshChartData()
    {
        $this->getChartData();
        $this->dispatch('saleChartDataUpdated');
    }

    private function getChartData()
    {
        // Filter the price data and transactions based on allowed grades
        $filteredPriceData = $this->filterPriceData([9, 10]);
        $grade9PriceData = $this->extractGradePriceData($filteredPriceData, 9);
        $grade10PriceData = $this->extractGradePriceData($filteredPriceData, 10);
        $filteredTransactionData = $this->filterTransactionData();

        // Generate labels for the chart based on the selected time frame
        $commonLabels = $this->generateCommonLabels($filteredPriceData, $filteredTransactionData);
        // Log::info($commonLabels);
        $this->saleChartData['labels'] = $this->formatLabels($commonLabels);

        // Populate the data for chart series
        $this->saleChartData['grade9Prices'] = $this->fillData($grade9PriceData, 'fair_price');
        $this->saleChartData['grade10Prices'] = $this->fillData($grade10PriceData, 'fair_price');
        $this->saleChartData['transactions'] = $this->fillData($filteredTransactionData, 'transaction_count');

        Log::info($this->saleChartData);
    }

    private function filterPriceData(array $allowedGrades)
    {
        return collect($this->cardPricesTimeseries)->filter(function ($item) use ($allowedGrades) {
            return in_array((int) preg_replace('/[^0-9]/', '', $item['psa_grade']), $allowedGrades);
        });
    }

    private function extractGradePriceData($filteredPriceData, $grade)
    {
        return $filteredPriceData->firstWhere('psa_grade', $grade);
    }

    private function filterTransactionData()
    {
        $numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);
        return collect($this->cardTransactionTimeseries)->firstWhere('psa_grade', $numericGrade);
    }

    private function generateCommonLabels($filteredPriceData, $filteredTransactionData)
    {
        $labels = $this->extractLabelsFromTimeseries($filteredPriceData, 'timeseries_data');

        if ($filteredTransactionData) {
            $labels = array_merge($labels, $this->extractLabelsFromTimeseries([$filteredTransactionData], 'timeseries_data'));
        }

        // If timeFrame is 'ALL', we show all labels
        if ($this->timeFrame === 'ALL') {
            return collect(array_unique($labels))->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))->sort()->toArray();
        }

        // Otherwise, limit labels based on the selected time frame
        $lastDate = collect($labels)->max(); // Find the last available date
        $startDate = $this->getStartDate($lastDate); // Calculate start date based on time frame

        return collect($labels)->filter(fn($date) => Carbon::parse($date)->greaterThanOrEqualTo($startDate))->unique()->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))->sort()->toArray();
    }

    private function extractLabelsFromTimeseries($data, $key)
    {
        return collect($data)
            ->flatMap(function ($item) use ($key) {
                return collect($item[$key])
                    ->pluck('date')
                    ->toArray();
            })
            ->toArray();
    }

    private function formatLabels($commonLabels)
    {
        return array_values(
            collect($commonLabels)
                ->map(function ($date) {
                    $format = 'M d, Y';
                    return Carbon::parse($date)->format($format);
                })
                ->toArray(),
        );
    }

    private function fillData($data, $field)
    {
        if (!$data) {
            return [];
        }

        $timeseries = collect($data['timeseries_data'])->sortBy('date');

        $dataByDate = $timeseries->pluck($field, 'date')->mapWithKeys(function ($value, $date) {
            return [Carbon::parse($date)->format('Y-m-d') => $value];
        });

        // Ensure that the date formats used in the labels match the ones in dataByDate
        return collect($this->saleChartData['labels'])
            ->map(function ($label) use ($dataByDate) {
                try {
                    // Use the proper date format based on time frame and label format
                    $originalDate = Carbon::createFromFormat('M d, Y', $label)->format('Y-m-d');

                    // Match the data based on the parsed date and return the value or 0
                    return $dataByDate[$originalDate] ?? 0;
                } catch (\Exception $e) {
                    // Handle any parsing exceptions and return 0 if dates don't match
                    return 0;
                }
            })
            ->toArray();
    }

    private function getStartDate($lastAvailableDate)
    {
        switch ($this->timeFrame) {
            case '6M':
                return Carbon::parse($lastAvailableDate)->subMonths(6); // 6 months from the last available date
            case '1Y':
                return Carbon::parse($lastAvailableDate)->subYear(); // 1 year from the last available date
            case '5Y':
                return Carbon::parse($lastAvailableDate)->subYears(5); // 5 years from the last available date
            default:
                return Carbon::parse($lastAvailableDate); // For 'ALL', just return the last available date
        }
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
