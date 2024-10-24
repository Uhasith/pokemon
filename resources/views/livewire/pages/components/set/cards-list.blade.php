<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\PokeCard;
use Livewire\Attributes\On;
use Laravel\Scout\Builder;
use Illuminate\Support\Facades\Log;

new class extends Component {
    use WithPagination;

    public $sortBy = 'Value High to Low';
    public $price = 'PSA 10';
    public $set;
    public $set_id,
        $searchKw = '';

    #[On('search-this')]
    public function search($kw)
    {
        $this->searchKw = $kw;
        // $cards = App\Models\PokeCard::search($kw)->get();
    }

    public function with(): array
    {
        // Extract the PSA grade number from the price string
        $psa_grade = preg_replace('/[^0-9]/', '', $this->price);

        // Define the base query for `PokeCard` with necessary relationships and joins
        $baseQuery = function ($query) use ($psa_grade) {
            $query
                ->with(['all_card', 'set'])
                ->leftJoin('poke_card_price_time_series as pts', function ($join) use ($psa_grade) {
                    $join->on('poke_cards.card_id', '=', 'pts.card_id')->where('pts.psa_grade', '=', $psa_grade);
                })
                ->select('poke_cards.*', 'pts.latest_fair_price as fair_price');
        };

        // Define sorting logic based on the `sortBy` attribute
        $applySorting = function ($query) {
            switch ($this->sortBy) {
                case 'Value High to Low':
                    $query->orderByRaw('fair_price IS NULL, fair_price DESC');
                    break;
                case 'Value Low to High':
                    $query->orderByRaw('fair_price IS NULL, fair_price ASC');
                    break;
                case 'Alphabetical':
                    $query->orderByRaw('fair_price IS NULL, name ASC');
                    break;
                case 'Reversed Alphabetical':
                    $query->orderByRaw('fair_price IS NULL, name DESC');
                    break;
            }
        };

        if (empty($this->searchKw)) {
            // Apply the base query and sorting logic for a normal query
            $query = PokeCard::query()->where('set_id', $this->set_id);
            $baseQuery($query);
            $applySorting($query);
            $cards = $query->paginate(20);
        } else {
            // Apply the base query and sorting logic for a search query
            $cards = PokeCard::search($this->searchKw)
                ->query(function ($query) use ($baseQuery, $applySorting) {
                    $baseQuery($query);
                    $applySorting($query);
                })
                ->paginate(20);
        }

        return ['cards' => $cards];
    }
}; ?>

<div class="w-full md:w-9/12 xl:w-4/5" x-data="{ type: 'grid' }">
    <div class="flex items-center justify-end gap-4 flex-wrap">
        <div class="grid grid-col lg:grid-cols-[auto_1fr] items-center gap-3 w-[50%] lg:w-1/4">
            <h2 class="font-manrope font-semibold text-sm text-white w-full">Sort By: </h2>
            <div class="flex items-center w-full">
                <x-wui-select placeholder="Sort By" wire:model.live='sortBy' :clearable="false" :options="['Value High to Low', 'Value Low to High', 'Alphabetical', 'Reversed Alphabetical']" />
            </div>
        </div>
        <div class="grid grid-col lg:grid-cols-[auto_1fr] items-center gap-3 w-[45%] lg:w-[15%]">
            <h2 class="font-manrope font-semibold text-sm text-white w-full">Price: </h2>
            <div class="flex items-center w-full">
                <x-wui-select placeholder="Price" wire:model.live='price' :clearable="false" :options="['PSA 10', 'PSA 9', 'PSA 8', 'PSA 7', 'PSA 6', 'PSA 5', 'PSA 4', 'PSA 3', 'PSA 2', 'PSA 1']" />
            </div>
        </div>
        <div class="bg-[#383A3C] flex items-center p-1.5 rounded-md gap-3">
            <button :class="type === 'list' ? 'bg-yellowish p-1.5 rounded' : 'p-1.5 rounded'"
                x-on:click="type = 'list'">
                <svg width="24" height="20" viewBox="0 0 34 30" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.66602 9L24.3327 9" :stroke="type == 'list' ? '#1B1B1B' : 'white'" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.66602 15L24.3327 15" :stroke="type == 'list' ? '#1B1B1B' : 'white'" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.66602 21L24.3327 21" :stroke="type == 'list' ? '#1B1B1B' : 'white'" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <button :class="type === 'grid' ? 'bg-yellowish p-1.5 rounded' : 'p-1.5 rounded'"
                x-on:click="type = 'grid'">
                <svg width="24" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.02762 1.04163C5.64357 1.04162 6.14984 1.04161 6.55941 1.08055C6.98502 1.12102 7.37031 1.2079 7.72077 1.42267C8.0687 1.63588 8.36124 1.92841 8.57449 2.27634C8.78924 2.6268 8.87607 3.01209 8.91657 3.4377C8.95549 3.84728 8.95549 4.35354 8.95549 4.96949V5.03043C8.95549 5.64637 8.95549 6.15264 8.91657 6.56222C8.87607 6.98783 8.78924 7.37312 8.57449 7.72358C8.36124 8.07151 8.0687 8.36404 7.72077 8.57729C7.37031 8.79204 6.98502 8.87888 6.55941 8.91938C6.14984 8.95829 5.64358 8.95829 5.02764 8.95829H4.96669C4.35074 8.95829 3.84447 8.95829 3.43489 8.91938C3.00929 8.87888 2.62399 8.79204 2.27354 8.57729C1.9256 8.36404 1.63307 8.07151 1.41986 7.72358C1.20509 7.37312 1.11821 6.98783 1.07774 6.56222C1.0388 6.15264 1.03881 5.64638 1.03882 5.03043V4.9695C1.03881 4.35355 1.0388 3.84728 1.07774 3.4377C1.11821 3.01209 1.20509 2.6268 1.41986 2.27634C1.63307 1.92841 1.9256 1.63588 2.27354 1.42267C2.62399 1.2079 3.00929 1.12102 3.43489 1.08055C3.84447 1.04161 4.35074 1.04162 4.96669 1.04163H5.02762Z"
                        :fill="type == 'grid' ? '#1B1B1B' : 'white'" />
                    <path
                        d="M5.02762 11.0416C5.64357 11.0416 6.14984 11.0416 6.55941 11.0805C6.98502 11.121 7.37031 11.2079 7.72077 11.4226C8.0687 11.6359 8.36124 11.9284 8.57449 12.2764C8.78924 12.6268 8.87607 13.0121 8.91657 13.4377C8.95549 13.8473 8.95549 14.3535 8.95549 14.9695V15.0305C8.95549 15.6464 8.95549 16.1526 8.91657 16.5622C8.87607 16.9878 8.78924 17.3731 8.57449 17.7235C8.36124 18.0715 8.0687 18.364 7.72077 18.5773C7.37031 18.792 6.98502 18.8789 6.55941 18.9194C6.14984 18.9583 5.64358 18.9583 5.02764 18.9583H4.96669C4.35074 18.9583 3.84447 18.9583 3.43489 18.9194C3.00929 18.8789 2.62399 18.792 2.27354 18.5773C1.9256 18.364 1.63307 18.0715 1.41986 17.7235C1.20509 17.3731 1.11821 16.9878 1.07774 16.5622C1.0388 16.1526 1.03881 15.6464 1.03882 15.0305V14.9695C1.03881 14.3536 1.0388 13.8473 1.07774 13.4377C1.11821 13.0121 1.20509 12.6268 1.41986 12.2764C1.63307 11.9284 1.9256 11.6359 2.27354 11.4226C2.62399 11.2079 3.00929 11.121 3.43489 11.0805C3.84447 11.0416 4.35074 11.0416 4.96669 11.0416H5.02762Z"
                        :fill="type == 'grid' ? '#1B1B1B' : 'white'" />
                    <path
                        d="M15.0277 1.04163C15.6436 1.04162 16.1498 1.04161 16.5594 1.08055C16.985 1.12102 17.3703 1.2079 17.7207 1.42267C18.0687 1.63588 18.3612 1.92841 18.5745 2.27634C18.7892 2.6268 18.8761 3.01209 18.9166 3.4377C18.9555 3.84728 18.9555 4.35354 18.9555 4.96949V5.03043C18.9555 5.64637 18.9555 6.15264 18.9166 6.56222C18.8761 6.98783 18.7892 7.37312 18.5745 7.72358C18.3612 8.07151 18.0687 8.36404 17.7207 8.57729C17.3703 8.79204 16.985 8.87888 16.5594 8.91938C16.1498 8.95829 15.6436 8.95829 15.0277 8.95829H14.9667C14.3507 8.95829 13.8445 8.95829 13.4349 8.91938C13.0093 8.87888 12.624 8.79204 12.2736 8.57729C11.9256 8.36404 11.6331 8.07151 11.4198 7.72358C11.2051 7.37312 11.1182 6.98783 11.0777 6.56222C11.0388 6.15264 11.0388 5.64638 11.0388 5.03043V4.9695C11.0388 4.35355 11.0388 3.84728 11.0777 3.4377C11.1182 3.01209 11.2051 2.6268 11.4198 2.27634C11.6331 1.92841 11.9256 1.63588 12.2736 1.42267C12.624 1.2079 13.0093 1.12102 13.4349 1.08055C13.8445 1.04161 14.3507 1.04162 14.9667 1.04163H15.0277Z"
                        :fill="type == 'grid' ? '#1B1B1B' : 'white'" />
                    <path
                        d="M15.0277 11.0416C15.6436 11.0416 16.1498 11.0416 16.5594 11.0805C16.985 11.121 17.3703 11.2079 17.7207 11.4226C18.0687 11.6359 18.3612 11.9284 18.5745 12.2764C18.7892 12.6268 18.8761 13.0121 18.9166 13.4377C18.9555 13.8473 18.9555 14.3535 18.9555 14.9695V15.0305C18.9555 15.6464 18.9555 16.1526 18.9166 16.5622C18.8761 16.9878 18.7892 17.3731 18.5745 17.7235C18.3612 18.0715 18.0687 18.364 17.7207 18.5773C17.3703 18.792 16.985 18.8789 16.5594 18.9194C16.1498 18.9583 15.6436 18.9583 15.0277 18.9583H14.9667C14.3507 18.9583 13.8445 18.9583 13.4349 18.9194C13.0093 18.8789 12.624 18.792 12.2736 18.5773C11.9256 18.364 11.6331 18.0715 11.4198 17.7235C11.2051 17.3731 11.1182 16.9878 11.0777 16.5622C11.0388 16.1526 11.0388 15.6464 11.0388 15.0305V14.9695C11.0388 14.3536 11.0388 13.8473 11.0777 13.4377C11.1182 13.0121 11.2051 12.6268 11.4198 12.2764C11.6331 11.9284 11.9256 11.6359 12.2736 11.4226C12.624 11.2079 13.0093 11.121 13.4349 11.0805C13.8445 11.0416 14.3507 11.0416 14.9667 11.0416H15.0277Z"
                        :fill="type == 'grid' ? '#1B1B1B' : 'white'" />
                </svg>
            </button>
        </div>
    </div>

    {{-- This is Grid View --}}
    <div x-show="type == 'grid'" x-transition>
        <div class="grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 my-5">
            @foreach ($cards as $card)
                @if ($card?->all_card?->images['small'] !== null)
                    <div class="w-full" wire:key="card-grid-{{ $card->card_id }}">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen relative cursor-pointer">
                                @if ($card?->all_card?->images['small'] !== null)
                                    <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $set->slug]) }}"
                                        wire:navigate>
                                        <x-image :src="$card?->all_card?->images['small']" :alt="$card->name" skeltonWidth="160"
                                            skeltonHeight="220" />
                                    </a>
                                @else
                                    <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $set->slug]) }}"
                                        wire:navigate>
                                        <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                            style="width: 160px; height: 220px;">
                                            <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 18">
                                                <path
                                                    d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                            </svg>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="relative">
                                {{-- <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[8px] -ml-[45px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001"
                                            stroke="white" stroke-width="1.27273" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z"
                                            stroke="white" stroke-width="1.27273" />
                                    </svg>
                                </div> --}}
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2">
                            {{ $card->name }}{{ $card->variant ? ' - ' . $card->variant : '' }}
                        </h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-sm xl:text-base font-semibold">
                                Price :
                            </p>
                            <p class="font-manrope text-white text-sm xl:text-base font-bold">
                                {{ isset($card->fair_price) ? '$ ' . number_format($card->fair_price, 2, '.', ',') : 'N/A' }}
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- This is List view --}}
    <div x-show="type == 'list'" x-transition>
        <div class="my-5 relative overflow-x-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left rtl:text-right">
                    <thead class="text-sm font-manrope font-semibold text-yellowish bg-blackish normal-case">
                        <tr>
                            <th scope="col" class="p-4">

                            </th>
                            <th scope="col" class="p-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center justify-center">
                                    Name
                                    {{-- <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 11C13.5 11 10.1858 14.75 8.99996 14.75C7.81413 14.75 4.5 11 4.5 11"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13.5 6.99997C13.5 6.99997 10.1858 3.25001 8.99996 3.25C7.81413 3.24999 4.5 7 4.5 7"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a> --}}
                                </div>
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    7d
                                    <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 11C13.5 11 10.1858 14.75 8.99996 14.75C7.81413 14.75 4.5 11 4.5 11"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13.5 6.99997C13.5 6.99997 10.1858 3.25001 8.99996 3.25C7.81413 3.24999 4.5 7 4.5 7"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    30d
                                    <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 11C13.5 11 10.1858 14.75 8.99996 14.75C7.81413 14.75 4.5 11 4.5 11"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13.5 6.99997C13.5 6.99997 10.1858 3.25001 8.99996 3.25C7.81413 3.24999 4.5 7 4.5 7"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    1y
                                    <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 11C13.5 11 10.1858 14.75 8.99996 14.75C7.81413 14.75 4.5 11 4.5 11"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13.5 6.99997C13.5 6.99997 10.1858 3.25001 8.99996 3.25C7.81413 3.24999 4.5 7 4.5 7"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                Variant
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Card Number
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    Price
                                    {{-- <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 11C13.5 11 10.1858 14.75 8.99996 14.75C7.81413 14.75 4.5 11 4.5 11"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13.5 6.99997C13.5 6.99997 10.1858 3.25001 8.99996 3.25C7.81413 3.24999 4.5 7 4.5 7"
                                                stroke="#FFC107" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a> --}}
                                </div>
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Population number
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-sm font-manrope font-bold">
                        @foreach ($cards as $card)
                            @if ($card?->all_card?->images['small'] !== null)
                                <tr class="odd:bg-oddgray even:bg-evengray" wire:key="card-list-{{ $card->card_id }}">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.9987 7.33337V14.6667M14.6654 11L7.33203 11" stroke="white"
                                                    stroke-opacity="0.5" stroke-width="1.4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M2.28906 11.0001C2.28906 6.89493 2.28906 4.84236 3.56437 3.56705C4.83967 2.29175 6.89225 2.29175 10.9974 2.29175C15.1025 2.29175 17.1551 2.29175 18.4304 3.56705C19.7057 4.84236 19.7057 6.89493 19.7057 11.0001C19.7057 15.1052 19.7057 17.1578 18.4304 18.4331C17.1551 19.7084 15.1025 19.7084 10.9974 19.7084C6.89225 19.7084 4.83967 19.7084 3.56437 18.4331C2.28906 17.1578 2.28906 15.1052 2.28906 11.0001Z"
                                                    stroke="white" stroke-opacity="0.5" stroke-width="1.4" />
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="p-3 text-white">
                                        <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $set->slug]) }}"
                                            wire:navigate>
                                            {{ $card->id }}
                                        </a>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $set->slug]) }}"
                                            wire:navigate>
                                            <div class="flex items-center gap-3 hyphens-auto cursor-pointer">
                                                @if ($card?->all_card?->images['small'] !== null)
                                                    <x-image :src="$card?->all_card?->images['small']" class="w-14 md:w-8" :alt="$card->name"
                                                        skeltonWidth="32" skeltonHeight="45" />
                                                @else
                                                    <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                                        style="width: 32px; height: 45px;">
                                                        <svg class="w-10 h-10 text-gray-200 dark:text-gray-600"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 20 18">
                                                            <path
                                                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                                {{ $card->name }} - {{ $card->variant ?? 'N/A' }}
                                            </div>
                                        </a>
                                    </th>
                                    {{-- <td class="px-6 py-4">
                                        <div class="flex gap-1 items-center text-redprice">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.943 6.14615C14.2764 6.39178 14.3477 6.86128 14.1021 7.19479C13.9113 7.45385 13.7205 7.7001 13.5531 7.9146C13.2189 8.3427 12.759 8.91615 12.2592 9.4917C11.7627 10.0636 11.2121 10.6548 10.6982 11.1089C10.4421 11.3352 10.1773 11.5433 9.91915 11.699C9.68163 11.8421 9.35523 12 8.99815 12C8.64108 12 8.3146 11.8421 8.07708 11.699C7.81893 11.5433 7.55425 11.3352 7.29813 11.1089C6.78416 10.6548 6.23363 10.0636 5.7371 9.4917C5.23734 8.91615 4.77735 8.3427 4.44321 7.9146C4.27583 7.7001 4.08499 7.45385 3.8942 7.1948C3.64857 6.86128 3.71981 6.39178 4.05333 6.14615C4.1874 6.0474 4.34344 5.99987 4.49809 6H8.99815H13.4982C13.6528 5.99987 13.8089 6.0474 13.943 6.14615Z"
                                                    fill="#F4454F" />
                                            </svg>
                                            0.45
                                        </div>
                                    </td> --}}
                                    {{-- <td class="px-6 py-4">
                                        <div class="flex gap-1 items-center text-redprice">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.943 6.14615C14.2764 6.39178 14.3477 6.86128 14.1021 7.19479C13.9113 7.45385 13.7205 7.7001 13.5531 7.9146C13.2189 8.3427 12.759 8.91615 12.2592 9.4917C11.7627 10.0636 11.2121 10.6548 10.6982 11.1089C10.4421 11.3352 10.1773 11.5433 9.91915 11.699C9.68163 11.8421 9.35523 12 8.99815 12C8.64108 12 8.3146 11.8421 8.07708 11.699C7.81893 11.5433 7.55425 11.3352 7.29813 11.1089C6.78416 10.6548 6.23363 10.0636 5.7371 9.4917C5.23734 8.91615 4.77735 8.3427 4.44321 7.9146C4.27583 7.7001 4.08499 7.45385 3.8942 7.1948C3.64857 6.86128 3.71981 6.39178 4.05333 6.14615C4.1874 6.0474 4.34344 5.99987 4.49809 6H8.99815H13.4982C13.6528 5.99987 13.8089 6.0474 13.943 6.14615Z"
                                                    fill="#F4454F" />
                                            </svg>
                                            1.93
                                        </div>
                                    </td> --}}
                                    {{-- <td class="px-6 py-4">
                                        <div class="flex gap-1 items-center text-redprice">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.943 6.14615C14.2764 6.39178 14.3477 6.86128 14.1021 7.19479C13.9113 7.45385 13.7205 7.7001 13.5531 7.9146C13.2189 8.3427 12.759 8.91615 12.2592 9.4917C11.7627 10.0636 11.2121 10.6548 10.6982 11.1089C10.4421 11.3352 10.1773 11.5433 9.91915 11.699C9.68163 11.8421 9.35523 12 8.99815 12C8.64108 12 8.3146 11.8421 8.07708 11.699C7.81893 11.5433 7.55425 11.3352 7.29813 11.1089C6.78416 10.6548 6.23363 10.0636 5.7371 9.4917C5.23734 8.91615 4.77735 8.3427 4.44321 7.9146C4.27583 7.7001 4.08499 7.45385 3.8942 7.1948C3.64857 6.86128 3.71981 6.39178 4.05333 6.14615C4.1874 6.0474 4.34344 5.99987 4.49809 6H8.99815H13.4982C13.6528 5.99987 13.8089 6.0474 13.943 6.14615Z"
                                                    fill="#F4454F" />
                                            </svg>
                                            0.20
                                        </div>
                                    </td> --}}
                                    <td class="px-6 py-4 text-white text-center">
                                        {{ $card?->variant ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-white text-center">
                                        {{ $card?->card_number ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 text-white text-center">
                                        {{ '$ ' . $card->fair_price ?? 'N/A' }}
                                    </td>
                                    {{-- <td class="px-6 py-4 text-white">
                                        20
                                    </td> --}}
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $cards->onEachSide(1)->links(data: ['scrollTo' => '#section2']) }}
</div>
