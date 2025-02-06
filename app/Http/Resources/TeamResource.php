<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'sport_type' => new SportTypeResource($this->whenLoaded('sportType')),
            'players_limit' => $this->players_limit,
            'current_players' => $this->players()->count(),
            'available_slots' => max(0, $this->players_limit - $this->players()->count()),
            'status' => $this->status,
            'captain_name' => optional($this->captain)->full_name,
            'coach_name' => optional($this->coach)->full_name,
            'players_count' => $this->players_count,
        ];
    }
}
