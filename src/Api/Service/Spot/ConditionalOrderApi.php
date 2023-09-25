<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CancelRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CreateRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\HistoryRequest;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\OpenRequest;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\CancelResponse;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\CreateResponse;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\HistoryResponse;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\OpenResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ConditionalOrderApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function cancel(CancelRequest $request): CancelResponse
    {
        return new CancelResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function create(CreateRequest $request): CreateResponse
    {
        return new CreateResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function history(HistoryRequest $request): HistoryResponse
    {
        return new HistoryResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function open(OpenRequest $request): OpenResponse
    {
        return new OpenResponse($this->send($request));
    }
}
