<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    /**
     * Объявления в данном городе
     *
     * @return HasMany
     */
    public function ads(): HasMany
    {
        return $this->hasMany(Advertisement::class);
    }
}
