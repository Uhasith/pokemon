<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.json-uploads.time-series-json');

    $component->assertSee('');
});
