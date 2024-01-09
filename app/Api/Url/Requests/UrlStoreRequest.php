<?php

namespace App\Api\Url\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'original_url' => 'required|url',
            'expired_at' => 'numeric'
        ];
    }
}
