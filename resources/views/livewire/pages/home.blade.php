<?php

use Livewire\Volt\Component;
use App\Models\PokeSet;

new class extends Component {
    public $kw_search = '';

    function updatedKwSearch($value) : void {
        if(strlen($value) >= 3){
            $this->dispatch('search-this', $value);
        }
    }

    public function with(): array {
        $sets = PokeSet::query()->where('is_promo', false)->limit(6)->get();
        return ['sets' => $sets];
    }
}; ?>

<div>
    @push('meta-tags')
        <title>All Pokemon Card Set List</title>
        <meta name="description"
            content="Check Pokémon card prices with our up-to-date price checker. Browse the latest TCG sets, from classic Base Set to recent releases, and find accurate values and population insights for your collection.">
        <meta property="og:description"
            content="Check Pokémon card prices with our up-to-date price checker. Browse the latest TCG sets, from classic Base Set to recent releases, and find accurate values and population insights for your collection.">
        <meta name="twitter:description"
            content="Check Pokémon card prices with our up-to-date price checker. Browse the latest TCG sets, from classic Base Set to recent releases, and find accurate values and population insights for your collection.">
    @endpush

    <div class="bg-darkblackbg w-full relative" x-data="{ open: false }"
        x-on:search-this.window="console.log($event); if($event.detail[0] != '') { open = true } else { open = false }">

        <div class="w-full bg-darkblackbg">
            <div class="max-w-xl mx-auto py-6 md:py-24 px-6 md:px-4">
                <h2 class="mx-auto text-2xl text-center text-white mb-4 uppercase">Find a card...</h2>
                <x-wui-input wire:model.live.debounce.500ms="kw_search" rounded placeholder="Find a card..."/>
            </div>
        </div>

        <div x-show="open" x-transition class="w-full flex items-center justify-center py-8">
            <livewire:pages.components.global.cards-list />
        </div>

        <div id="section3" class="w-full bg-darkblackbg min-h-screen">
            <div class="max-w-[1440px] relative flex flex-col md:flex-row gap-8 xl:gap-12 mx-auto p-6">
                <div class="w-full md:w-12/12 xl:w-12/12">
                    {{-- This is Grid View --}}
                    <div class="grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 my-5">
                        @foreach ($sets as $set)
                        <a href="{{ route('set-details', ['slug' => $set->slug]) }}" wire:navigate
                            wire:key="set-{{ $set->set_id }}">
                            <div class="w-full">
                                <div class="flex w-full">
                                    <div
                                        class="p-5 rounded-2xl bg-[#2C2C2C] bg-blend-screen w-full h-48 flex items-center justify-center">
                                        @if ($set->set_image !== null)
                                        <x-image class="sets-icon object-contain w-[60px] h-auto" :src="'https://www.pokemonprice.com/Content/images/sets/' .
                                                    $set->set_image" :alt="$set->set_name" skeltonWidth="150"
                                            skeltonHeight="150" />
                                        @else
                                        <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                            style="width: 150px; height: 150px;">
                                            <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 18">
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
                </div>
            </div>
        </div>
    </div>
</div>