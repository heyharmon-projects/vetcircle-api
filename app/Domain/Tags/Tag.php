<?php

namespace DDD\Domain\Tags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits
use DDD\App\Traits\BelongsToOrganization;
use DDD\App\Traits\BelongsToUser;
use DDD\App\Traits\HasUuid;

class Tag extends Model
{
    use HasFactory,
        BelongsToOrganization,
        BelongsToUser,
        HasUuid;
    
    protected $table = 'pet_tags';

    protected $guarded = ['id', 'slug', 'user_id'];
    
    protected $casts = [
        'claimed_at' => 'datetime',
    ];

    public function owner()
    {
        return $this->belongsTo('DDD\Domain\Owners\Owner');
    }

    public function scopeClaimed($query)
    {
        return $query->where('claimed_at');
    }
}
