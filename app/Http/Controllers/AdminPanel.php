<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPanel extends Controller
{
    public function AdminPannel()
    {
        $reclamations = Reclamation::all();
        return view("BackEnd.AdminPannel",compact("reclamations"));
    }
    public function AdminReclamations()
    {
        $reclamations = Reclamation::latest()->get();
        return view("BackEnd.GestionReclamations.Reclamations",compact("reclamations"));
    }
    public function SupprimerReclamation(Reclamation $reclamation)
    {
        $reclamation->delete();
        return to_route("admin.pannel");
    }
    public function liseActions()
    {
        return view("BackEnd.actions");
    }
    public function AddUser(Request $req)
    {
        $validerInfo = $req->validate([
            "name"=>"required|min:3|max:10",
            "email"=>"required",
            "password"=>"required|min:6"
        ],[
            'name.required'=>'Ce chemps est Obligatoire',
            'name.min'=>'Entrer minimum 3 Caractères',
            'name.max'=>'Dépasse pas 10 Caractères',
            'email.required'=>'Ce champs est Obligatoire',
            'password.required'=>'Ce champs est obligatoire',
            'password.min'=>'Entrer minimum 6 Caractères '
        ]);
        if($validerInfo)
        {
            $fileName=null ;
            if($req->file("image")){
                $fileName=$req->file("image")->store("ImagesAdmin","public");
            }

            $hashed=Hash::make($req->password);
            $insererInfo = User::insert([
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>$hashed,
                "image"=>$fileName,
                "created_at"=>Carbon::now(),
            ]);
            return back()->with("msg","Génial..! $req->name a était bien Ajouté ..!");
        }else{
            return back()->with("msg","Oups ...! Verifier Votre Formulaire !!");
        }
    }
    public function RestoreUser(Request $id)
    {
//        return view restore trashed ......
    }
    public function EditeUser($id)
    {
        $user=User::findOrFail($id);
        if($user)
        {
            return view("BackEnd.GestionUsers.restore",compact("user"));
        }
        else{
            return back()->with("msg","votre Utilisateur n'existe pas ... ");
        }
    }
    public function UpdateUser(Request $req , $id)
    {
        $validInfo = $req->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",

        ],[
            'name.required'=>'Ce chemps est Obligatoire',
            'name.min'=>'Entrer minimum 3 Caractères',
            'name.max'=>'Dépasse pas 10 Caractères',
            'email.required'=>'Ce champs est Obligatoire',
            'password.required'=>'Ce champs est obligatoire',
            'password.min'=>'Entrer minimum 6 Caractères '
        ]);

        if($validInfo  ) {
            $old_image=$req->old_image ;
            $image = $req->hasFile('imagefile')?$req->file("imagefile")->store("ImagesAdmin","public"):$old_image;
            $findUser=User::findOrFail($id);
            $UpdateUser = $findUser->update([
                    "name"=>$req->name,
                    "email"=>$req->email,
                    "password"=>$req->password,
                    "image"=>$image,
                    "updated_at"=>Carbon::now(),
            ]);


            return to_route("dashboard")->with("msg","Génial $req->name Est Bien Modifié ");
        }
        else{
            return back()->withInput()->with("msg","Ouups...! Quelque Chose n'est Pas Bien Réglé");
        }
    }
    public function SupprimerUtilisateur($id)
    {
        $find = User::findOrFail($id);
        $find->delete();
        return back()->with("msg","User Supprimée En success");
    }
    public function LogoutAdmin()
    {
        Auth::logout();
        return to_route("dashboard");
    }

}
