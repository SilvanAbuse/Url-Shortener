<?php

namespace App\Api\Url\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'original_url' => $this->original_url,
            'hash' => $this->hash,
            'expired_at' => $this->expired_at,
        ];
    }
}
