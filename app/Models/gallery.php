<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    public $primaryKey = 'galleryid';
    protected $table = 'galleryimages'; // Specify custom table name
    protected $fillable = ['galleryid', 'image_path','imagetype','image_name','project_link', 'created_at', 'updated_at'];
    public $timestamps = true;
}


