<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginUser extends Authenticatable
{
    use HasFactory;
    protected $fillable =[
        "nom",
        "prenom",
        "password",
        "password_confirmation",
        "email",
        "tele"
    ];

}
