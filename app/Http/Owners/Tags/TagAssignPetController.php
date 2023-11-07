<?php

namespace DDD\Http\Owners\Tags;

use DDD\App\Controllers\Controller;

// Models
use DDD\Domain\Owners\Owner;
use DDD\Domain\Tags\Tag;
use DDD\Domain\Pets\Pet;

// Actions
use DDD\Domain\Tags\Actions\AssignPetAction;

// Resources
use DDD\Domain\Tags\Resources\TagResource;

class TagAssignPetController extends Controller
{
    public function __invoke(Tag $tag, Pet $pet, AssignPetAction $assignPetAction)
    {   
        $owner = Owner::findOrFail(auth()->user()->id);

        $assignPetAction->handle($tag, $owner, $pet);

        return new TagResource($tag);
    }
}
