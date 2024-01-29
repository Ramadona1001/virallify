<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class planResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'price' => $this->price,
            'subscription_type' => $this->subscription_type
        ];
    }
}
