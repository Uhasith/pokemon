<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.sets-page');

    $component->assertSee('');
});
