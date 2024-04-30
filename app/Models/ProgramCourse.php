<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class ProgramCourse extends Model
{
    use HasFactory;

    public function course_info()
    {
        return $this->hasOne(ProgramCat::class, 'id', 'course_id');
    }

    public function status_info()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    public function edu_name()
    {
        return $this->hasOne(EducationalLevel::class, 'id', 'level');
    }public function country_name()
    {
        return $this->hasOne(Country::class, 'id', 'location');
    }
}
