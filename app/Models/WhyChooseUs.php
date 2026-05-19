<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';

    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'mission_title',
        'mission_description',
        'mission_points',
        'vision_title',
        'vision_description',
        'vision_points',
        'experience_years',
        'button_text',
        'button_link',
        'image_1',
        'image_2',
        'phone',
    ];

    protected $casts = [
        'mission_points' => 'array',
        'vision_points' => 'array',
    ];
}
