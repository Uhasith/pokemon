<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public $card;
    public $populations;
    public $cardPricesTimeseries;
    public $cardTransactionTimeseries;
}; ?>

<div class="max-w-5xl mx-auto">
    <div class="my-8 flex justify-center">
        <a href="#graph" class="font-manrope font-bold text-center text-2xl lg:text-3xl text-white">
            Market Price History
        </a>
    </div>
    <div>
        <div class="border-gray-200 dark:border-gray-700">
            <div class="p-4 rounded-xl bg-grayish">
                <livewire:pages.components.charts.sale-chart :card="$card" :cardPricesTimeseries="$cardPricesTimeseries"
                    :cardTransactionTimeseries="$cardTransactionTimeseries">
            </div>

        </div>
    </div>
    {{-- <div>
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
            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="hidden p-4 rounded-b-xl bg-grayish" id="styled-profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <livewire:pages.components.charts.price-chart :card="$card" :populations="$populations" :cardPricesTimeseries="$cardPricesTimeseries"
                    :cardTransactionTimeseries="$cardTransactionTimeseries">
            </div>
            <div class="hidden p-4 rounded-b-xl bg-grayish" id="styled-dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <livewire:pages.components.charts.sale-chart :card="$card" :populations="$populations" :cardPricesTimeseries="$cardPricesTimeseries"
                    :cardTransactionTimeseries="$cardTransactionTimeseries">
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
    </div> --}}
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endassets
