<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
      protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'linkedin',
        'education',
        'experience',
        'skills',
        'cover_letter'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
