<?php

namespace DDD\Http\Owners\Tags;

use DDD\App\Controllers\Controller;

// Models
use DDD\Domain\Owners\Owner;
use DDD\Domain\Tags\Tag;

// Actions
use DDD\Domain\Tags\Actions\AssignOwnerAction;

// Resources
use DDD\Domain\Tags\Resources\TagResource;

class TagClaimController extends Controller
{
    public function __invoke(Tag $tag, AssignOwnerAction $assignOwnerAction)
    {   
        $owner = Owner::findOrFail(auth()->user()->id);
        
        $assignOwnerAction->handle($tag, $owner);

        return new TagResource($tag);
    }
}
