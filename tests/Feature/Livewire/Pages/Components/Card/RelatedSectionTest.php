<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.components.card.related-section');

    $component->assertSee('');
});
