<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public $card,
        $populations = [],
        $cardPricesTimeseries,
        $cardTransactionTimeseries;
    public $chartGrade;
    public $numericGrade = 10;
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
        $this->populations = $this->getAvailableGrades();
        $this->chartGrade = $this->populations[0] ?? null;
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

    // Dynamically retrieve the grades that have price and transaction data
    private function getAvailableGrades()
    {
        $gradesWithPriceData = collect($this->cardPricesTimeseries)
            ->groupBy('psa_grade') // Group by 'psa_grade'
            ->filter(function ($items) {
                // Check if 'timeseries_data' exists in each item and count the valid entries inside it
                return $items
                    ->filter(function ($item) {
                        return isset($item['timeseries_data']) && count($item['timeseries_data']) > 5; // Only include if timeseries_data has more than 5 values
                    })
                    ->isNotEmpty();
            })
            ->keys() // Extract only the keys (psa_grade values)
            ->map(fn($grade) => 'PSA' . (int) preg_replace('/[^0-9]/', '', $grade)) // Format as 'PSA9', 'PSA10'
            ->toArray();

        // Sort the grades in descending order
        usort($gradesWithPriceData, function ($a, $b) {
            return (int) preg_replace('/[^0-9]/', '', $b) - (int) preg_replace('/[^0-9]/', '', $a);
        });

        return $gradesWithPriceData;
    }

    // Loads and prepares chart data based on the selected time frame
    private function loadChartData()
    {
        $this->numericGrade = (int) preg_replace('/[^0-9]/', '', $this->chartGrade);
        $filteredPriceData = $this->filterPriceData([$this->numericGrade]);
        $filteredTransactionData = $this->filterTransactionData();

        $this->saleChartData['labels'] = $this->getFormattedLabels($filteredPriceData, $filteredTransactionData);
        $this->saleChartData['gradePrices'] = $this->mapDataToLabels($filteredPriceData, 'fair_price', $this->numericGrade);
        // $this->saleChartData['grade9Prices'] = $this->mapDataToLabels($filteredPriceData, 'fair_price', 9);
        // $this->saleChartData['grade10Prices'] = $this->mapDataToLabels($filteredPriceData, 'fair_price', 10);
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
        return collect($this->cardTransactionTimeseries)->firstWhere('psa_grade', $this->numericGrade);
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
            ->flatMap(function ($item) {
                // Ensure timeseries_data exists before accessing it
                return isset($item['timeseries_data'])
                    ? collect($item['timeseries_data'])
                        ->pluck('date')
                        ->toArray()
                    : [];
            })
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

        // Check if 'timeseries_data' exists before processing
        if (!isset($filteredData['timeseries_data'])) {
            return array_fill(0, count($this->saleChartData['labels']), 0); // Return 0-filled array
        }

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
        $this->timeFrameAvailability['ALL'] = count($this->getFormattedLabels($this->filterPriceData([$this->numericGrade]), $this->filterTransactionData())) > 0;
    }

    // Helper function to check if a given time frame has at least 5 labels
    private function hasSufficientDataForTimeFrame($timeFrame)
    {
        $originalTimeFrame = $this->timeFrame;
        $this->timeFrame = $timeFrame;
        $labels = $this->getFormattedLabels($this->filterPriceData([$this->numericGrade]), $this->filterTransactionData());
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
        <div class="flex items-center gap-5">
            <x-wui-checkbox id="label" label="Volume" wire:model.live="showableCharts" value="VOLUME" />
            {{-- <x-wui-checkbox id="label" label="PSA 9" wire:model.live="showableCharts" value="PSA9" />
            <x-wui-checkbox id="label" label="PSA 10" wire:model.live="showableCharts" value="PSA10" /> --}}
            <x-wui-select placeholder="Select Grades" wire:model.live='chartGrade' :clearable="false"
                :options="$populations" />
        </div>
    </div>
    <div id="chart-container" style="width: 100%; margin: auto;" class="h-[40vh] md:h-full">
        <canvas id="myChart2"></canvas>
    </div>
</div>

@script
<script>
    const ctx = document.getElementById('myChart2');

    let labelsArray = $wire.saleChartData.labels.map(dateStr => {
        const date = new Date(dateStr);
        const formatter = new Intl.DateTimeFormat('en', {
            month: 'short',
            year: 'numeric'
        });
        return formatter.format(date).replace(' ', '-');
    });
    let gradeData = $wire.saleChartData.gradePrices ?? [];
    let transactionData = $wire.showableCharts.includes('VOLUME') ? $wire.saleChartData.transactions : [];

    const datasets = [{
        label: $wire.chartGrade ? $wire.chartGrade : '',
        data: gradeData,
        backgroundColor: 'rgba(255, 165, 0, 0.2)',
        borderColor: 'rgba(255, 165, 0, 1)',
        stack: 'combined',
        type: 'line',
        yAxisID: 'y',
        tension: 0.5,
        pointRadius: 3,
        pointBackgroundColor: 'rgba(255, 165, 0, 1)',
        pointBorderColor: 'rgba(255, 165, 0, 1)',
    }];

    if (transactionData.length > 0) {
        datasets.push({
            label: 'Volume',
            data: transactionData,
            borderColor: 'rgba(75, 192, 75, 1)',
            backgroundColor: 'rgba(75, 192, 75, 0.5)',
            stack: 'combined',
            type: 'bar',
            yAxisID: 'y1',
        });
    }

    const data = {
        labels: labelsArray,
        datasets: datasets
    };

    // Options for mobile and tablet devices below 768px
    const mobileAndTabletOptions = {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: 5
        },
        scales: {
            y: {
                type: 'linear',
                position: 'left',
                stacked: true,
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return '$' + value;
                    },
                    font: {
                        size: 10
                    }
                }
            },
            ...(transactionData.length > 0 && {
                y1: {
                    type: 'linear',
                    position: 'right',
                    stacked: false,
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        font: {
                            size: 10
                        }
                    }
                }
            })
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true,
                backgroundColor: '#fff',
                intersect: false,
                titleColor: '#000',
                bodyColor: '#000',
                borderColor: '#ddd',
                borderWidth: 1,
                intersect: false,
                bodyFont: {
                    size: 10
                },
                callbacks: {
                    label: function(tooltipItem) {
                        let price = tooltipItem.raw;
                        return ' Price: $ ' + Number(price).toFixed(2);
                    }
                }
            }
        }
    };

    // Options for desktop (same for above 768px)
    const desktopOptions = {
        responsive: true,
        maintainAspectRatio: true,
        layout: {
            padding: 20
        },
        scales: {
            y: {
                type: 'linear',
                position: 'left',
                stacked: true,
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return '$' + value;
                    },
                    font: {
                        size: 14
                    },
                    maxTicksLimit: 20
                }
            },
            ...(transactionData.length > 0 && {
                y1: {
                    type: 'linear',
                    position: 'right',
                    stacked: false,
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        font: {
                            size: 14
                        },
                        maxTicksLimit: 20
                    }
                }
            })
        },
        plugins: {
            legend: {
                display: true,
                labels: {
                    font: {
                        size: 14
                    }
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: '#fff',
                titleColor: '#000',
                intersect: false,
                bodyColor: '#000',
                borderColor: '#ddd',
                borderWidth: 1,
                bodyFont: {
                    size: 12
                },
                callbacks: {
                    label: function(tooltipItem) {
                        let price = tooltipItem.raw;
                        return ' Price: $ ' + Number(price).toFixed(2);
                    }
                }
            }
        }
    };

    // Function to get the appropriate options based on screen size
    function getChartOptions() {
        return window.innerWidth < 768 ? mobileAndTabletOptions : desktopOptions;
    }

    // Create the chart with initial options based on screen size
    const myChart2 = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: getChartOptions()
    });

    // Listen for window resize and update chart options
    window.addEventListener('resize', () => {
        myChart2.options = getChartOptions();
        myChart2.update();
    });

    // Update chart data when Livewire data changes
    Livewire.on('saleChartDataUpdated', () => {
        myChart2.data.labels = $wire.saleChartData.labels.map(dateStr => {
            const date = new Date(dateStr);
            const formatter = new Intl.DateTimeFormat('en', {
                month: 'short',
                year: 'numeric'
            });
            return formatter.format(date).replace(' ', '-');
        });
        myChart2.data.datasets = [{
            label: $wire.chartGrade ? $wire.chartGrade : '',
            data: $wire.saleChartData.gradePrices ?? [],
            backgroundColor: 'rgba(255, 165, 0, 0.2)',
            borderColor: 'rgba(255, 165, 0, 1)',
            stack: 'combined',
            type: 'line',
            yAxisID: 'y',
            tension: 0.5,
            pointRadius: 3,
            pointBackgroundColor: 'rgba(255, 165, 0, 1)',
            pointBorderColor: 'rgba(255, 165, 0, 1)',
        }];

        const updatedTransactionData = $wire.showableCharts.includes('VOLUME') ? $wire.saleChartData.transactions : [];
        if (updatedTransactionData.length > 0) {
            myChart2.data.datasets.push({
                label: 'Volume',
                data: updatedTransactionData,
                borderColor: 'rgba(75, 192, 75, 1)',
                backgroundColor: 'rgba(75, 192, 75, 0.5)',
                stack: 'combined',
                type: 'bar',
                yAxisID: 'y1',
            });
        }

        myChart2.update();
    });
</script>

@endscript
