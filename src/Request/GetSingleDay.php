<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\GetSingleDayResponseHandler;
use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

class GetSingleDay implements OpenMensaRequest
{
    private const ENDPOINT = '/canteens/:id/days/:day_date';

    public function __construct(
        private int $id,
        private \DateTimeImmutable $dayDate
    )
    {
    }

    public function getEndpoint(): string
    {
        return str_replace(
            [':id', ':day_date'],
            [(string)$this->id, $this->dayDate->format('Y-m-d')],
            self::ENDPOINT
        );
    }

    public function getResponseHandler(): OpenMensaResponseHandler
    {
        return new GetSingleDayResponseHandler();
    }
}