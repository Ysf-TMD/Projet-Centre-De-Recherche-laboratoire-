<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    protected $fillable=[
        "nom",
        "disponibiliter",
        "dt_achat",
        "responsable",
        "guide",
        "imageEquipement",

    ];
}
