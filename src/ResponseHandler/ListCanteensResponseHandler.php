<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Canteen;
use LeoVie\OpenMensaPhp\Model\Collection\CanteenCollection;
use LeoVie\OpenMensaPhp\Model\Coordinates;

class ListCanteensResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): CanteenCollection
    {
        $rawCanteens = json_decode($response, true);

        return new CanteenCollection(
            array_map(
                fn(array $rawCanteen): Canteen => new Canteen(
                    $rawCanteen['id'],
                    $rawCanteen['name'],
                    $rawCanteen['city'],
                    $rawCanteen['address'],
                    new Coordinates(
                        $rawCanteen['coordinates'][0] ?? null,
                        $rawCanteen['coordinates'][1] ?? null,
                    )
                ),
                $rawCanteens
            )
        );
    }
}