<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\PokeCard;
use App\Models\PokeSet;
use Livewire\Attributes\Url;
use App\Actions\Cards\GetCardLatestFairPrice;
use App\Actions\Cards\CalculateSetMarketCap;

new class extends Component {
    public $set_id;
    public $set;
    public $totalSetMarketCap;
    public $setCardsMarketCap = [];

    public function mount($slug)
    {
        // Log::info($slug);
        $this->set = PokeSet::where('slug', $slug)->first();
        $this->set_id = $this->set->set_id;
        // Instantiate the CalculateMarketCap class
        $calculateSetMarketCap = new CalculateSetMarketCap();

        // Call the action and get the results
        $setMarketCapData = $calculateSetMarketCap->handle($this->set_id);

        // Set the calculated values
        $this->set = $setMarketCapData['set'];
        $this->totalSetMarketCap = $setMarketCapData['totalSetMarketCap'];
        $this->setCardsMarketCap = $setMarketCapData['setCardsMarketCap'];

        // Logging the calculated market cap for debugging purposes
        // Log::info($this->setCardsMarketCap);
        // Log::info($this->totalSetMarketCap);
    }
}; ?>

<div>

    <div class="bg-darkblackbg w-full relative">
        {{-- First hero Section --}}
        <div class="w-full h-56 bg-blend-darken bg-no-repeat bg-center bg-cover relative flex justify-center items-center"
            style="background-image: url('{{ asset('assets/card-images/hero-background.png') }}');">
            <h2 class="text-center font-manrope font-bold text-3xl lg:text-4xl xl:text-5xl text-white z-10 md:pl-24">
                {{ $set->set_name }}
            </h2>
            <div class="h-full w-full absolute top-0 right-0 bg-[#000000CC]"></div>
        </div>

        {{-- Second Main Section --}}
        <div id="section2" class="w-full bg-darkblackbg min-h-screen">
            <div class="max-w-[1440px] relative flex flex-col md:flex-row gap-8 xl:gap-12 mx-auto p-5">
                <div class="w-full md:w-3/12 xl:w-1/5">
                    <div
                        class="bg-addbg rounded-xl flex flex-col gap-3 justify-center md:items-center px-5 py-8 w-full -mt-20 md:-mt-40">
                        <div class="flex justify-center">
                            <img class="w-28 lg:w-32 xl:w-36" src="{{ asset('assets/card-images/pikachuself.png') }}"
                                alt="">
                        </div>
                        <div>
                            <h3 class="font-manrope font-bold text-yellowish text-xl md:text-lg xl:text-xl">
                                {{ $set->set_name }} (232/091)
                            </h3>
                            <h4 class="font-manrope font-semibold text-white text-base xl:text-lg">Temporal Forces (TEF)
                            </h4>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Series</h5>
                            <h5 class="font-manrope font-medium text-white text-sm xl:text-base">Scarlet & Voilet</h5>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Date Released</h5>
                            <h5 class="font-manrope font-medium text-white text-sm xl:text-base">
                                {{ $set->release_date->format('M d, Y') }}</h5>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Language</h5>
                            <h5 class="font-manrope font-medium text-white text-sm xl:text-base">{{ $set->language }}
                            </h5>
                        </div>
                    </div>
                    {{-- <div
                        class="bg-addbg rounded-xl flex flex-col gap-3 justify-start items-start px-8 py-8 w-full mt-3">
                        <div>
                            <h3 class="font-manrope font-bold text-white text-xl mb-4">General</h3>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Marketcap</h5>
                            <h4 class="font-manrope font-semibold text-yellowish text-lg mb-3">
                                {{ '$ ' . number_format($this->totalSetMarketCap, 2) }}</h4>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Volume (30D)</h5>
                            <h5 class="font-manrope font-medium text-yellowish text-base mb-3">$186.32</h5>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Total Graded Population</h5>
                            <h5 class="font-manrope font-medium text-white text-base">1600</h5>
                        </div>
                    </div> --}}
                    {{-- <div
                        class="bg-addbg rounded-xl flex flex-col gap-3 justify-start items-start px-8 py-8 w-full mt-3">
                        <div>
                            <h3 class="font-manrope font-bold text-white text-xl mb-4">PSA</h3>

                            <div>
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                    class="text-white mb-4 w-full bg-[#383A3C] font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center justify-between   "
                                    type="button">
                                    PSA 10
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                                out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Market PSA 10</h5>
                            <h4 class="font-manrope font-semibold text-yellowish text-lg mb-3">#167/29541</h4>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Volume (30D) PSA10</h5>
                            <h5 class="font-manrope font-medium text-yellowish text-base mb-3">$98.24</h5>
                            <h5 class="font-manrope font-medium text-gray-600 text-sm">Total Graded Population PSA10
                            </h5>
                            <h5 class="font-manrope font-medium text-white text-base">800</h5>
                        </div>
                    </div> --}}
                    {{-- <div
                        class="bg-addbg rounded-xl flex flex-col gap-3 justify-center items-center px-8 py-8 w-full mt-10 h-auto">
                        <div>
                            <h3 class="font-manrope font-bold text-white text-xl mb-4">Addvertisements</h3>
                        </div>
                    </div> --}}
                </div>
                {{-- Cards Loading Section With Paginations --}}
                <livewire:pages.components.set.cards-list :set_id="$set_id" />

            </div>
        </div>
    </div>
</div>
