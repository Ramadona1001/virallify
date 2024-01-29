<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FooterSocialResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'id' => $this->id,
            'social_icon' => $this->social_icon ? asset($this->social_icon) : null,
            'social_link' => $this->social_link,
            'status' => $this->status,
            'sort' => $this->sort,
        ];
    }
}
