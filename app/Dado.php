<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Dado extends Model
{
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'modalidade', 'curso', 'turma','user_id'
    ];
     
     protected $table = 'dados';

     public function user(){
        return $this->benlogsTo(User::class);
    }
}