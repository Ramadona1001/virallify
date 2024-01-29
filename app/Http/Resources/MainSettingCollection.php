<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class MainSettingCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'content' => $this->content,
            'address' => $this->address,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'logo' => asset($this->logo),
            'favicon' => asset($this->favicon),
        ];
    }
}
