<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Wallet\AddressDepositRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\AddressWithdrawRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\CancelWithdrawRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\CreateWithdrawRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\InfoWithdrawRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\QuotaWithdrawRequest;
use Feralonso\Htx\Api\Request\Spot\Wallet\SearchRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressDepositResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressWithdrawResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\CancelWithdrawResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\CreateWithdrawResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\InfoWithdrawResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\QuotaWithdrawResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\SearchResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class WalletApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function addressDeposit(AddressDepositRequest $request): AddressDepositResponse
    {
        return new AddressDepositResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function addressWithdraw(AddressWithdrawRequest $request): AddressWithdrawResponse
    {
        return new AddressWithdrawResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function cancelWithdraw(CancelWithdrawRequest $request): CancelWithdrawResponse
    {
        return new CancelWithdrawResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function createWithdraw(CreateWithdrawRequest $request): CreateWithdrawResponse
    {
        return new CreateWithdrawResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function infoWithdraw(InfoWithdrawRequest $request): InfoWithdrawResponse
    {
        return new InfoWithdrawResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function quotaWithdraw(QuotaWithdrawRequest $request): QuotaWithdrawResponse
    {
        return new QuotaWithdrawResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function search(SearchRequest $request): SearchResponse
    {
        return new SearchResponse($this->send($request));
    }
}
