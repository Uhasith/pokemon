<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.card-details-page');

    $component->assertSee('');
});
