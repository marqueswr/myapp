<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    use HasFactory;
    protected $fillable = [
        'aluno', 'bimestre', 'dta', 'tipo'
    ];
}
