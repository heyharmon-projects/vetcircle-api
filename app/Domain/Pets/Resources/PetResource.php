<?php

namespace DDD\Domain\Pets\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// Resources
use DDD\Domain\Owners\Resources\OwnerResource;

class PetResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->name,
            'type' => $this->type,
            'profile' => $this->profile,
            'notes' => $this->notes,
            'owner' => new OwnerResource($this->owner),
            'created_at' => $this->created_at
        ];
    }
}
