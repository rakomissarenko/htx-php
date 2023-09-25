<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Common\ChainsRequest;
use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesRequest;
use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesSettingsRequest;
use Feralonso\Htx\Api\Request\Spot\Common\CurrencyChainsRequest;
use Feralonso\Htx\Api\Request\Spot\Common\StatusMarketRequest;
use Feralonso\Htx\Api\Request\Spot\Common\SymbolsMarketRequest;
use Feralonso\Htx\Api\Request\Spot\Common\SymbolsRequest;
use Feralonso\Htx\Api\Request\Spot\Common\SymbolsSettingsRequest;
use Feralonso\Htx\Api\Request\Spot\Common\TimestampRequest;
use Feralonso\Htx\Api\Response\Spot\Common\ChainsResponse;
use Feralonso\Htx\Api\Response\Spot\Common\CurrenciesResponse;
use Feralonso\Htx\Api\Response\Spot\Common\CurrenciesSettingsResponse;
use Feralonso\Htx\Api\Response\Spot\Common\CurrencyChainsResponse;
use Feralonso\Htx\Api\Response\Spot\Common\StatusMarketResponse;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsMarketResponse;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsResponse;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsSettingsResponse;
use Feralonso\Htx\Api\Response\Spot\Common\TimestampResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CommonApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function chains(ChainsRequest $request): ChainsResponse
    {
        return new ChainsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function currencies(CurrenciesRequest $request): CurrenciesResponse
    {
        return new CurrenciesResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function currenciesSettings(CurrenciesSettingsRequest $request): CurrenciesSettingsResponse
    {
        return new CurrenciesSettingsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function currencyChains(CurrencyChainsRequest $request): CurrencyChainsResponse
    {
        return new CurrencyChainsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function statusMarket(StatusMarketRequest $request): StatusMarketResponse
    {
        return new StatusMarketResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function symbols(SymbolsRequest $request): SymbolsResponse
    {
        return new SymbolsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function symbolsMarket(SymbolsMarketRequest $request): SymbolsMarketResponse
    {
        return new SymbolsMarketResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function symbolsSettings(SymbolsSettingsRequest $request): SymbolsSettingsResponse
    {
        return new SymbolsSettingsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function timestamp(TimestampRequest $request): TimestampResponse
    {
        return new TimestampResponse($this->send($request));
    }
}
