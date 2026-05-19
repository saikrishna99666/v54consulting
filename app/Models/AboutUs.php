<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'short_description',
        'long_description',
        'points',
        'image_1',
        'image_2',
        'button_text',
        'button_link',
    ];

    protected $casts = [
        'points' => 'array',
    ];
}
