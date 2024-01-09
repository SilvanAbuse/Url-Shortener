<?php

namespace App\Api\Url\Controllers;

use App\Api\ApiController;
use App\Api\Url\Requests\UrlStoreRequest;
use App\Api\Url\Resources\UrlResource;
use Module\Url\DTO\UrlDTO;
use Module\Url\Services\UrlShorterService;

class UrlController extends ApiController
{

    private UrlShorterService $service;

    public function __construct(UrlShorterService $service)
    {
        $this->service = $service;
    }


    public function show(string $hash)
    {
        try {
            $urlDTO = $this->service->getUrl($hash);
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }

        return $this->respondWithSuccess(new UrlResource($urlDTO));
    }

    public function store(UrlStoreRequest $request)
    {
        $urlDTO = UrlDTO::create($request->validated());

        try {
            $urlDTO = $this->service->makeShort($urlDTO);
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
        return $this->respondWithSuccess(new UrlResource($urlDTO));
    }
}
