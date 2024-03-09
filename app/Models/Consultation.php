<?php

namespace App\Models;
use App\Models\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    public function status_name()
    {
      return $this->hasOne(Status::class, 'id', 'status');
    }
}
