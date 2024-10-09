<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $card;

    public function with(): array
    {
        $prices = $this->card->card_prices()->paginate(7);

        return [
            'prices' => $prices,
        ];
    }
}; ?>

<div>
    <div
        class="max-w-[1440px] 2xl:max-w-[1500px] bg-blackish flex relative mx-auto flex-col xl:flex-row gap-12 items-center justify-center px-8 xl:px-0">
        <div class="w-full xl:w-10/12">
            <div class="mb-9">
                <h2 class="font-manrope font-bold text-center text-2xl lg:text-3xl text-white">
                    {{ $card->name }} Transaction History
                </h2>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 xl:table-fixed">
                    <thead class="text-xs text-white uppercase bg-evengray">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[13%]">
                                Sale Price (USD)
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[7%]">
                                Grade
                            </th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[10%]">
                                #Bids
                            </th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[12%]">
                                Date Sold
                            </th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                eBay ID
                            </th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[30%]">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case w-auto xl:w-[8%]">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prices as $price)
                            <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                    $ {{ $price->value }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $price->grade }}
                                </td>
                                {{-- <td class="px-6 py-4">
                                    {{ $price->auction_house ?? 'No Auction' }}
                                </td> --}}
                                <td class="px-6 py-4">
                                    {{ $price->sale_date }}
                                </td>
                                {{-- <td class="px-6 py-4">
                                    {{ $price->seller }}
                                </td> --}}
                                <td class="px-6 py-4">
                                    {{ $price->seller }} - {{ $price->lot_id }}
                                </td>
                                <td class="px-6 py-4">
                                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle opacity="0.04" cx="21" cy="21" r="21" fill="white" />
                                        <g opacity="0.8">
                                            <path
                                                d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z"
                                                fill="white" />
                                        </g>
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="py-8">
                {{ $prices->onEachSide(1)->links(data: ['scrollTo' => '#price-table']) }}
            </div>
        </div>
        {{-- <div class="w-full xl:w-2/12 h-full">
            <div class="w-full h-full rounded-3xl bg-darkblackbg p-8 flex items-center justify-center">
                <h1 class="text-white">addvertisements</h1>
            </div>
        </div> --}}
    </div>
</div>
