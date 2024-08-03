<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';

    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }
}
