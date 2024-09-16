<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.card-tcg-pc-page');

    $component->assertSee('');
});
