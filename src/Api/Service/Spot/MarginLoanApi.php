<?php

namespace Feralonso\Htx\Api\Service\Spot;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceCrossRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\LimitRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoCrossRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersCrossRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayInfoRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderCrossRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersCrossRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInCrossMarginRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInMarginRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutCrossMarginRequest;
use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutMarginRequest;
use Feralonso\Htx\Api\Response\Response;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class MarginLoanApi extends AbstractApi
{
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
    public function balanceCross(BalanceCrossRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function limit(LimitRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function loanInfo(LoanInfoRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function loanInfoCross(LoanInfoCrossRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function orders(OrdersRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function ordersCross(OrdersCrossRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repay(RepayRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayInfo(RepayInfoRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayOrder(RepayOrderRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayOrderCross(RepayOrderCrossRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function searchOrders(SearchOrdersRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function searchOrdersCross(SearchOrdersCrossRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferInCrossMargin(TransferInCrossMarginRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferInMargin(TransferInMarginRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferOutCrossMargin(TransferOutCrossMarginRequest $request): Response
    {
        return new Response($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferOutMargin(TransferOutMarginRequest $request): Response
    {
        return new Response($this->send($request));
    }
}
