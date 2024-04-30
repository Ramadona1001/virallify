<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialMediaChannelResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'image' => asset($this->social_icon),
            'name' => $this->title,
            'publish' => $this->status,
        ];
    }
}
