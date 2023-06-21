<?php

namespace App\Http\Controllers;

use App\Models\loginUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller
{
    public function loginUser()
    {
        return view("FrontEnd.LoginUser");
    }
    //authentifier l'utilisateur + creation d'une session :
    public function LoginUserFront(Request $request)
    {

        $email=$request->email;
        $password=$request->password;
        $values = [
            'email'=>$email,
            'password'=>$password,
        ];
        if(Auth::attempt($values))
        {
            $request->session()->regenerate();
            return to_route("home")->with("msg","bienvenu ". Auth::user()->nom);
        }
        else
        {

            return back()->withErrors([
                "email"=>"Email ou mdp incorrect "
            ])->onlyInput("email");
        }

    }
    //logout utilisateur
    public function logoutUser()
    {
        Session::flush();
        Auth::logout();
        return to_route("home");
    }


//Creer un compte frontEnd pour
    public function RegisterUser()
    {
        return view("FrontEnd.RegisterUser");
    }
    public function AddUser(Request $req)
    {

        //validation des champs ;
        $valideData = $req->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required",
            "password"=>"required",
            "password_confirmation"=>"required",
            "tele"=>"required"
        ],[
            "nom.required"=>"champs obligatoire",
            "prenom.required"=>"champs obligatoire",
            "email.required"=>"champs obligatoire",
            "password.required"=>"champs obligatoire",
            "password_confirmation.required"=>"champs obligatoire",
            "tele.required"=>"champs obligatoire",
        ]);
        //valider mdp manuellement
        $password=$req->password ;

        $confirmation=$req->password_confirmation ;
        $email = $req->email ;

        if($password===$confirmation)
        {
            $crypterPassword = Hash::make($password);
            $insertData=loginUser::insert([
                "nom"=>$req->nom,
                "prenom"=>$req->prenom,
                "email"=>$req->email,
                "password"=>$crypterPassword,
                "password_confirmation"=>$req->password_confirmation,
                "tele"=>$req->tele,
                "created_at"=>Carbon::now()
            ]);
            return to_route("home")->with("msg","Bienveneu...");
        }else
            return to_route("RegisterUser")->with("msg","Ouups....!!verifier votre Mot De Passe ");
    }
}
