<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Radar;

use BeastBytes\Mermaid\IdTrait;

final class Axis
{
    use IdTrait;

    private const string AXIS = '%saxis %s%s';
    private const string LABEL = '["%s"]';

    public function __construct(?string $id = null, private readonly ?string $label = null)
    {
        $this->id = $id;
    }

    public function render(string $indentation): string
    {
        return sprintf(
            self::AXIS,
            $indentation,
            $this->getId(),
            is_string($this->label) ? sprintf(self::LABEL, $this->label) : '',
        );
    }
}