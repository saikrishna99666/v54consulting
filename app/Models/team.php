<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 
        'qualification', 
        'email', 
        'contactno', 
        'career', 
        'description',
        'profilephoto',
        'experience',
        'status',
        'instagramlink',
        'facebooklink',
        'twitterlink',
        'linkedinlink'
    ];
}
