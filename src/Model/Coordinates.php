<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model;

class Coordinates implements \JsonSerializable
{
    public function __construct(private ?float $latitude, private ?float $longitude)
    {
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);
    }
}