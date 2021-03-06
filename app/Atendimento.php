<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Atendimento extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'nome','user_id','data', 'inicio','termino','aluno', 'curso',
    ];
     
     protected $table = 'atendimentos';}
