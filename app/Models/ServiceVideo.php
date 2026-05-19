<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServiceVideo extends Model
{
    protected $table = 'service_videos';
    protected $fillable = ['Serviceid','youtube_url','video_file','video_type','title'];
}
