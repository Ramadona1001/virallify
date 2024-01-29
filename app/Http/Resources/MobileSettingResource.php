<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'splash_screen' => [
                'splash_img_bg' => asset($this->splash_img_bg),
                'splash_title_ar' => $this->splash_title_ar ,
               'splash_title_en' => $this->splash_title_en ,
               'splash_content_ar' => $this->splash_content_ar ,
               'splash_content_en' => $this->splash_content_en ,
            ] ,
            'lang_screen' =>[
                'lang_img_bg' =>asset($this->lang_img_bg),
                'lang_first_title_ar' => $this->lang_first_title_ar,
                'lang_first_title_en' => $this->lang_first_title_en,
                'lang_second_title_ar' => $this->lang_second_title_ar,
                'lang_second_title_en' => $this->lang_second_title_en,
            ] ,

            'on1_screen' => [
                'on1_img_bg' => asset($this->on1_img_bg),
                'on1_first_title_ar' => $this->on1_first_title_ar,
                'on1_first_title_en' => $this->on1_first_title_en,
                'on1_second_title_ar' => $this->on1_second_title_ar,
                'on1_second_title_en' => $this->on1_second_title_en,
            ],

            'on2_screen' =>[
                'on2_img_bg' => asset($this->on2_img_bg),
                'on2_first_title_ar' => $this->on2_first_title_ar,
                'on2_first_title_en' => $this->on2_first_title_en,
                'on2_second_title_ar' => $this->on2_second_title_ar,
                'on2_second_title_en' => $this->on2_second_title_en,
            ],

            'on3_screen' => [
                'on3_img_bg'=> asset($this->on3_img_bg),
                'on3_first_title_ar'=> $this->on3_first_title_ar,
                'on3_first_title_en'=> $this->on3_first_title_en,
                'on3_second_title_ar'=> $this->on3_second_title_ar,
                'on3_second_title_en'=> $this->on3_second_title_en,
            ]

        ];
    }
}
