<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.components.charts.sale-chart');

    $component->assertSee('');
});
