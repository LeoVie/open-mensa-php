<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\GetSingleCanteenResponseHandler;
use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

class GetSingleCanteen implements OpenMensaRequest
{
    private const ENDPOINT = '/canteens/:id';

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
        return new GetSingleCanteenResponseHandler();
    }
}