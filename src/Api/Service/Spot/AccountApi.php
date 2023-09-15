<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Account\AccountsRequest;
use Feralonso\Htx\Api\Request\Spot\Account\BalanceRequest;
use Feralonso\Htx\Api\Request\Spot\Account\HistoryRequest;
use Feralonso\Htx\Api\Request\Spot\Account\LedgerRequest;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class AccountApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function accounts(AccountsRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function balance(BalanceRequest $request): Response
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
    public function ledger(LedgerRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferFutures(TransferFuturesRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transfer(TransferRequest $request): Response
    {
        return new Response($this->send($request));
    }
}
