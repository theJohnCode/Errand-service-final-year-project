<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderProfile extends Model
{
    use HasFactory;

    protected $table = 'service_provider_profiles';

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
