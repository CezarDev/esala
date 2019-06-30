<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Access;
use App\Exceptions\Listener\UserEventSubscriber;


class User extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','local_permanencia', 'horario_permanencia','email', 'password',
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
            'user_id'  => $this->id,
            'datetime'  => date('YmdHis'),

        ]);
    }

    public function clearAccess(){
        return $this->accesses()->delete();
        //DELETE FROM `accesses` WHERE `accesses`.`id` = 1

    }

    public function disciplina(){
        return $this->hasMany(Disciplina::class);
    }
    
}
