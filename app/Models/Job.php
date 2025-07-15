<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
     protected $fillable = ['title', 'description', 'deadline'];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
    // app/Models/Job.php

protected $casts = [
    'deadline' => 'datetime',
];

}
