<?php

namespace DDD\Domain\Tags\Exceptions;

use Exception;

class PetAlreadyAssignedException extends Exception
{
    public function render()
    {
        return response()->json(['error' => 'This tag has already been assigned to another pet.'], 403);
    }
}
