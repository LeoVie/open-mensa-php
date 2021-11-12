<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Collection\MealCollection;
use LeoVie\OpenMensaPhp\Model\Meal;
use LeoVie\OpenMensaPhp\Model\Prices;

class ListMealsOfDayResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): MealCollection
    {
        $rawMeals = json_decode($response, true);

        return new MealCollection(
            array_map(
                fn(array $rawMeal): Meal => new Meal(
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
                ),
                $rawMeals
            )
        );
    }
}