<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Admin;
use Illuminate\Auth\SessionGuard;

class Access extends Model
{
    protected $fillable = ['user_id','datetime','admin_id'];
}
