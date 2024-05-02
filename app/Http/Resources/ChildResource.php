<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ParentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ChildResource extends JsonResource
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'city' => $this->city,
            'hospital_act' => $this->hospital_act,
            'parents' => new ParentResource($this->whenLoaded('parents')),
        ];
    }
}
