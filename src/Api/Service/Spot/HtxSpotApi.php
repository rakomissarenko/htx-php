<?php

namespace Feralonso\Htx\Api\Service\Spot;

class HtxSpotApi
{
    public function __construct(
        private string $accessKey,
        private string $secretKey,
    ) {}

    public function account(): AccountApi
    {
        return new AccountApi($this->accessKey, $this->secretKey);
    }

    public function common(): CommonApi
    {
        return new CommonApi($this->accessKey, $this->secretKey);
    }

    public function conditionalOrder(): ConditionalOrderApi
    {
        return new ConditionalOrderApi($this->accessKey, $this->secretKey);
    }

    public function marginLoan(): MarginLoanApi
    {
        return new MarginLoanApi($this->accessKey, $this->secretKey);
    }

    public function market(): MarketApi
    {
        return new MarketApi($this->accessKey, $this->secretKey);
    }

    public function subUser(): SubUserApi
    {
        return new SubUserApi($this->accessKey, $this->secretKey);
    }

    public function trading(): TradingApi
    {
        return new TradingApi($this->accessKey, $this->secretKey);
    }

    public function wallet(): WalletApi
    {
        return new WalletApi($this->accessKey, $this->secretKey);
    }
}
