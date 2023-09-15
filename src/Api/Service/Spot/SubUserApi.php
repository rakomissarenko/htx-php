<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\SubUser\AccountListRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\AggregateBalanceRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyCreateRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyDeleteRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyModifyRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\BalanceRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\CreationRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\DeductModeRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\DepositAddressRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\ManagementRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\QueryDepositRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\TradableMarketRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferabilityRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\UidRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\UserListRequest;
use Feralonso\Htx\Api\Request\Spot\SubUser\UserStateRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SubUserApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function accountList(AccountListRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function aggregateBalance(AggregateBalanceRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKey(ApiKeyRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyCreate(ApiKeyCreateRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyDelete(ApiKeyDeleteRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyModify(ApiKeyModifyRequest $request): Response
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
    public function creation(CreationRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function deductMode(DeductModeRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function depositAddress(DepositAddressRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function management(ManagementRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function queryDeposit(QueryDepositRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function tradableMarket(TradableMarketRequest $request): Response
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

    /**
     * @throws HtxValidateException
     */
    public function transferability(TransferabilityRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function uid(UidRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function userList(UserListRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function userState(UserStateRequest $request): Response
    {
        return new Response($this->send($request));
    }
}
