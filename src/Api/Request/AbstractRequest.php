<?php

namespace Feralonso\Htx\Api\Request;

abstract class AbstractRequest implements RequestInterface
{
    protected const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';

    private const PERMISSION_READ = 'Read';
    protected const PERMISSION_TRADE = 'Trade';
    protected const PERMISSION_WITHDRAW = 'Withdraw';

    protected const METHOD = self::METHOD_POST;
    protected const PATH = '';
    protected const PERMISSION = self::PERMISSION_READ;

    public function getMethod(): string
    {
        return static::METHOD;
    }

    public function isMethodGet(): bool
    {
        return static::METHOD === self::METHOD_GET;
    }

    public function getPath(): string
    {
        return static::PATH;
    }

    public function getPermission(): string
    {
        return static::PERMISSION;
    }

    public function validate(): void
    {
    }

    public function toArray(): array
    {
        return [];
    }
}
