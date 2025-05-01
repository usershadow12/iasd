<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table = "delegados";
    protected $fillable = [
    'nome',
    'atributo',
    'orgao',
    'observacao'
    ];
}
