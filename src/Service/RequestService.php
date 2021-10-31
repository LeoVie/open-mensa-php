<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Service;

use GuzzleHttp\Client;
use LeoVie\OpenMensaPhp\Model\Canteen;
use LeoVie\OpenMensaPhp\Model\Collection\CanteenCollection;
use LeoVie\OpenMensaPhp\Model\Collection\DayCollection;
use LeoVie\OpenMensaPhp\Model\Collection\MealCollection;
use LeoVie\OpenMensaPhp\Model\Day;
use LeoVie\OpenMensaPhp\Model\Meal;
use LeoVie\OpenMensaPhp\Request\OpenMensaRequest;

class RequestService
{
    private const BASE_URL = 'https://openmensa.org/api/v2';

    public function request(OpenMensaRequest $request): Canteen|Day|Meal|CanteenCollection|MealCollection|DayCollection
    {
        $url = self::BASE_URL . $request->getEndpoint();

        $response = (new Client())->request('GET', $url);

        return $request->getResponseHandler()->handle($response->getBody()->getContents());
    }
}