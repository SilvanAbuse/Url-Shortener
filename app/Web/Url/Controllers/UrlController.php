<?php

namespace App\Web\Url\Controllers;

use App\Http\Controllers\Controller;
use Module\Url\Services\UrlShorterService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UrlController extends Controller
{
    public function show(string $urlHash, UrlShorterService $service)
    {
        try {
            $url = $service->getUrl($urlHash);
        } catch (NotFoundHttpException) {
            return redirect('/');
        }

        return redirect()->away($url->original_url);
    }
}
