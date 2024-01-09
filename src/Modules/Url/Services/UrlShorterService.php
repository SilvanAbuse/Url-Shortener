<?php

namespace Module\Url\Services;

use Module\Url\Builder\UrlBuilder;
use Module\Url\Builder\UrlManager;
use Module\Url\DTO\UrlDTO;
use Module\Url\Repositories\UrlRespository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UrlShorterService
{
    public function __construct(
        private UrlRespository $urlRepository,
        private UrlManager $urlManager
    ){}


    public function makeShort(UrlDTO $urlDTO): UrlDTO
    {
        $this->urlManager->setBuilder(new UrlBuilder());

        $urlModel = $this->urlRepository->save($this->urlManager->build($urlDTO));

        return UrlDTO::create($urlModel->toArray());
    }

    public function getUrl(string $shortUrl): UrlDTO
    {
        $urlModel = $this->urlRepository->findByHash($shortUrl);
        if(!$urlModel) {
            throw new NotFoundHttpException();
        }
       return UrlDTO::create($urlModel->toArray());
    }
}
