<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model\Collection;

use LeoVie\OpenMensaPhp\Model\Day;

class DayCollection implements \JsonSerializable
{
    /** @param Day[] $days */
    public function __construct(private array $days)
    {
    }

    /** @return Day[] */
    public function getDays(): array
    {
        return $this->days;
    }

    public function jsonSerialize(): string
    {
        return json_encode(
            array_map(
                fn(Day $d): array => json_decode($d->jsonSerialize(), true),
                $this->days
            )
        );
    }
}