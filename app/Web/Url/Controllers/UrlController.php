<?php

namespace App\Web\Url\Controllers;

use App\Http\Controllers\Controller;
use Module\Url\Services\UrlShorterService;

class UrlController extends Controller
{
    public function show(string $urlHash, UrlShorterService $service)
    {
        $url = $service->getUrl($urlHash);

        if(!$url) {
            return redirect('/');
        }

        return redirect()->away($url->original_url);
    }
}
