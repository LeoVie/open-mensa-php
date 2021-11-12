<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model\Collection;

use LeoVie\OpenMensaPhp\Model\Meal;

class MealCollection implements \JsonSerializable
{
    /** @param Meal[] $meals */
    public function __construct(private array $meals)
    {
    }

    /** @return Meal[] */
    public function getMeals(): array
    {
        return $this->meals;
    }

    public function jsonSerialize(): string
    {
        return json_encode(
            array_map(
                fn(Meal $m): array => json_decode($m->jsonSerialize(), true),
                $this->meals
            )
        );
    }
}