<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaines extends Model
{
    use HasFactory;
    protected $fillable=[
        "nom",
        "description",
        "image",
        "genre",

    ];
    public function chercheurs()
    {
        return $this->hasMany(Chercheur::class);
    }
}
