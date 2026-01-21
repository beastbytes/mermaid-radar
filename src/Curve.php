<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Radar;

use BeastBytes\Mermaid\IdTrait;

final class Curve
{
    use IdTrait;

    private const string CURVE = '%scurve %s%s%s';
    private const string LABEL = '["%s"]';

    private array $values = [];

    public function __construct(?string $id = null, private readonly ?string $label = null)
    {
        $this->id = $id;
    }

    public function addValue(float|int $value, ?string $axisId = null): self
    {
        $new = clone $this;

        if (is_string($axisId)) {
            $new->values[$axisId] = $value;
        } else {
            $new->values[] = $value;
        }

        return $new;
    }

    /** @internal */
    public function countValues(): int
    {
        return count($this->values);
    }

    /** @internal */
    public function getLabel(): string
    {
        return (string) $this->label;
    }

    /**
     * @param array<string, float|int>|list<float|int> $values
     * @return $this
     */
    public function withValues(array $values): self
    {
        $new = clone $this;
        $new->values = $values;
        return $new;
    }

    public function render(string $indentation): string
    {
        return sprintf(
            self::CURVE,
            $indentation,
            $this->getId(),
            is_string($this->label) ? sprintf(self::LABEL, $this->label) : '',
            $this->renderData(),
        );
    }

    private function renderData()
    {
        if (array_is_list($this->values)) {
            return '{' . implode(',', $this->values) . '}';
        }

        return json_encode($this->values, JSON_FORCE_OBJECT);
    }
}