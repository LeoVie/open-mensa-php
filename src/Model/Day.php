<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model;

class Day implements \JsonSerializable
{
    public function __construct(private \DateTimeImmutable $date, private bool $closed)
    {
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function isClosed(): bool
    {
        return $this->closed;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'date' => $this->date->format('Y-m-d'),
            'is_closed' => $this->isClosed(),
        ]);
    }
}