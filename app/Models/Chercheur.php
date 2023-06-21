<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "prenom",
        "tele",
        "email",
        "dt_naissance",
        "cin",
        "image",
        "DomaineChercheur",
    ];

}
