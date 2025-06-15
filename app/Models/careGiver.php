<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class careGiver extends Authenticatable
{
    protected $table = 'care_givers';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'avatar',
        'address',
        'date_of_birth',
        'emergency_contact_phone',
        'password',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
