<?php

namespace Module\Url\DTO;

class UrlCreateDTO
{
    public function __construct(
        public readonly string $original_url,
        public readonly int $expired_at
    ){}

    public static function  create(string $original_url, int $expired_at): self
    {
        return new self($original_url, $expired_at);
    }
}
