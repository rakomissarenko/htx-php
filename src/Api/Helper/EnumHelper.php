<?php

namespace Feralonso\Htx\Api\Helper;

class EnumHelper
{
    private const DIRECT_NEXT = 'next';
    private const DIRECT_PREV = 'prev';
    public const DIRECTS = [
        self::DIRECT_NEXT,
        self::DIRECT_PREV,
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
}
