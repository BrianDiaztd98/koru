<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseEnrollment extends Model
{
    protected $fillable = [
        'course_id',
        'full_name',
        'email',
        'phone',
        'license_number',
        'message',
        'status',
        'source',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
