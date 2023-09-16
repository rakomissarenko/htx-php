<?php

namespace Feralonso\Htx\Api\Request;

use Feralonso\Htx\Exceptions\HtxValidateException;

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

    /**
     * @throws HtxValidateException
     */
    protected function validateList(string $value, string $name, array $list): void
    {
        if (!in_array($value, $list, true)) {
            $this->throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    protected function validateInteger(string $value, string $name): void
    {
        if (preg_match('/\D+/', $value)) {
            $this->throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    protected function validateNumeric(string $value, string $name): void
    {
        if (!is_numeric($value)) {
            $this->throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    protected function validateRange(string $value, string $name, string $min, ?string $max = null): void
    {
        if ($value < $min || ($max && $value > $max)) {
            $this->throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    protected function validateSize(string $value, string $name, int $size): void
    {
        if (mb_strlen($value) > $size) {
            $this->throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    protected function throwValidateException(string $name): void
    {
        throw new HtxValidateException(
            HtxValidateException::getErrorMessage($name),
            HtxValidateException::ERROR_INPUT_VALUE_INVALID
        );
    }

    public function toArray(): array
    {
        return [];
    }
}
