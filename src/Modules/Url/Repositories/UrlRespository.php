<?php

namespace Module\Url\Repositories;

use Module\Url\DTO\UrlDTO;
use Module\Url\Models\Url;

class UrlRespository
{
    public function createUrl(UrlDTO $urlDTO)
    {
        $url = new Url();
        $url->expiredAt = $urlDTO->getExpiredAt();

        return $url;
    }

    public function save(Url $url)
    {
        $url->save();
        return $url;
    }


    public function findByHash(string $hash)
    {
        return Url::where('hash', $hash)->first();
    }
}
