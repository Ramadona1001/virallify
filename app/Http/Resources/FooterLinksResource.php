<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FooterLinksResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'status' => $this->status,
        ];
    }
}
