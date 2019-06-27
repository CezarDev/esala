<?php

namespace App;
use Guard;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Model\Access;
use App\Exceptions\Listener\UserEventSubscriber; 
use Illuminate\Auth\SessionGuard;
use Illuminate\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function accesses(){
        return $this->hasMany(Access::class);
    }

    public function registerAccess(){
        return $this->accesses()->create([
            //'user_id'  => $this->id,
            'admin_id'  => $this->id,
            'datetime'  => date('YmdHis'),

        ]);
    }

    public function clearAccess(){
        return $this->accesses()->delete();
        //DELETE FROM `accesses` WHERE `accesses`.`id` = 1

    }
    
}
