<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Url;
use App\Models\PokeCard;
use App\Models\PokeAllCard;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Lazy;
use App\Actions\Cards\GetCardLatestFairPrice;
use App\Actions\Cards\GetCardPopulationPrices;
use App\Actions\Cards\GetCardPopulationData;

new class extends Component {
    public $card_id;
    public $card;
    public $relatedAllCard;
    public $cardPricesTimeseries = [];
    public $cardTransactionTimeseries = [];
    public $population;
    public $totalPopulation;
    public $populations = [];
    public $prices = [];
    public $imageUrl;

    public function mount($slug, $setSlug)
    {
        // Log::info($slug);
        // Log::info($setSlug);
        // Load the card with necessary relationships and sort populations by date_checked
        $this->card = PokeCard::where('slug', $slug)
            ->where('set_slug', $setSlug)
            ->with([
                'tcg',
                'populations' => function ($query) {
                    $query->orderBy('date_checked', 'desc')->limit(1);
                },
                'card_prices',
                'price_timeseries',
                'transaction_timeseries',
                'all_card',
                'set',
            ])
            ->first();

        // Log::info($this->card->set->set_name);

        if (!$this->card) {
            $this->redirectRoute('set-index');
        }

        $this->card_id = $this->card->card_id;

        Log::info($this->card_id);

        $this->relatedAllCard = $this->card->all_card;

        if ($this->relatedAllCard) {
            $this->imageUrl = $this->relatedAllCard->images['large'];
        }

        // Initialize the timeseries data and population from the related data
        $this->cardPricesTimeseries = $this->card->price_timeseries->toArray();
        $this->cardTransactionTimeseries = $this->card->transaction_timeseries->toArray();
        $this->population = $this->card->populations->first();

        // Instantiate action classes
        $getCardpopulationPricesAction = new GetCardPopulationPrices();
        $getCardPopulationDataAction = new GetCardPopulationData();

        // Populate prices with the latest fair prices using the action class
        $this->prices = $getCardpopulationPricesAction->handle($this->cardPricesTimeseries);

        // Populate populations from the fetched population data
        $this->populations = $getCardPopulationDataAction->handle($this->population);

        $this->totalPopulation = array_sum($this->populations);
    }
}; ?>

<div>
    <div class="w-full bg-darkblackbg" x-init="initFlowbite();">
        <div class="max-w-[1440px] 2xl:max-w-[1500px] bg-darkbg mx-auto relative flex flex-col lg:px-8 xl:px-0">
            <div class="my-12 px-8 lg:px-0">
                <h3 class="flex gap-3 items-center font-manrope">
                    <a href="{{ route('set-index') }}" wire:navigate>
                        <span class="font-medium text-[#908F8C] text-sm cursor-pointer">All Sets</span>
                    </a>
                    <span>
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path
                                    d="M6 12.5L9.46967 9.03033C9.71967 8.78033 9.84467 8.65533 9.84467 8.5C9.84467 8.34467 9.71967 8.21967 9.46967 7.96967L6 4.5"
                                    stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </span>
                    <a href="{{ route('set-details', ['slug' => $this->card->set->slug]) }}" wire:navigate>
                        <span
                            class="font-medium text-[#908F8C] text-sm cursor-pointer">{{ $this->card->set->set_name }}</span>
                    </a>
                    <span>
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path
                                    d="M6 12.5L9.46967 9.03033C9.71967 8.78033 9.84467 8.65533 9.84467 8.5C9.84467 8.34467 9.71967 8.21967 9.46967 7.96967L6 4.5"
                                    stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </span>
                    <span class="font-semibold text-white text-sm">{{ $this->card->card_number }}
                        {{ $this->card->name }}</span>
                </h3>
            </div>

            <div class="flex gap-4 flex-col lg:flex-row lg:flex-wrap xl:flex-nowrap items-center lg:items-start">
                {{-- left Image section --}}
                <div class="w-4/5 lg:w-3/12 xl:w-[25%] xl:mx-auto">
                    <div class="flex w-full">
                        {{-- <div class="p-8 rounded-2xl bg-[radial-gradient(81.7%_81.7%_at_10.35%_28.75%,_#7E6A7E_8.33%,_#D5D5D5_37.5%,_#75888A_63.45%,_#896753_100%)] bg-[conic-gradient(from_219.88deg_at_88.77%_56.84%,_#000000_0deg,_#FFFFFF_30deg,_#000000_95.62deg,_#FFFFFF_168.75deg,_#000000_228.75deg,_#FFFFFF_285deg,_#000000_360deg)] bg-blend-screen bg-[conic-gradient(from_219.95deg_at_88.81%_56.89%,_#000000_0deg,_rgba(255,_255,_255,_0.72)_16.88deg,_#000000_88.12deg,_rgba(255,_255,_255,_0.72)_151.87deg,_#000000_225deg,_rgba(255,_255,_255,_0.72)_288.75deg,_#000000_360deg)]"> --}}
                        <div class="p-5 md:p-8 rounded-2xl bg-[#414343] bg-blend-screen">
                            @if ($imageUrl)
                                <x-image :src="$imageUrl" :alt="$card->name" skeltonWidth="280" skeltonHeight="390" />
                            @else
                                <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                    style="width: 280px; height: 390px;">
                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="relative">
                            <div
                                class="bg-[#3D3D3D] p-3 rounded-full w-auto absolute top-[50px] -ml-[20px] border-[5px] border-[solid] border-[#212121]">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="flex gap-3 my-3 flex-col xl:flex-row">
                        <button
                            class="w-full xl:w-1/2 bg-yellowish rounded-lg text-center flex gap-3 items-center justify-center marker p-2 xl:p-3">
                            <span><svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.4114 9.95108C19.2496 9.59309 18.8931 9.36304 18.5002 9.36304C18.1074 9.36304 17.7509 9.59309 17.589 9.95108L14.5988 16.565C14.5448 16.5994 14.4918 16.6378 14.4401 16.6806C14.2377 16.8481 14.0899 17.0552 13.9785 17.2833C13.764 17.7224 13.7027 18.1362 13.7854 18.5792C13.853 18.9417 14.0188 19.3086 14.1754 19.655L14.1983 19.7057C14.9887 21.4573 16.5767 22.7498 18.5 22.7498C20.4232 22.7498 22.0112 21.4573 22.8017 19.7057L22.8246 19.655C22.9812 19.3086 23.147 18.9417 23.2146 18.5792C23.2973 18.1362 23.236 17.7224 23.0215 17.2833C22.9101 17.0552 22.7622 16.8481 22.5599 16.6806C22.5085 16.638 22.4557 16.5998 22.4019 16.5655L19.4114 9.95108ZM20.0643 16.2498L18.5002 12.7904L16.9362 16.2498H20.0643Z"
                                        fill="#1B1B1B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.41145 9.95108C7.2496 9.59309 6.89312 9.36304 6.50025 9.36304C6.10737 9.36304 5.75089 9.59309 5.58904 9.95108L2.59883 16.565C2.54479 16.5994 2.49175 16.6378 2.44007 16.6806C2.23775 16.8481 2.08994 17.0552 1.97848 17.2833C1.76399 17.7224 1.70274 18.1362 1.78538 18.5792C1.85301 18.9417 2.01881 19.3086 2.17537 19.655L2.1983 19.7057C2.98874 21.4573 4.57675 22.7498 6.5 22.7498C8.42325 22.7498 10.0112 21.4573 10.8017 19.7057L10.8246 19.655C10.9812 19.3086 11.147 18.9417 11.2146 18.5792C11.2973 18.1362 11.236 17.7224 11.0215 17.2833C10.9101 17.0552 10.7622 16.8481 10.5599 16.6806C10.5085 16.638 10.4557 16.5998 10.4019 16.5655L7.41145 9.95108ZM8.06425 16.2498L6.50025 12.7904L4.93624 16.2498H8.06425Z"
                                        fill="#1B1B1B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5 3.24976C11.9477 3.24976 11.5 3.69747 11.5 4.24976C11.5 4.80204 11.9477 5.24976 12.5 5.24976C13.0523 5.24976 13.5 4.80204 13.5 4.24976C13.5 3.69747 13.0523 3.24976 12.5 3.24976ZM14.9599 5.96739C15.3003 5.48083 15.5 4.88861 15.5 4.24976C15.5 2.5929 14.1569 1.24976 12.5 1.24976C10.8431 1.24976 9.5 2.5929 9.5 4.24976C9.5 4.88861 9.69969 5.48083 10.0401 5.96739C9.37632 6.37274 8.76496 6.93996 8.22872 7.64364C7.37158 8.76843 6.41278 9.24976 5.5482 9.24976H4.5C3.94772 9.24976 3.5 9.69747 3.5 10.2498C3.5 10.802 3.94772 11.2498 4.5 11.2498H5.5482C7.21055 11.2498 8.70343 10.3204 9.81948 8.85587C10.6995 7.7011 11.6604 7.24976 12.5 7.24976C13.3396 7.24976 14.3005 7.7011 15.1805 8.85587C16.2966 10.3204 17.7895 11.2498 19.4518 11.2498H20.5C21.0523 11.2498 21.5 10.802 21.5 10.2498C21.5 9.69747 21.0523 9.24976 20.5 9.24976H19.4518C18.5872 9.24976 17.6284 8.76843 16.7713 7.64364C16.235 6.93996 15.6237 6.37274 14.9599 5.96739Z"
                                        fill="#1B1B1B" />
                                </svg></span>
                            <span class="text-sm">Compare</span>
                        </button>
                        <button
                            class="w-full xl:w-1/2 border border-yellowish text-yellowish rounded-lg text-center flex gap-1 items-center justify-center p-3">
                            <span><svg width="22" height="23" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.812 1.93059C16.4686 1.74998 14.7479 1.74999 12.5572 1.75H12.4428C10.2521 1.74999 8.53144 1.74998 7.18802 1.93059C5.81137 2.11568 4.71911 2.50272 3.86091 3.36091C3.00272 4.21911 2.61568 5.31137 2.43059 6.68802C2.24998 8.03144 2.24999 9.75212 2.25 11.9428V12.0572C2.24999 14.2479 2.24998 15.9686 2.43059 17.312C2.61568 18.6886 3.00272 19.7809 3.86091 20.6391C4.71911 21.4973 5.81137 21.8843 7.18802 22.0694C8.53144 22.25 10.2521 22.25 12.4428 22.25H12.5572C14.7479 22.25 16.4686 22.25 17.812 22.0694C19.1886 21.8843 20.2809 21.4973 21.1391 20.6391C21.9973 19.7809 22.3843 18.6886 22.5694 17.312C22.75 15.9686 22.75 14.2479 22.75 12.0572V11.9428C22.75 9.7521 22.75 8.03144 22.5694 6.68802C22.3843 5.31137 21.9973 4.21911 21.1391 3.36091C20.2809 2.50272 19.1886 2.11568 17.812 1.93059ZM13.5 8C13.5 7.44772 13.0523 7 12.5 7C11.9477 7 11.5 7.44772 11.5 8V11H8.5C7.94772 11 7.5 11.4477 7.5 12C7.5 12.5523 7.94772 13 8.5 13H11.5V16C11.5 16.5523 11.9477 17 12.5 17C13.0523 17 13.5 16.5523 13.5 16V13H16.5C17.0523 13 17.5 12.5523 17.5 12C17.5 11.4477 17.0523 11 16.5 11H13.5V8Z"
                                        fill="#FFC107" />
                                </svg></span>
                            <span class="text-sm">Add to Portfolio</span>
                        </button>
                    </div>
                    <div class="flex flex-col gap-3 my-3">
                        <button
                            class="w-full border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-start p-2 xl:p-3">
                            <span>
                                <svg width="59" height="36" viewBox="0 0 59 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="59" height="36" rx="5" fill="#FFC107" />
                                    <g clip-path="url(#clip0_318_18895)">
                                        <path
                                            d="M12.9482 12.9287C9.70369 12.9287 7 14.2724 7 18.3269C7 21.5389 8.81806 23.5615 13.0319 23.5615C17.9918 23.5615 18.3097 20.3717 18.3097 20.3717H15.9065C15.9065 20.3717 15.3912 22.0893 12.8853 22.0893C10.8443 22.0893 9.37641 20.7432 9.37641 18.8566H18.5612V17.6726C18.5612 15.8061 17.3475 12.9287 12.9482 12.9287ZM12.8643 14.4418C14.8071 14.4418 16.1316 15.6038 16.1316 17.3454H9.4295C9.4295 15.4964 11.1584 14.4418 12.8643 14.4418Z"
                                            fill="#1B1B1B" />
                                        <path
                                            d="M18.5598 9.00293V21.5258C18.5598 22.2366 18.5078 23.2347 18.5078 23.2347H20.8C20.8 23.2347 20.8824 22.5179 20.8824 21.8627C20.8824 21.8627 22.0149 23.5926 25.0943 23.5926C28.3371 23.5926 30.5398 21.3944 30.5398 18.2455C30.5398 15.3158 28.5166 12.9596 25.0996 12.9596C21.8998 12.9596 20.9056 14.6465 20.9056 14.6465V9.00293H18.5598ZM24.5079 14.5085C26.71 14.5085 28.1104 16.1042 28.1104 18.2455C28.1104 20.5416 26.4931 22.0437 24.5237 22.0437C22.1734 22.0437 20.9056 20.2519 20.9056 18.2658C20.9056 16.4152 22.0431 14.5085 24.5079 14.5085Z"
                                            fill="#1B1B1B" />
                                        <path
                                            d="M36.2371 12.9287C31.3561 12.9287 31.043 15.5379 31.043 15.955H33.4725C33.4725 15.955 33.5999 14.4317 36.0696 14.4317C37.6744 14.4317 38.918 15.1489 38.918 16.5275V17.0183H36.0696C32.2882 17.0183 30.2891 18.0983 30.2891 20.2901C30.2891 22.4469 32.1361 23.6204 34.6324 23.6204C38.0343 23.6204 39.1302 21.7852 39.1302 21.7852C39.1302 22.5152 39.1877 23.2345 39.1877 23.2345H41.3475C41.3475 23.2345 41.2639 22.3429 41.2639 21.7725V16.8419C41.2639 13.609 38.5928 12.9287 36.2371 12.9287ZM38.918 18.4905V19.1448C38.918 19.9982 38.3785 22.12 35.203 22.12C33.4641 22.12 32.7186 21.2727 32.7186 20.2899C32.7186 18.502 35.2292 18.4905 38.918 18.4905Z"
                                            fill="#1B1B1B" />
                                        <path
                                            d="M39.9531 13.3379H42.6863L46.6089 21.0104L50.5224 13.3379H52.9984L45.8699 26.9973H43.2727L45.3297 23.1895L39.9531 13.3379Z"
                                            fill="#1B1B1B" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_318_18895">
                                            <rect width="46" height="18" fill="white"
                                                transform="translate(7 9)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <span class="text-sm">Buy the card right now on ebay</span>
                        </button>
                        <button
                            class="w-full border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-start p-2 xl:p-3">
                            <span>
                                <svg width="59" height="36" viewBox="0 0 59 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="59" height="36" rx="5" fill="#FFC107" />
                                    <rect width="24" height="28" transform="matrix(-1 0 0 1 42 4)"
                                        fill="url(#pattern0_318_18904)" />
                                    <defs>
                                        <pattern id="pattern0_318_18904" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_318_18904"
                                                transform="matrix(0.00746269 0 0 0.00639659 0 0.0202559)" />
                                        </pattern>
                                        <image id="image0_318_18904" width="134" height="150"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                            </span>
                            <span class="text-sm">Buy the card right now on TCG player </span>
                        </button>
                    </div> --}}
                </div>

                {{-- right content section --}}
                <div class="w-4/5 mx-auto lg:w-8/12 xl:w-[60%] xl:px-3 lg:ml-8 xl:ml-5">
                    <div>
                        <h1 class="font-manrope text-3xl lg:text-4xl font-bold text-white">
                            {{ $card?->name }} - ({{ $card?->card_number }} /
                            {{ $relatedAllCard?->set['printedTotal'] ?? 0 }})
                        </h1>
                        <h2 class="font-manrope font-medium text-3xl text-white mt-2">
                            {{ $relatedAllCard?->set['name'] }}</h2>
                    </div>
                    <div class="flex flex-row gap-2 items-center justify-start my-3">

                        <a href="#"
                            class="flex gap-2 items-center justify-center text-yellowish font-manrope font-medium text-sm">
                            <span>All versions</span>
                            <span><svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.66602 7.83337L14.666 1.83337M14.666 1.83337H11.1035M14.666 1.83337V5.39587"
                                        stroke="#FFC107" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M14.6673 8.50004C14.6673 11.6427 14.6673 13.2141 13.691 14.1904C12.7147 15.1667 11.1433 15.1667 8.00065 15.1667C4.85795 15.1667 3.28661 15.1667 2.3103 14.1904C1.33398 13.2141 1.33398 11.6427 1.33398 8.50004C1.33398 5.35734 1.33398 3.786 2.3103 2.80968C3.28661 1.83337 4.85795 1.83337 8.00065 1.83337"
                                        stroke="#FFC107" stroke-width="1.5" stroke-linecap="round" />
                                </svg></span>
                        </a>
                    </div>

                    <div>
                        <div class="mb-4 border-b border-evengray">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                                data-tabs-toggle="#default-styled-tab-content"
                                data-tabs-active-classes="text-yellowish hover:text-yellowish dark:text-purple-500 dark:hover:text-purple-500 border-yellowish dark:border-yellowish"
                                data-tabs-inactive-classes="text-white hover:text-yellowish dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg" id="prices-styled-tab"
                                        data-tabs-target="#styled-prices" type="button" role="tab"
                                        aria-controls="prices" aria-selected="false">Prices</button>
                                </li>
                                {{-- <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish"
                                        id="market-styled-tab" data-tabs-target="#styled-market" type="button"
                                        role="tab" aria-controls="market" aria-selected="false" disabled>Market</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish"
                                        id="auctions-styled-tab" data-tabs-target="#styled-auctions" type="button"
                                        role="tab" aria-controls="auctions"
                                        aria-selected="false" disabled>Auctions</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish"
                                        id="details-styled-tab" data-tabs-target="#styled-details" type="button"
                                        role="tab" aria-controls="details" aria-selected="false" disabled>Details</button>
                                </li> --}}
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">
                            <div class="hidden" id="styled-prices" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="relative overflow-x-auto sm:rounded-lg">
                                    {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                        <thead class="text-xs text-white uppercase bg-evengray">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    PSA
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Ungraded
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Grade 7
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Grade 8
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Grade 9
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    PSA 10
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                    eBay
                                                </th>
                                                <td class="px-6 py-4">
                                                    N/A
                                                </td>
                                                <td class="px-6 py-4">
                                                    $79.94
                                                </td>
                                                <td class="px-6 py-4">
                                                    $106.98
                                                </td>
                                                <td class="px-6 py-4">
                                                    $129.55
                                                </td>
                                                <td class="px-6 py-4">
                                                    $270.00
                                                </td>
                                            </tr>
                                            <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                    AliExpress
                                                </th>
                                                <td class="px-6 py-4">
                                                    N/A
                                                </td>
                                                <td class="px-6 py-4">
                                                    $79.94
                                                </td>
                                                <td class="px-6 py-4">
                                                    $106.98
                                                </td>
                                                <td class="px-6 py-4">
                                                    $129.55
                                                </td>
                                                <td class="px-6 py-4">
                                                    $270.00
                                                </td>
                                            </tr>
                                            <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                    Population
                                                </th>
                                                <td class="px-6 py-4">
                                                    N/A
                                                </td>
                                                <td class="px-6 py-4">
                                                    $79.94
                                                </td>
                                                <td class="px-6 py-4">
                                                    $106.98
                                                </td>
                                                <td class="px-6 py-4">
                                                    $129.55
                                                </td>
                                                <td class="px-6 py-4">
                                                    $270.00
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table> --}}

                                    <div class="w-full flex flex-col md:flex-row gap-5 my-3">
                                        <div class="w-full md:w-12/12 bg-[#27292B] rounded-xl p-4">
                                            <div class="w-full overflow-x-auto relative">
                                                <div class="flex justify-start w-full mb-3">
                                                    <h2 class="font-manrope font-bold text-base text-white">
                                                        PSA Population price
                                                    </h2>
                                                </div>
                                                <div class="grid grid-cols-10 gap-4 w-full">
                                                    @foreach ($prices as $key => $value)
                                                        <div class="w-28 md:w-full flex flex-col gap-2 justify-center">
                                                            <h4
                                                                class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                                {{ $key }}
                                                            </h4>
                                                            <h4
                                                                class="font-manrope font-semibold text-sm text-white text-start">
                                                                {{ $value }}
                                                            </h4>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="w-full md:w-3/12 bg-[#27292B] rounded-xl p-4">
                                            <div class="w-full relative overflow-x-auto">
                                                <div
                                                    class="flex justify-center w-full mb-3 flex-col gap-1 items-start">
                                                    <h2 class="font-manrope font-bold text-base text-white">Fair Price
                                                    </h2>
                                                    <h2 class="font-manrope font-bold text-lg text-yellowish">$1494.24
                                                    </h2>
                                                    <h2 class="font-manrope font-bold text-sm text-[#BEBFBF]">3D Volume
                                                    </h2>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    @php
                                        // Calculate the percentage of PSA10
                                        $psa10 = $populations['PSA10'] ?? 0;
                                        $totalPopulation = $totalPopulation ?? 1; // Ensure totalPopulation is not zero to avoid division by zero
                                        $percentage = ($psa10 / $totalPopulation) * 100;

                                        // Determine difficulty label and color based on percentage
                                        if ($percentage < 5) {
                                            $difficulty = 'Extremely Hard';
                                            $color = 'text-red-500'; // Extremely hard (red)
                                        } elseif ($percentage < 10) {
                                            $difficulty = 'Very Hard';
                                            $color = 'text-orange-500'; // Very hard (orange)
                                        } elseif ($percentage < 20) {
                                            $difficulty = 'Hard';
                                            $color = 'text-yellow-500'; // Hard (yellow)
                                        } elseif ($percentage < 40) {
                                            $difficulty = 'Moderate';
                                            $color = 'text-blue-500'; // Moderate (blue)
                                        } elseif ($percentage < 60) {
                                            $difficulty = 'Easy';
                                            $color = 'text-green-500'; // Easy (green)
                                        } else {
                                            $difficulty = 'Very Easy';
                                            $color = 'text-indigo-500'; // Very Easy (indigo)
                                        }

                                        // PSA10 and PSA9 values, ensure no division by zero
                                        $psa9 = $populations['PSA9'] ?? 0;
                                        $psa10 = $populations['PSA10'] ?? 1; // Default to 1 if PSA10 is zero to avoid division by zero

                                        // Calculate the PSA 9/10 ratio, only if PSA10 is greater than zero
                                        if ($psa10 > 0) {
                                            $ratio = $psa9 / $psa10;
                                        } else {
                                            $ratio = 0; // Or handle differently, such as setting it to null
                                        }
                                    @endphp

                                    <div class="w-full flex flex-col md:flex-row gap-5 my-5">
                                        <div
                                            class="w-full md:w-12/12 bg-[#27292B] rounded-xl p-4 overflow-x-auto relative flex flex-col justify-between">
                                            <div class="w-full relative overflow-x-auto">
                                                <div class="flex justify-start w-full mb-3">
                                                    <h2 class="font-manrope font-bold text-base text-white">PSA
                                                        Population price</h2>
                                                </div>
                                                <div class="flex gap-4 w-full">
                                                    <div
                                                        class="w-[800px] md:w-1/4 flex flex-col gap-2 justify-between">
                                                        <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                            PSA total population</h4>
                                                        <h4
                                                            class="font-manrope font-semibold text-sm text-white text-start">
                                                            {{ $totalPopulation }}
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="w-[800px] md:w-1/5 flex flex-col gap-2 justify-between">
                                                        <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                            PSA 10 chance</h4>
                                                        <h4
                                                            class="font-manrope font-semibold text-sm text-start {{ $color }}">
                                                            {{ number_format($percentage, 2) }} %
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="w-[800px] md:w-1/5 flex flex-col gap-2 justify-between">
                                                        <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                            PSA 9/10 Ratio
                                                        </h4>
                                                        <h4
                                                            class="font-manrope font-semibold text-sm text-start {{ $color }}">
                                                            {{ number_format($ratio, 2) }} : 1
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="w-[800px] md:w-1/4 flex flex-col gap-2 justify-between">
                                                        <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                            PSA Grade Difficulty</h4>
                                                        <h4
                                                            class="font-manrope font-semibold text-sm text-start {{ $color }}">
                                                            {{ $difficulty }}
                                                        </h4>
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                                <div class="grid grid-cols-10 gap-4 w-full">
                                                    @foreach ($populations as $key => $value)
                                                        <div class="w-full flex flex-col gap-2 justify-center">
                                                            <h4
                                                                class="font-manrope font-semibold text-sm text-[#BEBFBF]">
                                                                {{ $key }}
                                                            </h4>
                                                            <h4
                                                                class="font-manrope font-semibold text-sm text-white text-start">
                                                                {{ $value }}
                                                            </h4>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div
                                            class="w-full md:w-3/12 bg-[#27292B] rounded-xl p-4 relative overflow-x-auto">
                                            <div class="flex justify-center w-full mb-3 flex-col gap-1 items-start">
                                                <h2 class="font-manrope font-bold text-base text-white">PSA Market Cap
                                                </h2>
                                                <h2 class="font-manrope font-bold text-sm text-[#BEBFBF]">Market Cap
                                                    Rating</h2>
                                                <h2 class="font-manrope font-bold text-lg text-yellowish">#193/29344
                                                </h2>
                                                <h2 class="font-manrope font-bold text-sm text-[#BEBFBF] mt-2">Total
                                                    PSA Market Cap</h2>
                                                <h2 class="font-manrope font-bold text-lg text-yellowish">$1,244.014
                                                </h2>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-market"
                                role="tabpanel" aria-labelledby="market-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 ">Dashboard tab's associated
                                        content</strong>. Clicking another tab will toggle the visibility of this one
                                    for the next. The tab JavaScript swaps classes to control the content visibility and
                                    styling.</p>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-auctions"
                                role="tabpanel" aria-labelledby="auctions-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 ">Settings tab's associated
                                        content</strong>. Clicking another tab will toggle the visibility of this one
                                    for the next. The tab JavaScript swaps classes to control the content visibility and
                                    styling.</p>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-details"
                                role="tabpanel" aria-labelledby="details-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 ">Contacts tab's associated
                                        content</strong>. Clicking another tab will toggle the visibility of this one
                                    for the next. The tab JavaScript swaps classes to control the content visibility and
                                    styling.</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="py-5">
                        <h2 class="font-manrope font-bold text-white text-xl mb-5">Current Price Points</h2>

                        <div class="lg:w-full xl:w-3/5">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 !rounded-xl">
                                    <thead class="text-xs text-white bg-evengray rounded-xl">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-base normal-case">
                                                Price Point
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-base text-end normal-case">
                                                Foil
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="rounded-xl">
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                Market Price
                                            </th>
                                            <td class="px-6 py-4  text-end">
                                                $0.18
                                            </td>
                                        </tr>
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                Buylist Market Price
                                            </th>
                                            <td class="px-6 py-4  text-end">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                Listed Median Price
                                            </th>
                                            <td class="px-6 py-4  text-end">
                                                $0.24
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div> --}}
                </div>

                {{-- <div class="hidden lg:block lg:w-full xl:w-[20%] h-full xl:h-fit ml-2 mb-5 xl:mb-0">
                    <div class="w-full h-auto xl:h-[100vh] rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="py-8">
            <livewire:pages.components.charts.card-detail-history-chart :card="$card" :populations="$populations"
                :cardPricesTimeseries="$cardPricesTimeseries" :cardTransactionTimeseries="$cardTransactionTimeseries" />
        </div>

        {{-- Second Section --}}
        <div id="price-table" class="w-full bg-blackish py-12">
            {{-- Card Prices Table --}}
            <livewire:pages.components.card.price-table :card="$card" />
        </div>

        {{-- Third Section --}}
        <div class="w-full bg-darkblackbg py-12">
            <div
                class="max-w-[1440px] 2xl:max-w-[1500px] bg-darkblackbg flex relative mx-auto flex-col xl:flex-row gap-12 items-center justify-center">
                <div class="w-full xl:w-10/12 px-8 xl:px-0">
                    {{-- Card Widgets Section --}}
                    <livewire:pages.components.card.widgets-section :card="$card" :set="$card->set"
                        :allCardRecord="$card->all_card" />
                </div>
                {{-- <div class="w-full xl:w-2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- Fourth Section --}}
        <div class="w-full bg-blackish py-12">
            {{-- Related Section --}}
            <livewire:pages.components.card.related-section :card="$card" :set="$card->set" />
        </div>

        {{-- Fifth Section --}}
        {{-- <div class="w-full bg-darkblackbg py-12">
            <div
                class="max-w-[1440px] 2xl:max-w-[1500px] bg-darkblackbg flex relative mx-auto flex-col xl:flex-row gap-12 items-center justify-center">
                <div class="w-full xl:w-10/12 px-8 xl:px-0">
                    <div class="mt-8">
                        <h2 class="font-manrope font-bold text-center text-2xl lg:text-3xl text-white">Auctions ending
                            soon for Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>
                    <div class="my-8">
                        <div class="mb-4">
                            <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center"
                                id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                                data-tabs-active-classes="text-yellowish hover:text-yellowish border-yellowish"
                                data-tabs-inactive-classes="dark:border-transparent text-white hover:text-yellowish"
                                role="tablist">
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg" id="All-styled-tab"
                                        data-tabs-target="#styled-All" type="button" role="tab"
                                        aria-controls="All" aria-selected="false">All</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="Ungraded-styled-tab" data-tabs-target="#styled-Ungraded" type="button"
                                        role="tab" aria-controls="Ungraded"
                                        aria-selected="false">Ungraded</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="Grade-7-styled-tab" data-tabs-target="#styled-Grade-7" type="button"
                                        role="tab" aria-controls="Grade-7" aria-selected="false">Grade 7</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="Grade-8-styled-tab" data-tabs-target="#styled-Grade-8" type="button"
                                        role="tab" aria-controls="Grade-8" aria-selected="false">Grade 8</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="Grade-9-styled-tab" data-tabs-target="#styled-Grade-9" type="button"
                                        role="tab" aria-controls="Grade-9" aria-selected="false">Grade 9</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="Grade-95-styled-tab" data-tabs-target="#styled-Grade-95" type="button"
                                        role="tab" aria-controls="Grade-95" aria-selected="false">Grade
                                        9.5</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="psa10-styled-tab" data-tabs-target="#styled-psa10" type="button"
                                        role="tab" aria-controls="psa10" aria-selected="false">PSA 10</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">

                            <div class="hidden p-4 rounded-lg" id="styled-All" role="tabpanel"
                                aria-labelledby="All-tab">
                                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonflash.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Flutter Mane - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonfire.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Munkidori - SV06: Twilight Masquerade (TWM)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareon.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonflash.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Flutter Mane - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonfire.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Munkidori - SV06: Twilight Masquerade (TWM)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareon.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}"
                                                alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-14 md:-top-9 lg:-top-14 xl:-top-11"
                                                style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z"
                                                        stroke="#1B1B1B" stroke-width="1.8" />
                                                    <path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B"
                                                        stroke-width="1.8" stroke-linecap="round" />
                                                </svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h
                                                    19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="font-manrope font-semibold text-base text-white truncate max-w-xs">
                                                    Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">
                                                    $2.25</h4>
                                                <button
                                                    class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_318_19463)">
                                                            <path
                                                                d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z"
                                                                fill="#E53238" />
                                                            <path
                                                                d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z"
                                                                fill="#0064D2" />
                                                            <path
                                                                d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z"
                                                                fill="#F5AF02" />
                                                            <path
                                                                d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z"
                                                                fill="#86B817" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_318_19463">
                                                                <rect width="49.9002" height="20" fill="white"
                                                                    transform="translate(0.0499268)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex w-full justify-center mt-8">
                                    <button
                                        class="text-yellowish font-manrope font-semibold text-base text-center border border-yellowish rounded-lg py-2.5 px-6 hover:text-black hover:bg-yellowish cursor-pointer">Explore
                                        More</button>
                                </div>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Ungraded"
                                role="tabpanel" aria-labelledby="Ungraded-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">Ungraded tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-7"
                                role="tabpanel" aria-labelledby="Grade-7-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">Grade7 tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-8"
                                role="tabpanel" aria-labelledby="Grade-8-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">Grade8 tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-9"
                                role="tabpanel" aria-labelledby="Grade-9-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">Grade9 tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-95"
                                role="tabpanel" aria-labelledby="Grade-95-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">Grade95 tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-psa10"
                                role="tabpanel" aria-labelledby="psa10-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                    the <strong class="font-medium text-gray-800 dark:text-white">PSA 10 tab's
                                        associated content</strong>. Clicking another tab will toggle the visibility of
                                    this one for the next. The tab JavaScript swaps classes to control the content
                                    visibility and styling.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
