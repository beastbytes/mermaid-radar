<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Radar\Axis;
use BeastBytes\Mermaid\Radar\Curve;
use BeastBytes\Mermaid\Radar\Radar;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Radar', function () {
    $axes = [];
    $curves = [];

    foreach ([
        'm' => 'Maths',
        's' => 'Science',
        'e' => 'English',
        'h' => 'History',
        'g' => 'Geography',
        'a' => 'Art'
    ] as $id => $label) {
        $axes[] = new Axis($id, $label);
    }

    foreach ([
        'Alice' => [85, 90, 80, 70, 75, 90],
        'Bob' => [70, 75, 85, 80, 90, 85]
    ] as $label => $data) {
        $curves[] = (new Curve(label: $label))->withValues($data);
    }

    expect(Mermaid::create(Radar::class)
        ->withAxis(...$axes)
        ->withCurve(...$curves)
        ->withMax(100)
        ->withMin(0)
        ->showLegend(true)
        ->withTicks(10)
        ->render()
    )
        ->toBe(<<<EXPECTED
<pre class="mermaid">
radar-beta
  axis m["Maths"]
  axis s["Science"]
  axis e["English"]
  axis h["History"]
  axis g["Geography"]
  axis a["Art"]
  curve mrmd0["Alice"]{85,90,80,70,75,90}
  curve mrmd1["Bob"]{70,75,85,80,90,85}
  max 100
  min 0
  showLegend true
  ticks 10
</pre>
EXPECTED
        )
    ;
});