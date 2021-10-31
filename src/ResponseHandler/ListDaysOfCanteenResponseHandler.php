<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Collection\DayCollection;
use LeoVie\OpenMensaPhp\Model\Day;

class ListDaysOfCanteenResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): DayCollection
    {
        $rawDays = json_decode($response, true);

        return new DayCollection(
            array_map(
                fn(array $rawDay): Day => new Day(
                    \DateTimeImmutable::createFromFormat('Y-m-d', $rawDay['date']),
                    $rawDay['closed']
                ),
                $rawDays
            )
        );
    }
}