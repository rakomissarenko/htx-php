<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelAllAfterRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchOpenOrdersRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CancelClientRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CancelRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateBatchRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\FeeRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\HistoryRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsOrderRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\OpenOrdersRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\OrderClientRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\OrderRequest;
use Feralonso\Htx\Api\Request\Spot\Trading\OrdersRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelAllAfterResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelBatchOpenOrdersResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelBatchResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelClientResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CreateBatchResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\CreateResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\FeeResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\HistoryResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsOrderResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\OpenOrdersResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderClientResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderResponse;
use Feralonso\Htx\Api\Response\Spot\Trading\OrdersResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TradingApi extends AbstractApi
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
    public function cancelAllAfter(CancelAllAfterRequest $request): CancelAllAfterResponse
    {
        return new CancelAllAfterResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function cancelBatch(CancelBatchRequest $request): CancelBatchResponse
    {
        return new CancelBatchResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function cancelBatchOpenOrders(CancelBatchOpenOrdersRequest $request): CancelBatchOpenOrdersResponse
    {
        return new CancelBatchOpenOrdersResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function cancelClient(CancelClientRequest $request): CancelClientResponse
    {
        return new CancelClientResponse($this->send($request));
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
    public function createBatch(CreateBatchRequest $request): CreateBatchResponse
    {
        return new CreateBatchResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function fee(FeeRequest $request): FeeResponse
    {
        return new FeeResponse($this->send($request));
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
    public function matchResults(MatchResultsRequest $request): MatchResultsResponse
    {
        return new MatchResultsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function matchResultsOrder(MatchResultsOrderRequest $request): MatchResultsOrderResponse
    {
        return new MatchResultsOrderResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function openOrders(OpenOrdersRequest $request): OpenOrdersResponse
    {
        return new OpenOrdersResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function order(OrderRequest $request): OrderResponse
    {
        return new OrderResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function orderClient(OrderClientRequest $request): OrderClientResponse
    {
        return new OrderClientResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function orders(OrdersRequest $request): OrdersResponse
    {
        return new OrdersResponse($this->send($request));
    }
}
