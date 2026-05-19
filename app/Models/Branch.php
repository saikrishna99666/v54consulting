<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'operating_hours',
        'is_head_office',
        'google_maps_link',
    ];

    protected $casts = [
        'is_head_office' => 'boolean',
    ];
}
