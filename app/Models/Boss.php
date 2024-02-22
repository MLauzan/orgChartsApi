<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boss extends Model
{
    use HasFactory;

    protected $with = ['users'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'pid');
    }
}
