<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'appointment_date',
        'appointment_time',
        'message',
        'status',
    ];

    /**
     * Get the service requested for the appointment.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'Serviceid');
    }
}
