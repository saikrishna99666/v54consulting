<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientImage extends Model
{
    protected $table = 'clientimages';
     protected $primaryKey = 'clientid';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['image_path'];
}
