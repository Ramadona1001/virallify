<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{

    public function toArray($request)
    {

        $name = 'name_'.\Lang::getLocale();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'price' => $this->price,
            'items' => (str_contains($this->items, ',')) ? explode(',',$this->items) : $this->items,
            'has_ai' => $this->has_ai_assistant,
            'can_upload_video' => $this->upload_video,
            'channels_count' => $this->channels_count,
            'posts_count' => $this->posts_count,
        ];
    }
}
