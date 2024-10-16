<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.all-cards-json');

    $component->assertSee('');
});
