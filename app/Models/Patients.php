<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Patients extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'age',
        'civil_status',
        'gender',
        'home_address',
        'contact_number',
        'religion',
        'username',
        'email_address',
        'password',
        'otp',
        'photo',
        'isActive'
    ];

    protected $guard = 'patients';
    protected $primaryKey = 'patient_id';
}
