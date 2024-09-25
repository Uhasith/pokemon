<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.card-set-page');

    $component->assertSee('');
});
