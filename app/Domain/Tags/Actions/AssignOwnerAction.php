<?php

namespace DDD\Domain\Tags\Actions;

use Carbon\Carbon;

// Domains
use DDD\Domain\Tags\Tag;
use DDD\Domain\Owners\Owner;

// Exceptions
use DDD\Domain\Tags\Exceptions\OwnerAlreadyAssignedException;

class AssignOwnerAction
{
    public function handle(Tag $tag, Owner $owner)
    {
        if ($tag->owner()->exists()) {
            throw new OwnerAlreadyAssignedException();
        }

        $tag->update([
            'owner_id' => $owner->id,
            'owner_assigned_at' => Carbon::now(),
        ]);
    }
}