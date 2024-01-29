<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PageCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'image' => asset($this->image),
            'title' => $this->title,
            'content' => strip_tags($this->content),
        ];
    }
}
