<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\GetSingleMealResponseHandler;
use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

class GetSingleMeal implements OpenMensaRequest
{
    private const ENDPOINT = '/canteens/:id/days/:day_date/meals/:meal_id';

    public function __construct(
        private int $id,
        private \DateTimeImmutable $dayDate,
        private int $mealId
    )
    {
    }

    public function getEndpoint(): string
    {
        return str_replace(
            [':id', ':day_date', ':meal_id'],
            [(string)$this->id, $this->dayDate->format('Y-m-d'), $this->mealId],
            self::ENDPOINT
        );
    }

    public function getResponseHandler(): OpenMensaResponseHandler
    {
        return new GetSingleMealResponseHandler();
    }
}