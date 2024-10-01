<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\PokeCard;
use App\Models\PokeSet;
use Livewire\Attributes\On;
use Laravel\Scout\Builder;

new class extends Component {
    use WithPagination;

    public $sortBy = 'Value High to Low';
    public $price = 'PSA 10';

    public function with(): array
    {
        $sets = PokeSet::query()->where('is_promo', false)->paginate(20);

        return ['sets' => $sets];
    }
}; ?>

<div>
    <div class="bg-darkblackbg w-full relative">
        {{-- First hero Section --}}
        <div class="w-full h-56 bg-blend-darken bg-no-repeat bg-center bg-cover relative flex justify-center items-center"
            style="background-image: url('{{ asset('assets/card-images/hero-background.png') }}');">
            <h2 class="text-center font-manrope font-bold text-3xl lg:text-4xl xl:text-5xl text-white z-10 md:pl-24">1999
                Base sets</h2>
            <div class="h-full w-full absolute top-0 right-0 bg-[#000000CC]"></div>
        </div>

        {{-- Second Main Section --}}
        <div id="section3" class="w-full bg-darkblackbg min-h-screen">
            <div class="max-w-[1440px] relative flex flex-col md:flex-row gap-8 xl:gap-12 mx-auto p-5">
                <div class="w-full md:w-2/12 xl:w-2/12">
                    <div class="font-manrope mt-20">
                        <h3 class="text-white font-bold text-xl mb-5">Categories</h3>
                        <div class="text-white font-semibold text-base flex flex-col gap-2">
                            <h4>Scarlet & Violet</h4>
                            <h4>Sword & Shield</h4>
                            <h4>Sun & Moon</h4>
                            <h4>Black & White</h4>
                            <h4>Call of Legends</h4>
                            <h4>HeartGold SoulSilver</h4>
                            <h4>Platinum</h4>
                            <h4>Diamond & Pearl</h4>
                            <h4>EX Ruby & Sapphire</h4>
                            <h4>Legendary Collection</h4>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-10/12 xl:w-10/12">
                    <div class="flex items-center justify-start gap-4">
                        <div class="flex items-center gap-3 w-auto">
                            <h2 class="font-manrope font-semibold text-sm text-white">Filter Cards: </h2>
                            <div class="flex items-center w-auto">
                                <button id="dropdownFilterButton" data-dropdown-toggle="filterdropdown"
                                    class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-sm xl:text-base px-4 py-2.5 text-center flex items-center justify-between"
                                    type="button">
                                    Show All
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="filterdropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownFilterButton">
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
                        </div>
                        <div class="flex items-center gap-3 w-auto">
                            <h2 class="font-manrope font-semibold text-sm text-white">Last Sale Grade: </h2>
                            <div class="flex items-center w-auto">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                    class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-sm xl:text-base px-4 py-2.5 text-center flex items-center justify-between"
                                    type="button">
                                    10
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
                        </div>
                    </div>

                    <hr class="my-3">

                    {{-- This is Grid View --}}
                    <div class="grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 my-5">
                        @foreach ($sets as $set)
                            <a href="{{ route('set-details', ['set_id' => $set->set_id]) }}" wire:navigate
                                wire:key="set-{{ $set->set_id }}">
                                <div class="w-full">
                                    <div class="flex w-full">
                                        <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                            @if ($set->set_image !== null)
                                               <x-image :src="'https://www.pokemonprice.com/Content/images/sets/' . $set->set_image" :alt="$set->set_name" skeltonWidth="150"
                                                skeltonHeight="150" />
                                            @else
                                                <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                                    style="width: 150px; height: 150px;">
                                                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">
                                        {{ $set->set_name }}
                                    </h2>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{ $sets->onEachSide(1)->links(data: ['scrollTo' => '#section3']) }}
                </div>
            </div>
        </div>
    </div>
</div>
