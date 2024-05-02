<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "father_name" => $this->father_name,
            "mother_name" => $this->mother_name,
            "father_id" => $this->father_id,
            "mother_id" => $this->mother_id,
            "wedding_act" => $this->wedding_act,
        ];
    }
}
