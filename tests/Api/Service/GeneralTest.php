<?php

namespace Feralonso\Tests\Api\Service;

use Feralonso\Htx\Exceptions\HtxValidateException;

class GeneralTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = static::getResponse($content);

        $this->checkResponse($response);
    }
}
