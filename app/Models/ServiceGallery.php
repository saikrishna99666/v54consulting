<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $table = 'service_galleries';
    protected $fillable = ['Serviceid','image','caption'];
}
