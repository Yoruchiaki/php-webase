<?php

namespace Yoruchiaki\Webase;

class AppConfig
{
    public string $nodeManagerUrl;
    // 应用Key
    public string $appKey;
    // 应用密码
    public string $appSecret;
    // 是否加密传输
    public int $timeout;

    public function __construct(
        string $nodeManagerUrl,
        string $appKey,
        string $appSecret,
        int $timeout = 5
    ) {
        $this->nodeManagerUrl = $nodeManagerUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->timeout = $timeout;
    }
}