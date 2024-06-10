<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachments extends Model
{
    use HasFactory;

    public function job_card(): BelongsTo
    {
        return $this->belongsTo(JobCard::class);
    }
}
