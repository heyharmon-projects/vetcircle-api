<?php

namespace DDD\Domain\Tags\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// Resources
use DDD\Domain\Organizations\Resources\OrganizationResource;
use DDD\Domain\Owners\Resources\OwnerResource;

class TagResource extends JsonResource
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
            'organization' => new OrganizationResource($this->organization),
            'owner' => new OwnerResource($this->owner),

            // 'organization' => new OrganizationResource($this->whenLoaded('organization')),
            // 'owner' => new UserResource($this->whenLoaded('owner')),

            'created_at' => $this->created_at
        ];
    }
}
