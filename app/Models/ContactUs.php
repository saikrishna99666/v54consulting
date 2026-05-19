<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactUs extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'contactus';
    protected $primaryKey = 'contactid';

    protected $fillable = [
        'Firstname', 
        'Lastname',
        'Phoneno',
        'EmailAddress',
        'Location',
        'Message',
        'Qualification',
        'visastatus',
        'country',
        'whatsapp',
        'resume',
        'source',
    ];
}
