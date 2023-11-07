<?php

namespace DDD\Domain\Organizations;

// Domains
use DDD\Domain\Base\Organizations\Organization as BaseOrganization;

class Organization extends BaseOrganization {

    public function tags()
    {
        return $this->hasMany('DDD\Domain\Tags\Tag');
    }

}
