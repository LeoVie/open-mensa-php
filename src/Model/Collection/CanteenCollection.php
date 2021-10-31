<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model\Collection;

use LeoVie\OpenMensaPhp\Model\Canteen;

class CanteenCollection implements \JsonSerializable
{
    /** @param Canteen[] $canteens */
    public function __construct(private array $canteens)
    {
    }

    /** @return Canteen[] */
    public function getCanteens(): array
    {
        return $this->canteens;
    }

    public function jsonSerialize(): string
    {
        return json_encode(
            array_map(
                fn(Canteen $c): array => json_decode($c->jsonSerialize(), true),
                $this->canteens
            )
        );
    }
}