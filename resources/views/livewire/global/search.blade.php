<?php

use Livewire\Volt\Component;

new class extends Component {
    public $kw = '';

    function updatedKw($value) : void {
        $this->dispatch('search-this', $value);
    }
}; ?>

<div>
    <form class="mx-auto">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <input type="text" id="default-search" wire:model.live="kw" class="block w-auto h-12 m-2 text-sm text-gray-900 rounded-lg bg-[#FFFFFF14] border-0" placeholder="Find a card..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-1.5 font-medium rounded-lg text-sm p-2">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path d="M16.041 16.0417L20.166 20.1667" stroke="white" stroke-width="1.375"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M18.332 10.0834C18.332 5.52702 14.6384 1.83337 10.082 1.83337C5.52568 1.83337 1.83203 5.52702 1.83203 10.0834C1.83203 14.6397 5.52568 18.3334 10.082 18.3334C14.6384 18.3334 18.332 14.6397 18.332 10.0834Z"
                            stroke="white" stroke-width="1.375" stroke-linejoin="round" />
                    </g>
                </svg>
            </button>
        </div>
    </form>
</div>
