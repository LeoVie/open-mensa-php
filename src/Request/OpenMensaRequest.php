<?php

declare(strict_types=1);

namespace LeoVie\OpenMensaPhp\Request;

use LeoVie\OpenMensaPhp\ResponseHandler\OpenMensaResponseHandler;

interface OpenMensaRequest
{
    public function getEndpoint(): string;

    public function getResponseHandler(): OpenMensaResponseHandler;
}