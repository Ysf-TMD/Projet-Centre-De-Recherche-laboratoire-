<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaires extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        "nom",
        "prenom",
        "tele",
        "dt_naissance",
        "cin",
        "periode_de_stage",
        "email",
    ];
}
