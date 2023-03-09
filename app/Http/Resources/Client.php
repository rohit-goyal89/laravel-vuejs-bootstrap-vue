<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'user' => $this->user,
            'address' => $this->address,
            'phone' => $this->phone,
            'user' => $this->user,
            'primary_name' => $this->primary_name,
            'primary_email' => $this->primary_email,
            'primary_phone' => $this->primary_phone,
            'secondary_name' => $this->secondary_name,
            'secondary_email' => $this->secondary_email,
            'secondary_phone' => $this->secondary_phone,
            'other_name' => $this->other_name,
            'other_email' => $this->other_email,
            'other_phone' => $this->other_phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'action' => $this->id,
        ];
    }
}
