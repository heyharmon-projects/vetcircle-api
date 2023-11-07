<?php

namespace DDD\Http\Organizations;

use DDD\App\Controllers\Controller;

// Models
use DDD\Domain\Organizations\Organization;

// Resources
use DDD\Domain\Tags\Resources\TagResource;

// Requests
use DDD\Domain\Tags\Requests\TagStoreRequest;

class OrganizationTagController extends Controller
{
    public function index(Organization $organization)
    {
        return TagResource::collection($organization->tags);
    }

    public function store(Organization $organization, TagStoreRequest $request)
    {
        $tag = $organization->tags()->create(
            $request->validated()
        );

        return new TagResource(
            $tag
            // $tag->load(['organization', 'user'])
        );
    }
}
