<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeBannerCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'btn1_text' => $this->btn1_text,
            'btn1_link' => $this->btn1_link,
            'btn2_text' => $this->btn2_text,
            'btn2_link' => $this->btn2_link,
            'image' => asset($this->image)
        ];
    }
}
