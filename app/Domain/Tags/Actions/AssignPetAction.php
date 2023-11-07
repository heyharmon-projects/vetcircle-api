<?php

namespace DDD\Domain\Tags\Actions;

use Carbon\Carbon;

// Domains
use DDD\Domain\Owners\Owner;
use DDD\Domain\Pets\Pet;
use DDD\Domain\Tags\Tag;


// Exceptions
use DDD\Domain\Tags\Exceptions\OwnerAlreadyAssignedException;
use DDD\Domain\Tags\Exceptions\PetAlreadyAssignedException;

class AssignPetAction
{
    public function handle(Tag $tag, Owner $owner, Pet $pet)
    {
        if ($tag->pet()->exists()) {
            throw new PetAlreadyAssignedException();
        }
        
        if ($tag->owner->id == $owner->id) {
            throw new OwnerAlreadyAssignedException();
        }

        $tag->update([
            'pet_id' => $pet->id,
            'pet_assigned_at' => Carbon::now(),
        ]);
    }
}