<?php

namespace DDD\Domain\Owners;

// Domains
use DDD\Domain\Base\Users\User as BaseUser;

class Owner extends BaseUser {
    
    protected $table = 'users';

    public function pets()
    {
        return $this->hasMany('DDD\Domain\Pets\Pet', 'user_id');
    }

    public function tags()
    {
        return $this->hasMany('DDD\Domain\Tags\Tag', 'owner_id');
    }
    
}
