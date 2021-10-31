<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\ResponseHandler;

use LeoVie\OpenMensaPhp\Model\Day;

class GetSingleDayResponseHandler implements OpenMensaResponseHandler
{
    public function handle(string $response): Day
    {
        $rawDay = json_decode($response, true);

        return new Day(
            \DateTimeImmutable::createFromFormat('Y-m-d', $rawDay['date']),
            $rawDay['closed']
        );
    }
}