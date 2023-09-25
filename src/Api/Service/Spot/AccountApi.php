<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\Account\AccountsRequest;
use Feralonso\Htx\Api\Request\Spot\Account\BalanceRequest;
use Feralonso\Htx\Api\Request\Spot\Account\HistoryRequest;
use Feralonso\Htx\Api\Request\Spot\Account\LedgerRequest;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Api\Response\Spot\Account\AccountsResponse;
use Feralonso\Htx\Api\Response\Spot\Account\BalanceResponse;
use Feralonso\Htx\Api\Response\Spot\Account\HistoryResponse;
use Feralonso\Htx\Api\Response\Spot\Account\LedgerResponse;
use Feralonso\Htx\Api\Response\Spot\Account\TransferFuturesResponse;
use Feralonso\Htx\Api\Response\Spot\Account\TransferResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class AccountApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function accounts(AccountsRequest $request): AccountsResponse
    {
        return new AccountsResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function balance(BalanceRequest $request): BalanceResponse
    {
        return new BalanceResponse($this->send($request));
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
    public function ledger(LedgerRequest $request): LedgerResponse
    {
        return new LedgerResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferFutures(TransferFuturesRequest $request): TransferFuturesResponse
    {
        return new TransferFuturesResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transfer(TransferRequest $request): TransferResponse
    {
        return new TransferResponse($this->send($request));
    }
}
