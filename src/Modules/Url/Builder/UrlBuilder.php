<?php

namespace Module\Url\Builder;

use Module\Url\Builder\Interfaces\UrlBuilderInterface;
use Module\Url\Models\Url;

class UrlBuilder implements UrlBuilderInterface
{
    private Url $url;

    public function __construct()
    {
        $this->create();
    }

    public function create()
    {
        $this->url = new Url();

        return $this;
    }

    public function setOrigianlUrl(string $originalUrl): UrlBuilderInterface
    {
        $this->url->original_url = $originalUrl;

        return $this;
    }

    public function setHash(string $hash): UrlBuilderInterface
    {
       $this->url->hash = $hash;

       return $this;
    }

    public function setExpiredAt(?int $expired_at): UrlBuilderInterface
    {
        $this->url->expired_at = $expired_at;

        return $this;
    }


    public function build(): Url
    {
        $result = $this->url;
        $this->create();
        return $result;
    }
}
