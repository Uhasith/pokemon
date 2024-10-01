<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.set-details-page');

    $component->assertSee('');
});
