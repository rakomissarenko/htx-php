<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Market\CandlesRequest;
use Feralonso\Htx\Api\Request\Spot\Market\DepthRequest;
use Feralonso\Htx\Api\Request\Spot\Market\DetailRequest;
use Feralonso\Htx\Api\Request\Spot\Market\TickerRequest;
use Feralonso\Htx\Api\Request\Spot\Market\TickersRequest;
use Feralonso\Htx\Api\Request\Spot\Market\TradeHistoryRequest;
use Feralonso\Htx\Api\Request\Spot\Market\TradeRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Response\Spot\Market\CandlesResponse;
use Feralonso\Htx\Api\Response\Spot\Market\DepthResponse;
use Feralonso\Htx\Api\Response\Spot\Market\DetailResponse;
use Feralonso\Htx\Api\Response\Spot\Market\TickerResponse;
use Feralonso\Htx\Api\Response\Spot\Market\TickersResponse;
use Feralonso\Htx\Api\Response\Spot\Market\TradeHistoryResponse;
use Feralonso\Htx\Api\Response\Spot\Market\TradeResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class MarketApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function candles(CandlesRequest $request): CandlesResponse
    {
        return new CandlesResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function depth(DepthRequest $request): DepthResponse
    {
        return new DepthResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function detail(DetailRequest $request): DetailResponse
    {
        return new DetailResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function ticker(TickerRequest $request): TickerResponse
    {
        return new TickerResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function tickers(TickersRequest $request): TickersResponse
    {
        return new TickersResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function trade(TradeRequest $request): TradeResponse
    {
        return new TradeResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function tradeHistory(TradeHistoryRequest $request): TradeHistoryResponse
    {
        return new TradeHistoryResponse($this->send($request));
    }
}
