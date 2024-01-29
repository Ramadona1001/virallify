<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutSectionGalleryCollection extends JsonResource
{
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'image' => asset($this->image)
        ];
    }
}
