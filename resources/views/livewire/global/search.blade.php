<?php

use Livewire\Volt\Component;

new class extends Component {
    public $kw = '';

    function updatedKw($value): void
    {
        if(strlen($value) >= 3){
            $this->dispatch('search-this', $value);
        }
    }
}; ?>

<div>
    <div class="relative">
        <x-wui-input placeholder="Find a card..." wire:model.live.debounce.500ms="kw" class="text-sm text-gray-900 rounded-lg bg-[#FFFFFF14]" />    
    </div>
</div>
