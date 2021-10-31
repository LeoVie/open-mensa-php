<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Canteen;
use LeoVie\OpenMensaPhp\Model\Coordinates;

class GetSingleCanteenResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): Canteen
    {
        $rawCanteen = json_decode($response, true);

        return new Canteen(
            $rawCanteen['id'],
            $rawCanteen['name'],
            $rawCanteen['city'],
            $rawCanteen['address'],
            new Coordinates(
                $rawCanteen['coordinates'][0] ?? null,
                $rawCanteen['coordinates'][1] ?? null,
            )
        );
    }
}