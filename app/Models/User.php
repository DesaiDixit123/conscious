<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'password',
        'aadhaar_image',
        'pan_card_image',
        'verification_status',
        'user_type',
        'user_status',
        'avatar',
    ];

    protected $hidden = ['password'];


    public function tasks()
{
    return $this->hasMany(Task::class);
}

}
