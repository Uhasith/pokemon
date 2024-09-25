<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.components.card.widgets-section');

    $component->assertSee('');
});
