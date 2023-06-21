<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chercheurs = Chercheur::latest()->paginate(5);
        return view("BackEnd.GestionCHercheur.ListerChercheurs",compact("chercheurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("BackEnd.GestionChercheur.AjouterChercheur");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation d'information recu via formulaire
        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "prenom"=>"required|min:3|max:25",
            "tele"=>"required",
            "email"=>"required|min:3|max:25",
            "dt_naissance"=>"required",
            "cin"=>"required",
            "DomaineChercheur"=>"required",

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "prenom.required"=>"Ce Champ est obligatoire",
            "prenom.min"=>"Entrer minimum 3 characters",
            "tele.required"=>"Ce Champs Est Obligatoire",
            "Email.required"=>"Ce Champs Est Obligatoire",
            "dt_naissance.required"=>"Ce Champs Est Obligatoire",
            "cin.required"=>"Ce Champs Est Obligatoire",
            "DomaineChercheur.required"=>"Ce Champs Est Obligatoire",
        ]);
        $imagefile=$request->file("image");
        $imageName=time().".".$imagefile->getClientOriginalExtension();
        Image::make($imagefile)->resize(416,416)->save("storage/img_chercheur/".$imageName);
        $saveImage="img_chercheur/".$imageName;
        $img =$request->hasFile("image")?$saveImage:'img_chercheur/default.jpg';
        $validInfo=Chercheur::insert([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tele"=>$request->tele,
            "dt_naissance"=>$request->dt_naissance,
            "email"=>$request->email,
            "cin"=>$request->cin,
            "image"=>$img,
            "DomaineChercheur"=>$request->DomaineChercheur,
            "created_at"=>Carbon::now()
        ]);
        return to_route("chercheur.index")->with("msg","Chercheur Ajouter En Success");

    }

    /**
     * Display the specified resource.
     */
    public function show(Chercheur $chercheur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chercheur $chercheur)
    {

        return view("BackEnd.GestionChercheur.update",compact("chercheur"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chercheur $chercheur)
    {

        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "prenom"=>"required|min:3|max:25",
            "tele"=>"required",
            "email"=>"required|min:3|max:25",
            "dt_naissance"=>"required",
            "cin"=>"required",
            "DomaineChercheur"=>"required",

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "prenom.required"=>"Ce Champ est obligatoire",
            "prenom.min"=>"Entrer minimum 3 characters",
            "tele.required"=>"Ce Champs Est Obligatoire",
            "Email.required"=>"Ce Champs Est Obligatoire",
            "dt_naissance.required"=>"Ce Champs Est Obligatoire",
            "cin.required"=>"Ce Champs Est Obligatoire",
            "DomaineChercheur.required"=>"Ce Champs Est Obligatoire",
        ]);
        if($request->hasFile("image"))
        {
            $imagefile=$request->file("image");
            $imageName=time().".".$imagefile->getClientOriginalExtension();
            Image::make($imagefile)->resize(416,416)->save("storage/img_chercheur/".$imageName);
            $saveImage="img_chercheur/".$imageName;
             $img =$request->hasFile("image")?$saveImage:'img_chercheur/default.jpg';
        }else {
             $img=$request->oldImage;
        }


        $insertData= $chercheur->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tele"=>$request->tele,
            "email"=>$request->email,
            "dt_naissance"=>$request->dt_naissance,
            "cin"=>$request->cin,
            "DomaineChercheur"=>$request->DomaineChercheur,
            "updated_at"=>Carbon::now(),
            "image"=>$img,
        ]);
        return to_route('chercheur.index')->with("msg",$request->nom ."est Bien Modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chercheur $chercheur )
    {
        $chercheur->delete();
        return redirect()->route("chercheur.index")->with("msg","Chercheur Supprimé En Success");
    }
}
