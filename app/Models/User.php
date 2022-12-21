<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\VerifyNotification;
use App\Notifications\VerifikasiNotif;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    
protected $fillable = [
'nama',
'email',
'tanggal_lahir',
'password',
]; 

protected $casts = [
    'email_verified_at' => 'datetime',
];

public function sendEmailVerificationNotification()
{
    $this->notify(new VerifikasiNotif());
}

public function getCreatedAttribute()
{
    if (!is_null($this->attributes['created)at'])) {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
    }
}

public function getUpdatedAttribute()
{
    if (!is_null($this->attributes['update_at'])) {
        return Carbon::parse($this->attributes['update_at'])->format('Y-m-d H:i:s');
    }
}
}