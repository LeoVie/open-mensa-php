<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\ListDaysOfCanteenResponseHandler;
use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

class ListDaysOfCanteen implements OpenMensaRequest
{
    private const ENDPOINT = '/canteens/:id/days';

    public function __construct(
        private int $id
    )
    {
    }

    public function getEndpoint(): string
    {
        return str_replace(':id', (string)$this->id, self::ENDPOINT);
    }

    public function getResponseHandler(): OpenMensaResponseHandler
    {
        return new ListDaysOfCanteenResponseHandler();
    }
}