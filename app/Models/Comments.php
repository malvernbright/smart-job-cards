<?php

namespace App\JobCard;

use App\Models\JobCard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;

    public function job_card(): BelongsTo
    {
        return $this->belongsTo(JobCard::class);
    }
}
