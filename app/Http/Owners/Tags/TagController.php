<?php

namespace DDD\Http\Owners\Tags;

use DDD\App\Controllers\Controller;

// Models
use DDD\Domain\Owners\Owner;

// Resources
use DDD\Domain\Tags\Resources\TagResource;

class TagController extends Controller
{
    public function index()
    {
        $owner = Owner::findOrFail(auth()->user()->id);
        
        return TagResource::collection($owner->tags);
    }
}
