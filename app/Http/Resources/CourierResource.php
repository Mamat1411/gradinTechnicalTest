<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "employee_code" => $this->employee_code,
            "full_name" => $this->full_name,
            "email" => $this->email,
            "phone_number" => $this->phone_number,
            "level" => $this->level,
            "status" => $this->status,
            "employment_type" => $this->employment_type,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
