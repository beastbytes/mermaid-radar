<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Radar;

use BeastBytes\Mermaid\Diagram;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\TitleTrait;

class Radar extends Diagram
{
    private const string TYPE = 'radar-beta';

    /** @var Axis[] $axes */
    private array $axes = [];
    /** @var Curve[] $curves */
    private array $curves = [];
    private ?Graticule $graticule = null;
    private ?int $max = null;
    private ?int $min = null;
    private ?bool $showLegend = null;
    private ?int $ticks = null;

    public function addAxis(Axis ...$axis): self
    {
        $new = clone $this;
        $new->axes = array_merge($this->axes, $axis);
        return $new;
    }

    public function withAxis(Axis ...$axis): self
    {
        $new = clone $this;
        $new->axes = $axis;
        return $new;
    }

    public function addCurve(Curve ...$curve): self
    {
        $new = clone $this;
        $new->curves = array_merge($this->curves, $curve);
        return $new;
    }

    public function withCurve(Curve ...$curve): self
    {
        $new = clone $this;
        $new->curves = $curve;
        return $new;
    }

    public function showLegend(bool $showLegend): self
    {
        $new = clone $this;
        $new->showLegend = $showLegend;
        return $new;
    }

    public function withGraticule(Graticule $graticule): self
    {
        $new = clone $this;
        $new->graticule = $graticule;
        return $new;
    }

    public function withMax(int $max): self
    {
        $new = clone $this;
        $new->max = $max;
        return $new;
    }

    public function withMin(int $min): self
    {
        $new = clone $this;
        $new->min = $min;
        return $new;
    }

    public function withTicks(int $ticks): self
    {
        $new = clone $this;
        $new->ticks = $ticks;
        return $new;
    }

    public function renderDiagram(): string
    {
        $output = [self::TYPE];

        foreach ($this->axes as $axis) {
            $output[] = $axis->render(MERMAID::INDENTATION);
        }

        foreach ($this->curves as $curve) {
            $output[] = $curve->render(MERMAID::INDENTATION);
        }

        $output[] = $this->graticule instanceof Graticule ? MERMAID::INDENTATION . $this->graticule->name : '';
        $output[] = is_int($this->max) ? MERMAID::INDENTATION . 'max ' . $this->max : '';
        $output[] = is_int($this->min) ? MERMAID::INDENTATION . 'min ' . $this->min : '';
        $output[] = is_bool($this->showLegend)
            ? MERMAID::INDENTATION . 'showLegend ' . ($this->showLegend ? 'true' : 'false')
            : ''
        ;
        $output[] = is_int($this->ticks) ? MERMAID::INDENTATION . 'ticks ' . $this->ticks : '';

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}