<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('pages.admin.set-set-id-page');

    $component->assertSee('');
});
