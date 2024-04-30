<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyCourse extends Model
{
    use HasFactory;

    public function course_info()
    {
        return $this->hasOne(ProgramCourse::class, 'id', 'course_id');
    }
}
