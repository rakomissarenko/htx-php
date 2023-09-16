<?php

namespace Feralonso\Htx\Api\Service;

use Feralonso\Htx\Api\Request\RequestInterface;
use Feralonso\Htx\Exceptions\HtxValidateException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;

class AbstractApi
{
    private const HOST = 'https://api.huobi.pro';
    private const TIMEOUT = 15;

    private const FIELD_ACCESS_KEY = 'AccessKeyId';
    private const FIELD_SIGNATURE = 'Signature';
    private const FIELD_SIGNATURE_METHOD = 'SignatureMethod';
    private const FIELD_SIGNATURE_VERSION = 'SignatureVersion';
    private const FIELD_TIMESTAMP = 'Timestamp';

    private const SIGNATURE_METHOD = 'HmacSHA256';
    private const SIGNATURE_VERSION = 2;

    private const HASH_METHOD = 'sha256';

    private ?string $proxy = null;

    public function __construct(
        private string $accessKey,
        private string $secretKey,
    ) {}

    /**
     * @throws HtxValidateException
     */
    protected function send(RequestInterface $request): string
    {
        $request->validate();

        $params = $this->getParams($request);

        $url = self::HOST . $request->getPath();
        $method = $request->getMethod();
        if ($request->isMethodGet()) {
            $url .= '?' . http_build_query($params);
            $body = null;
        } else {
            $body = $params;
        }

        $httpRequest = new Request($method, $url, [], $body);
        $httpClient = new Client();

        $options = [RequestOptions::TIMEOUT => self::TIMEOUT];
        if ($this->proxy) {
            $options[RequestOptions::PROXY] = $this->proxy;
        }

        try {
            $httpResponse = $httpClient->send($httpRequest, $options);

            $statusCode = $httpResponse->getStatusCode();
            $result = $httpResponse->getBody()->getContents();

            if ($statusCode < 200 || $statusCode >= 300) {
                $errNum = $statusCode;
                $errDesc = $httpResponse->getBody()->getContents() ?: $httpResponse->getReasonPhrase();
                throw new HtxValidateException($errDesc, $errNum);
            }
        } catch (GuzzleException $exception) {
            $contents = method_exists($exception, 'getResponse') ? $exception->getResponse()?->getBody()->getContents() : '';
            throw new HtxValidateException($exception->getMessage() . ': ' . $contents, $exception->getCode());
        }

        return $result;
    }

    private function getParams(RequestInterface $request): array
    {
        $result = array_merge($this->getDefaultParams(), $request->toArray());
        ksort($result);

        $result[self::FIELD_SIGNATURE] = $this->getSignature(implode(PHP_EOL, [
            $request->getMethod(),
            parse_url(self::HOST, PHP_URL_HOST),
            $request->getPath(),
            http_build_query($result),
        ]));

        return $result;
    }

    private function getDefaultParams(): array
    {
        return [
            self::FIELD_ACCESS_KEY        => $this->accessKey,
            self::FIELD_SIGNATURE_METHOD  => self::SIGNATURE_METHOD,
            self::FIELD_SIGNATURE_VERSION => self::SIGNATURE_VERSION,
            self::FIELD_TIMESTAMP         => gmdate('Y-m-d\TH:i:s'),
        ];
    }

    private function getSignature(string $data): string
    {
        return base64_encode(hash_hmac(self::HASH_METHOD, $data, $this->secretKey, true));
    }
}