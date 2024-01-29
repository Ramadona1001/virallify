<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FooterContactResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'email' => $this->email,
            'mobile' => $this->mobile
        ];
    }
}
