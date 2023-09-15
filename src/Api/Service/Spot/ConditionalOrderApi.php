<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CancelRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CreateRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\HistoryRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\OpenRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ConditionalOrderApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function cancel(CancelRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function create(CreateRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function history(HistoryRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function open(OpenRequest $request): Response
    {
        return new Response($this->send($request));
    }
}
