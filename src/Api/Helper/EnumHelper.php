<?php

namespace Feralonso\Htx\Api\Helper;

class EnumHelper
{
    private const ACTION_LOCK = 'lock';
    private const ACTION_UNLOCK = 'unlock';
    public const ACTIONS = [
        self::ACTION_LOCK,
        self::ACTION_UNLOCK,
    ];

    private const DEDUCT_MODE_MASTER = 'master';
    private const DEDUCT_MODE_SUB = 'sub';
    public const DEDUCT_MODES = [
        self::DEDUCT_MODE_MASTER,
        self::DEDUCT_MODE_SUB,
    ];

    private const DEPTH_5 = 5;
    private const DEPTH_10 = 10;
    private const DEPTH_20 = 20;
    public const DEPTHS = [
        self::DEPTH_5,
        self::DEPTH_10,
        self::DEPTH_20,
    ];

    private const DIRECT_NEXT = 'next';
    private const DIRECT_PREV = 'prev';
    public const DIRECTS = [
        self::DIRECT_NEXT,
        self::DIRECT_PREV,
    ];

    private const ORDER_BID_TYPE_LIMIT = 'limit';
    public const ORDER_BID_TYPE_MARKET = 'market';
    public const ORDER_BID_TYPES = [
        self::ORDER_BID_TYPE_LIMIT,
        self::ORDER_BID_TYPE_MARKET,
    ];

    public const ORDER_SIDE_BUY = 'buy';
    private const ORDER_SIDE_SELL = 'sell';
    public const ORDER_SIDES = [
        self::ORDER_SIDE_BUY,
        self::ORDER_SIDE_SELL,
    ];

    private const ORDER_STATUS_CANCELED = 'canceled';
    private const ORDER_STATUS_REJECTED = 'rejected';
    private const ORDER_STATUS_TRIGGERED = 'triggered';
    public const ORDER_STATUSES = [
        self::ORDER_STATUS_CANCELED,
        self::ORDER_STATUS_REJECTED,
        self::ORDER_STATUS_TRIGGERED,
    ];

    private const ORDER_TYPE_BUY_IOC = 'buy-ioc';
    private const ORDER_TYPE_BUY_LIMIT = 'buy-limit';
    private const ORDER_TYPE_BUY_LIMIT_FOK = 'buy-limit-fok';
    private const ORDER_TYPE_BUY_LIMIT_MARKET = 'buy-limit-maker';
    private const ORDER_TYPE_BUY_MARKET = 'buy-market';
    private const ORDER_TYPE_BUY_STOP_LIMIT = 'buy-stop-limit';
    private const ORDER_TYPE_BUY_STOP_LIMIT_FOK = 'buy-stop-limit-fok';
    private const ORDER_TYPE_SELL_IOC = 'sell-ioc';
    private const ORDER_TYPE_SELL_LIMIT = 'sell-limit';
    private const ORDER_TYPE_SELL_LIMIT_FOK = 'sell-limit-fok';
    private const ORDER_TYPE_SELL_LIMIT_MARKET = 'sell-limit-maker';
    private const ORDER_TYPE_SELL_MARKET = 'sell-market';
    private const ORDER_TYPE_SELL_STOP_LIMIT = 'sell-stop-limit';
    private const ORDER_TYPE_SELL_STOP_LIMIT_FOK = 'sell-stop-limit-fok';
    public const ORDER_TYPES = [
        self::ORDER_TYPE_BUY_IOC,
        self::ORDER_TYPE_BUY_LIMIT,
        self::ORDER_TYPE_BUY_LIMIT_FOK,
        self::ORDER_TYPE_BUY_LIMIT_MARKET,
        self::ORDER_TYPE_BUY_MARKET,
        self::ORDER_TYPE_BUY_STOP_LIMIT,
        self::ORDER_TYPE_BUY_STOP_LIMIT_FOK,
        self::ORDER_TYPE_SELL_IOC,
        self::ORDER_TYPE_SELL_LIMIT,
        self::ORDER_TYPE_SELL_LIMIT_FOK,
        self::ORDER_TYPE_SELL_LIMIT_MARKET,
        self::ORDER_TYPE_SELL_MARKET,
        self::ORDER_TYPE_SELL_STOP_LIMIT,
        self::ORDER_TYPE_SELL_STOP_LIMIT_FOK,
    ];

    private const PERIOD_1MIN = '1min';
    private const PERIOD_5MIN = '5min';
    private const PERIOD_15MIN = '15min';
    private const PERIOD_30MIN = '30min';
    private const PERIOD_60MIN = '60min';
    private const PERIOD_4HOUR = '4hour';
    private const PERIOD_1DAY = '1day';
    private const PERIOD_1MON = '1mon';
    private const PERIOD_1WEEK = '1week';
    private const PERIOD_1YEAR = '1year';
    public const PERIODS = [
        self::PERIOD_1MIN,
        self::PERIOD_5MIN,
        self::PERIOD_15MIN,
        self::PERIOD_30MIN,
        self::PERIOD_60MIN,
        self::PERIOD_4HOUR,
        self::PERIOD_1DAY,
        self::PERIOD_1MON,
        self::PERIOD_1WEEK,
        self::PERIOD_1YEAR,
    ];

    public const PERMISSION_KEY_READ_ONLY = 'readOnly';
    private const PERMISSION_KEY_TRADE = 'trade';
    public const PERMISSIONS = [
        self::PERMISSION_KEY_READ_ONLY,
        self::PERMISSION_KEY_TRADE,
    ];

    private const SORT_ASC = 'asc';
    private const SORT_DESC = 'desc';
    public const SORTS = [
        self::SORT_ASC,
        self::SORT_DESC,
    ];

    private const STEP_0 = 'step0';
    private const STEP_1 = 'step1';
    private const STEP_2 = 'step2';
    private const STEP_3 = 'step3';
    private const STEP_4 = 'step4';
    private const STEP_5 = 'step5';
    public const STEPS = [
        self::STEP_0,
        self::STEP_1,
        self::STEP_2,
        self::STEP_3,
        self::STEP_4,
        self::STEP_5,
    ];

    private const TRANSACTION_TYPE_CREDIT = 'credit';
    private const TRANSACTION_TYPE_DEPOSIT = 'deposit';
    private const TRANSACTION_TYPE_ETF = 'etf';
    private const TRANSACTION_TYPE_EXCHANGE = 'exchange';
    private const TRANSACTION_TYPE_FEE = 'fee-deduction';
    private const TRANSACTION_TYPE_INTEREST = 'interest';
    private const TRANSACTION_TYPE_LIQUIDATION = 'liquidation';
    private const TRANSACTION_TYPE_OTHER_TYPES = 'other-types';
    private const TRANSACTION_TYPE_REBATE = 'rebate';
    private const TRANSACTION_TYPE_TRADE = 'trade';
    private const TRANSACTION_TYPE_TRANSACT_FEE = 'transact-fee';
    private const TRANSACTION_TYPE_TRANSFER = 'transfer';
    private const TRANSACTION_TYPE_WITHDRAW = 'withdraw';
    private const TRANSACTION_TYPE_WITHDRAW_FEE = 'withdraw-fee';
    public const TRANSACTION_TYPES = [
        self::TRANSACTION_TYPE_CREDIT,
        self::TRANSACTION_TYPE_DEPOSIT,
        self::TRANSACTION_TYPE_ETF,
        self::TRANSACTION_TYPE_EXCHANGE,
        self::TRANSACTION_TYPE_FEE,
        self::TRANSACTION_TYPE_INTEREST,
        self::TRANSACTION_TYPE_LIQUIDATION,
        self::TRANSACTION_TYPE_OTHER_TYPES,
        self::TRANSACTION_TYPE_REBATE,
        self::TRANSACTION_TYPE_TRADE,
        self::TRANSACTION_TYPE_TRANSACT_FEE,
        self::TRANSACTION_TYPE_TRANSFER,
        self::TRANSACTION_TYPE_WITHDRAW,
        self::TRANSACTION_TYPE_WITHDRAW_FEE,
    ];
}
