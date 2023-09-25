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
    public function addressWithdraw(AddressWithdrawRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function cancelWithdraw(CancelWithdrawRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function createWithdraw(CreateWithdrawRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function infoWithdraw(InfoWithdrawRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function quotaWithdraw(QuotaWithdrawRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function search(SearchRequest $request): Response
    {
        return new Response($this->send($request));
    }
}
