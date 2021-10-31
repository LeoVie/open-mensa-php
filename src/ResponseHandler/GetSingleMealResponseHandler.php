<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Meal;
use LeoVie\OpenMensaPhp\Model\Prices;

class GetSingleMealResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): Meal
    {
        $rawMeal = json_decode($response, true);

        return new Meal(
            $rawMeal['id'],
            $rawMeal['name'],
            $rawMeal['category'],
            new Prices(
                $rawMeal['prices']['students'],
                $rawMeal['prices']['employees'],
                $rawMeal['prices']['pupils'],
                $rawMeal['prices']['others'],
            ),
            $rawMeal['notes']
        );
    }
}