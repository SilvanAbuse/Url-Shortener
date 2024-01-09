<?php

namespace Module\Url\Builder\Interfaces;

use Module\Url\Models\Url;

interface UrlBuilderInterface
{

    public function setExpiredAt(int $expiredAt): UrlBuilderInterface;

    public function build(): Url;
}
