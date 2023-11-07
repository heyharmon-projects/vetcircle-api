<?php

namespace DDD\Domain\Pets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits
use DDD\App\Traits\BelongsToUser;
use DDD\App\Traits\HasUuid;

// Casts
use DDD\Domain\Pets\Casts\PetProfileCast;

class Pet extends Model
{
    use HasFactory,
        BelongsToUser,
        HasUuid;
    
    protected $guarded = ['id', 'slug', 'user_id'];

    protected $casts = [
        'profile' => PetProfileCast::class,
    ];

    const PET_TYPES = [
        'dog' => 'Dog',
        'cat' => 'Cat',
    ];

    const PET_SIZES = [
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
    ];

    const PET_SEXES = [
        'male' => 'Male',
        'female' => 'Female',
    ];

    public function owner()
    {
        return $this->belongsTo('DDD\Domain\Owners\Owner', 'user_id');
    }
}
