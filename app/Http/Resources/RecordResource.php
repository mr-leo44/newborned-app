<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ChildResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'is_delivery' => $this->is_delivery,
            'childs' => new ChildResource($this->whenLoaded('childs')),
        ];
    }
}
