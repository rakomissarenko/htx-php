<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\AddressData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class AddressDepositResponse extends AbstractResponse
{
    /**
     * @var AddressData[]
     */
    private array $addresses = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        foreach ($data as $addressData) {
            if (is_array($addressData)) {
                $this->addresses[] = AddressData::initByArray($addressData);
            }
        }
    }

    /**
     * @return AddressData[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }
}
