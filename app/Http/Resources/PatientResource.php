<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'insured' => $this->insured,
        ];
    }
}
