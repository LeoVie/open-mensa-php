<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model;

class Meal implements \JsonSerializable
{
    /** @param string[] $notes */
    public function __construct(
        private int    $id,
        private string $name,
        private string $category,
        private Prices $prices,
        private array  $notes
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPrices(): Prices
    {
        return $this->prices;
    }

    /** @return string[] */
    public function getNotes(): array
    {
        return $this->notes;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'prices' => json_decode($this->prices->jsonSerialize(), true),
            'notes' => $this->notes,
        ]);
    }
}