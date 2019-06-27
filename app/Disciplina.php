<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Disciplina extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','nome_disciplina','horario','sala',
    ];

    protected $table = 'disciplinas';

    public function user(){
    	return $this->benlogsTo(User::class);
    }

    

    
}   


