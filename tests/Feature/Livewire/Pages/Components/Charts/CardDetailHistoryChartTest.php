<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.components.charts.card-detail-history-chart');

    $component->assertSee('');
});
