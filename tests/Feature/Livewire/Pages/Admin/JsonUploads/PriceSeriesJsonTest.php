<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.json-uploads.price-series-json');

    $component->assertSee('');
});
