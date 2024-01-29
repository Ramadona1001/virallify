<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutSectionCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->name,
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'btn_text' => $this->btn_text,
            'btn_url' => $this->btn_url,
            'order_no' => $this->order_no,
            'gallery' => AboutSectionGalleryCollection::collection($this->gallery),
        ];
    }
}
