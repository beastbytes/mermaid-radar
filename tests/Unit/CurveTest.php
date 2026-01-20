<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Radar\Curve;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Curve', function (?string $id, ?string $label, array $data, string $expected) {
    expect(
        (new Curve($id, $label))
            ->withValues($data)
            ->render('')
    )
        ->toBe($expected)
    ;
})
    ->with('curves')
;

dataset('curves', [
    ['a', 'Alice', [1, 2, 3, 4], 'curve a["Alice"]{1,2,3,4}'],
    [
        null,
        'Bob',
        ['axis0' => 4, 'axis1' => 3, 'axis2' => 2, 'axis3' => 1],
        'curve mrmd0["Bob"]{"axis0":4,"axis1":3,"axis2":2,"axis3":1}'
    ],
    ['c', null, [1, 2, 3, 4], 'curve c{1,2,3,4}'],
    [
        null,
        null,
        ['axis0' => 4, 'axis1' => 3, 'axis2' => 2, 'axis3' => 1],
        'curve mrmd1{"axis0":4,"axis1":3,"axis2":2,"axis3":1}'
    ],
]);