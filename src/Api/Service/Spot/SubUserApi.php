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
use Feralonso\Htx\Api\Response\Spot\SubUser\AccountListResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\AggregateBalanceResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyCreateResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyDeleteResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyModifyResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\BalanceResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\CreationResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\DeductModeResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\DepositAddressResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\ManagementResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\QueryDepositResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\TradableMarketResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\TransferabilityResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\TransferResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\UidResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserListResponse;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserStateResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SubUserApi extends AbstractApi
{
    /**
     * @throws HtxValidateException
     */
    public function accountList(AccountListRequest $request): AccountListResponse
    {
        return new AccountListResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function aggregateBalance(AggregateBalanceRequest $request): AggregateBalanceResponse
    {
        return new AggregateBalanceResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKey(ApiKeyRequest $request): ApiKeyResponse
    {
        return new ApiKeyResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyCreate(ApiKeyCreateRequest $request): ApiKeyCreateResponse
    {
        return new ApiKeyCreateResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyDelete(ApiKeyDeleteRequest $request): ApiKeyDeleteResponse
    {
        return new ApiKeyDeleteResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function apiKeyModify(ApiKeyModifyRequest $request): ApiKeyModifyResponse
    {
        return new ApiKeyModifyResponse($this->send($request));
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
    public function creation(CreationRequest $request): CreationResponse
    {
        return new CreationResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function deductMode(DeductModeRequest $request): DeductModeResponse
    {
        return new DeductModeResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function depositAddress(DepositAddressRequest $request): DepositAddressResponse
    {
        return new DepositAddressResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function management(ManagementRequest $request): ManagementResponse
    {
        return new ManagementResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function queryDeposit(QueryDepositRequest $request): QueryDepositResponse
    {
        return new QueryDepositResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function tradableMarket(TradableMarketRequest $request): TradableMarketResponse
    {
        return new TradableMarketResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transfer(TransferRequest $request): TransferResponse
    {
        return new TransferResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferability(TransferabilityRequest $request): TransferabilityResponse
    {
        return new TransferabilityResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function uid(UidRequest $request): UidResponse
    {
        return new UidResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function userList(UserListRequest $request): UserListResponse
    {
        return new UserListResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function userState(UserStateRequest $request): UserStateResponse
    {
        return new UserStateResponse($this->send($request));
    }
}
