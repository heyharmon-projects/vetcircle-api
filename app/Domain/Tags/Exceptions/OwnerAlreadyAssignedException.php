<?php

namespace DDD\Domain\Tags\Exceptions;

use Exception;

class OwnerAlreadyAssignedException extends Exception
{
    public function render()
    {
        return response()->json(['error' => 'This tag has already been claimed by a pet parent.'], 403);
    }
}
