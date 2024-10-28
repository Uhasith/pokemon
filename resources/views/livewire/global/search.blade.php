<?php

use Livewire\Volt\Component;

new class extends Component {
    public $kw = '';

    function updatedKw($value): void
    {
        $this->dispatch('search-this', $value);
    }
}; ?>

<div>
    <div class="relative">
        <x-wui-input placeholder="Find a card..." wire:model.live="kw" />
    </div>
</div>
