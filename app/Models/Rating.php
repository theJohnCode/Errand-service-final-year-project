<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rated_by', 'rating', 'review'];

    // The user receiving the rating
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The user who gave the rating
    public function ratedBy()
    {
        return $this->belongsTo(User::class, 'rated_by');
    }
}
