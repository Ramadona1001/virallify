<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FooterInfoResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'logo' => $this->logo ? asset($this->logo) : null,
            'content' => $this->content,
            'copy_rights' => $this->copy_rights
        ];
    }
}
