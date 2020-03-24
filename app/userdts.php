<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\userdts as Authenticatable;

class userdts extends Model
{
   protected $fillable = [
        'fname', 'lname',  'username', 'password', 'position','privilege','status'
    ];
}
