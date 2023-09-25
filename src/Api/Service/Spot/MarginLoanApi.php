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
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceCrossResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LimitResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoCrossResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersCrossResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayInfoResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayOrderCrossResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayOrderResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersCrossResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferInCrossMarginResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferInMarginResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferOutCrossMarginResponse;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferOutMarginResponse;
use Feralonso\Htx\Api\Service\AbstractApi;
use Feralonso\Htx\Exceptions\HtxValidateException;

class MarginLoanApi extends AbstractApi
{
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
    public function balanceCross(BalanceCrossRequest $request): BalanceCrossResponse
    {
        return new BalanceCrossResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function limit(LimitRequest $request): LimitResponse
    {
        return new LimitResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function loanInfo(LoanInfoRequest $request): LoanInfoResponse
    {
        return new LoanInfoResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function loanInfoCross(LoanInfoCrossRequest $request): LoanInfoCrossResponse
    {
        return new LoanInfoCrossResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function orders(OrdersRequest $request): OrdersResponse
    {
        return new OrdersResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function ordersCross(OrdersCrossRequest $request): OrdersCrossResponse
    {
        return new OrdersCrossResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repay(RepayRequest $request): RepayResponse
    {
        return new RepayResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayInfo(RepayInfoRequest $request): RepayInfoResponse
    {
        return new RepayInfoResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayOrder(RepayOrderRequest $request): RepayOrderResponse
    {
        return new RepayOrderResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function repayOrderCross(RepayOrderCrossRequest $request): RepayOrderCrossResponse
    {
        return new RepayOrderCrossResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function searchOrders(SearchOrdersRequest $request): SearchOrdersResponse
    {
        return new SearchOrdersResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function searchOrdersCross(SearchOrdersCrossRequest $request): SearchOrdersCrossResponse
    {
        return new SearchOrdersCrossResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferInCrossMargin(TransferInCrossMarginRequest $request): TransferInCrossMarginResponse
    {
        return new TransferInCrossMarginResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferInMargin(TransferInMarginRequest $request): TransferInMarginResponse
    {
        return new TransferInMarginResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferOutCrossMargin(TransferOutCrossMarginRequest $request): TransferOutCrossMarginResponse
    {
        return new TransferOutCrossMarginResponse($this->send($request));
    }

    /**
     * @throws HtxValidateException
     */
    public function transferOutMargin(TransferOutMarginRequest $request): TransferOutMarginResponse
    {
        return new TransferOutMarginResponse($this->send($request));
    }
}
