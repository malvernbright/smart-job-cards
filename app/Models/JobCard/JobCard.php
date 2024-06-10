<?php

namespace App\Models\JobCard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCard extends Model
{
    use HasFactory;

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignments::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachments::class);
    }
}
