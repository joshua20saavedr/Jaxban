<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_name',
        'service',   
        'appointment_date', 
    ];

     
    protected $casts = [
        'appointment_date' => 'datetime',
    ];
}
