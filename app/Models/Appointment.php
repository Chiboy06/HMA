<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable  = [
        'bookingName', 
        'bookingEmail', 
        'phoneNo', 
        'bookingDate', 
        'department', 
        'doctor', 
        'message', 
        'code',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}

