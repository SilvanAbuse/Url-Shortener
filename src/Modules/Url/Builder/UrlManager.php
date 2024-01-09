<?php

namespace Module\Url\Builder;

use Illuminate\Support\Str;
use Module\Url\Builder\Interfaces\UrlBuilderInterface;
use Module\Url\DTO\UrlDTO;


class UrlManager
{
    private UrlBuilderInterface $urlBuilder;

    public function setBuilder(UrlBuilderInterface $urlBuilder)
    {
        $this->urlBuilder = $urlBuilder;
    }

    public function build(UrlDTO $urlDTO)
    {
        return $this->urlBuilder->create()
            ->setOrigianlUrl($urlDTO->original_url)
            ->setHash(Str::random(8))
            ->setExpiredAt($urlDTO->expired_at)
            ->build();
    }
}
