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
}
