<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

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
}
