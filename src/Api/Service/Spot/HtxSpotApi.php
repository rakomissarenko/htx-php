<?php

namespace Feralonso\Htx\Api\Service\Spot;

class HtxSpotApi
{
    private ?string $proxy = null;

    public function __construct(
        private string $accessKey,
        private string $secretKey,
    ) {}

    public function setProxy(string $proxy): void
    {
        $this->proxy = $proxy;
    }

    public function account(): AccountApi
    {
        $result = new AccountApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function common(): CommonApi
    {
        $result = new CommonApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function conditionalOrder(): ConditionalOrderApi
    {
        $result = new ConditionalOrderApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function marginLoan(): MarginLoanApi
    {
        $result = new MarginLoanApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function market(): MarketApi
    {
        $result = new MarketApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function subUser(): SubUserApi
    {
        $result = new SubUserApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function trading(): TradingApi
    {
        $result = new TradingApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }

    public function wallet(): WalletApi
    {
        $result = new WalletApi($this->accessKey, $this->secretKey);
        if ($this->proxy) {
            $result->setProxy($this->proxy);
        }

        return $result;
    }
}
