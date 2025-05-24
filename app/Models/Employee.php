<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
  use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'avatar',
        'adhar_image',
        'pan_image',
        'user_type',
        'user_status',
    ];

    protected $hidden = [
        'password',
    ];
}
