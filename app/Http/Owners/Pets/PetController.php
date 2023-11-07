<?php

namespace DDD\Http\Owners\Pets;

use DDD\App\Controllers\Controller;

// Models
use DDD\Domain\Owners\Owner;

// Resources
use DDD\Domain\Pets\Resources\PetResource;

// Requests
use DDD\Domain\Pets\Requests\PetStoreRequest;

class PetController extends Controller
{
    public function index()
    {
        $owner = Owner::findOrFail(auth()->user()->id);

        return PetResource::collection($owner->pets);
    }

    public function store(PetStoreRequest $request)
    {
        $owner = Owner::findOrFail(auth()->user()->id);

        $pet = $owner->pets()->create(
            $request->validated()
        );

        return new PetResource($pet);
    }
}
