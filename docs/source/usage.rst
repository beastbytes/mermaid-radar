Usage
=====

Radar allows the creation of radar charts.

Axes are added to the Radar chart, along with the curves. An axis must have a label,
and a curve a label and an array of values - one for each axis.

Example
-------

PHP
+++

.. code-block:: php

    echo Mermaid::create(Radar::class, ['title' => 'Grades'])
        ->withAxis(
            new Axis('m', 'Maths'),
            new Axis('s', 'Science'),
            new Axis('e', 'English'),
            new Axis('h', 'History'),
            new Axis('g', 'Geography'),
            new Axis('a', 'Art')
        )
        ->withCurve(
            (new Curve(label: 'Alice'))->withValues([85, 90, 80, 70, 75, 90]),
            (new Curve(label: 'Bob'))->withValues([70, 75, 85, 80, 90, 85])
        )
        ->withMax(100)
        ->withMin(0)
        ->showLegend(true)
        ->withTicks(10)
        ->render()
    ;

Generated Mermaid
+++++++++++++++++

::

    <pre class="mermaid">
    ---
    title: "Grades"
    ---
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

Mermaid Diagram
+++++++++++++++

.. mermaid::

    ---
    title: "Grades"
    ---
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
