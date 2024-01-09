<?php

namespace Module\Url\DTO;

class UrlDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $original_url,
        public readonly ?string $hash,
        public readonly ?int $expired_at
    ){}

    public static function  create(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['original_url'],
            $data['hash'] ?? null,
            $data['expired_at'] ?? null
        );
    }
}
