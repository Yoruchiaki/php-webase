<?php

namespace Yoruchiaki\Webase;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Yoruchiaki\Webase\Helpers\Signature;

class HttpRequest
{
    private AppConfig $appConfig;
    private Client    $http;

    public function __construct(AppConfig $appConfig)
    {
        $this->appConfig = $appConfig;
        $this->http = new Client(
            [
                'base_uri' => $this->appConfig->nodeManagerUrl,
                'timeout'  => $this->appConfig->timeout
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $url,
        array $params = []
    ): \stdClass {
        $options = strtoupper($method) === 'POST' ? array_merge([
            'query' => $this->signed_url(),
            'json'  => $params
        ]) : array_merge([
            'query' => array_merge($params, $this->signed_url()),
            'json'  => []
        ]);
        $response = $this->http->request(
            $method,
            $url,
            $options
        );
        if ($response->getReasonPhrase() === 'OK') {
            return Utils::jsonDecode($response->getBody()->getContents());
        }
        return Utils::jsonDecode($response->getBody()->getContents());
    }

    private function signed_url(): array
    {
        $timestamp = bcmul(time(), 1000);
        $appKey = $this->appConfig->appKey;
        $appSecret = $this->appConfig->appSecret;
        $signature = Signature::md5Encrypt($timestamp, $appKey, $appSecret);
        return compact('timestamp', 'signature', 'appKey');
    }
}