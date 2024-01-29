<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id ,
            'name' => $this->name,
            'email' => $this->password,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'notes' => $this->notes,
            'avatar' => $this->avatar ? asset($this->avatar) : null,
            'country' => $this->country ? new CountryResource($this->country) : null,
            'city' => $this->city ? new CityResource($this->city) : null,
            'area' => $this->area ? new AreaResource($this->area) : null,
            'department' => $this->department,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
