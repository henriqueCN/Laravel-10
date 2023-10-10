<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    
    // O atributo $fillable serve para declarar os campos da tabela em que podem ser feitos os CRUD´s
    protected $fillable = [
        'subject',
        'body',
        'status'
    ];
}
