<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
        ];
    }
}
