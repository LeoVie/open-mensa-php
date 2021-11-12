<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Model;

class Prices implements \JsonSerializable
{
    public function __construct(
        private ?float $studentsPrice,
        private ?float $employeesPrice,
        private ?float $pupilsPrice,
        private ?float $othersPrice,
    )
    {
    }

    public function getStudentsPrice(): ?float
    {
        return $this->studentsPrice;
    }

    public function getEmployeesPrice(): ?float
    {
        return $this->employeesPrice;
    }

    public function getPupilsPrice(): ?float
    {
        return $this->pupilsPrice;
    }

    public function getOthersPrice(): ?float
    {
        return $this->othersPrice;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'students' => $this->studentsPrice,
            'employees' => $this->employeesPrice,
            'pupils' => $this->pupilsPrice,
            'others' => $this->othersPrice,
        ]);
    }
}