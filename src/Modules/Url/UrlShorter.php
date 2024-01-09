<?php

namespace Url;

use Url\Services\UrlShorterService;

class UrlShorter
{
    private UrlShorterService $urlShorterService;

    public function __construct(UrlShorterService $urlShorterService)
    {
        $this->urlShorterService = $urlShorterService;
    }


    public function makeShort($url)
    {
        $shortUrl = $this->urlShorterService->makeShort($url);
    }

    public function getRealUrl($shortUrl)
    {
        return $this->getRealUrlFromDb($shortUrl);
    }
}
