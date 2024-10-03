<?php

use Livewire\Volt\Component;
use App\Models\PokeCardSetRelation;
use App\Models\PokeCard;
use App\Models\PokeSet;
use Illuminate\Support\Facades\Log;

new class extends Component {
    public $card;
    public $relatedResults = [];
    public $relatedCards = [];
    public $relatedSets = [];

    public function mount()
    {
        // Fetch related results for the card and set
        $relatedResults = PokeCardSetRelation::where('card_id', $this->card->card_id)
            ->where('set_id', $this->card->set_id)
            ->first();

        // Check if related results exist
        if ($relatedResults) {
            $this->relatedResults = $relatedResults->toArray();

            // Explode related cards and sets, fallback to empty arrays if null
            $relatedCardIds = explode(',', $this->relatedResults['related_cards'] ?? '');
            $relatedSetIds = explode(',', $this->relatedResults['related_sets'] ?? '');

            // Fetch related cards if card IDs exist
            if (!empty($relatedCardIds)) {
                $this->relatedCards = PokeCard::with('all_card', 'set')->whereIn('card_id', $relatedCardIds)->get();
                // Log::info($this->relatedCards);
            }

            // Fetch related sets if set IDs exist
            if (!empty($relatedSetIds)) {
                $this->relatedSets = PokeSet::whereIn('set_id', $relatedSetIds)->get();
            }
        }
    }
}; ?>

<div>
    <div
        class="max-w-[1440px] 2xl:max-w-[1500px] bg-blackish flex relative mx-auto flex-col xl:flex-row gap-12 items-center justify-center">
        <div class="w-full xl:w-10/12 px-8 xl:px-0">
            <div>
                <h2 class="font-manrope font-bold text-center text-2xl lg:text-3xl text-white">
                    Similar Cards to {{ $card->name }}
                </h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 my-12">
                @foreach ($relatedCards as $card)
                    @if ($card?->all_card?->images['small'] !== null)
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                @if ($card?->all_card?->images['small'] !== null)
                                    <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $card->set->slug]) }}"
                                        wire:navigate>
                                        <x-image :src="$card?->all_card?->images['small']" :alt="$card->name" skeltonWidth="180"
                                            skeltonHeight="250" />
                                    </a>
                                @else
                                    <a href="{{ route('card-details', ['slug' => $card->slug, 'setSlug' => $card->set->slug]) }}"
                                        wire:navigate>
                                        <div class="flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 animate-pulse"
                                            style="width: 180px; height: 250px;">
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
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{-- <div class="mt-8">
                <h2 class="font-manrope font-bold text-center text-2xl lg:text-3xl text-white">Similar Cards
                    from Wizards Black Star Promos </h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 my-12">
                <div class="flex w-full">
                    <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                        <img src="{{ asset('assets/card-images/pikachuthunder.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                        <img src="{{ asset('assets/card-images/pikashuelectro.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                        <img src="{{ asset('assets/card-images/starly.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                        <img src="{{ asset('assets/card-images/zapdos.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                        <img src="{{ asset('assets/card-images/prinpulp.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="w-full xl:w-2/12 h-full">
            <div class="w-full h-full rounded-3xl bg-darkblackbg p-8 flex items-center justify-center">
                <h1 class="text-white">addvertisements</h1>
            </div>
        </div>
    </div>
</div>
