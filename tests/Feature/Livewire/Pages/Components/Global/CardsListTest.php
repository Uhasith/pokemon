<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.components.global.cards-list');

    $component->assertSee('');
});
