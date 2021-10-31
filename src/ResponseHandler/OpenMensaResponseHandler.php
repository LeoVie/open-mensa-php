<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Canteen;
use LeoVie\OpenMensaPhp\Model\Collection\CanteenCollection;
use LeoVie\OpenMensaPhp\Model\Collection\DayCollection;
use LeoVie\OpenMensaPhp\Model\Collection\MealCollection;
use LeoVie\OpenMensaPhp\Model\Day;
use LeoVie\OpenMensaPhp\Model\Meal;

interface OpenMensaResponseHandler
{
    public function handle(string $response): Canteen|Day|Meal|CanteenCollection|MealCollection|DayCollection;
}