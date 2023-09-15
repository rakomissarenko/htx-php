<?php

namespace Feralonso\Htx\Api\Request;

use Feralonso\Htx\Exceptions\HtxValidateException;

interface RequestInterface
{
    public function getMethod(): string;

    public function isMethodGet(): bool;

    public function getPath(): string;

    public function getPermission(): string;

    /**
     * @throws HtxValidateException
     */
    public function validate(): void;

    public function toArray(): array;
}
