<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model;

class Canteen implements \JsonSerializable
{
    public function __construct(
        private int         $id,
        private string      $name,
        private string      $city,
        private string      $address,
        private Coordinates $coordinates
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

    public function getCity(): string
    {
        return $this->city;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'coordinates' => json_decode($this->coordinates->jsonSerialize(), true),
        ]);
    }
}