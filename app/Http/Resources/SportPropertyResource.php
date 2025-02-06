<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SportPropertyResource extends JsonResource
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
            'name' => $this->name,
            'input_type' => $this->input_type,
            'type' => $this->type,
            'sport_name' => $this->whenLoaded('sportType', fn() => $this->sportType->name),
        ];
    }
}
