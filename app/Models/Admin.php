<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;

class Admin extends Authenticatable
{
    use Notifiable, HasPushSubscriptions;

    protected $table = "admins";
    
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}
