<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\ListCanteensResponseHandler;
use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

class ListCanteens implements OpenMensaRequest
{
    private const ENDPOINT = '/canteens/?page=:page';

    public function __construct(private int $page = 1)
    {
    }

    public function getEndpoint(): string
    {
        return str_replace(':page', (string)$this->page, self::ENDPOINT);
    }

    public function getResponseHandler(): OpenMensaResponseHandler
    {
        return new ListCanteensResponseHandler();
    }
}