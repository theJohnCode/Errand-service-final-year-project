<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    public function runner()
    {
        return $this->belongsTo(User::class, 'runner_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
