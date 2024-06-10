<?php

namespace App\Models;

use App\JobCard\Comments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'requirements', 'status', 'creator'
    ];

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

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator');
    }
}
