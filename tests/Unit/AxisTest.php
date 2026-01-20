<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Radar\Axis;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Axis', function (?string $id, ?string $label, string $expected) {
    expect(
        (new Axis($id, $label))
            ->render('')
    )
        ->toBe($expected)
    ;
})
    ->with('axes')
;

dataset('axes', [
    ['m', 'Maths', 'axis m["Maths"]'],
    [null, 'History', 'axis mrmd0["History"]'],
    ['g', null, 'axis g'],
    [null, null, 'axis mrmd1'],
]);