<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'image' => asset($this->image),
            'name' => $this->name,
            'content' => $this->content,
        ];
    }
}
