<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'email_address',
        'account_status'
    ];

    protected $guard = 'admins';
    protected $primaryKey = 'admin_id';
}
