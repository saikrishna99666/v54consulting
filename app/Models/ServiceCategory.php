<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function scopeMainCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeSubCategories($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
