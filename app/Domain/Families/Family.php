<?php

namespace DDD\Domain\Families;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits
use DDD\App\Traits\BelongsToUser;
use DDD\App\Traits\HasUuid;

class Family extends Model
{
    use HasFactory,
        BelongsToUser,
        HasUuid;

    protected $guarded = ['id', 'slug', 'user_id'];

    public function users()
    {
        return $this->belongsToMany('DDD\Domain\Owners\Owner');
    }
}
