<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Stagiaires;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StagiairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaires::latest()->get();
        return view("BackEnd.GestionStagiaires.lister" , compact ("stagiaires"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("BackEnd.GestionStagiaires.Ajouter");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "prenom"=>"required|min:3|max:25",
            "tele"=>"required",
            "email"=>"required|min:3|max:25",
            "dt_naissance"=>"required",
            "cin"=>"required",
            "periode_de_stage"=>"required",

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "prenom.required"=>"Ce Champ est obligatoire",
            "prenom.min"=>"Entrer minimum 3 characters",
            "tele.required"=>"Ce Champs Est Obligatoire",
            "Email.required"=>"Ce Champs Est Obligatoire",
            "dt_naissance.required"=>"Ce Champs Est Obligatoire",
            "cin.required"=>"Ce Champs Est Obligatoire",
            "periode_de_stage.required"=>"Ce Champs Est Obligatoire",
        ]);


        $validInfo=Stagiaires::insert([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tele"=>$request->tele,
            "dt_naissance"=>$request->dt_naissance,
            "email"=>$request->email,
            "cin"=>$request->cin,
            "periode_de_stage"=>$request->periode_de_stage,
            "created_at"=>Carbon::now()
        ]);
        return to_route("stagiaires.index")->with("msg","stagiaires Ajouter En Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaires $stagiaires)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaires $stagiaire)
    {
        return view("BackEnd.GestionStagiaires.update",compact("stagiaire"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaires $stagiaire)
    {

        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "prenom"=>"required|min:3|max:25",
            "tele"=>"required",
            "email"=>"required|min:3|max:25",
            "dt_naissance"=>"required",
            "cin"=>"required",
            "periode_de_stage"=>"required",

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "prenom.required"=>"Ce Champ est obligatoire",
            "prenom.min"=>"Entrer minimum 3 characters",
            "tele.required"=>"Ce Champs Est Obligatoire",
            "Email.required"=>"Ce Champs Est Obligatoire",
            "dt_naissance.required"=>"Ce Champs Est Obligatoire",
            "cin.required"=>"Ce Champs Est Obligatoire",
            "periode_de_stage.required"=>"Ce Champs Est Obligatoire",
        ]);


        $updateData=$stagiaire->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tele"=>$request->tele,
            "dt_naissance"=>$request->dt_naissance,
            "email"=>$request->email,
            "cin"=>$request->cin,
            "periode_de_stage"=>$request->periode_de_stage,
            "updated_at"=>Carbon::now()
        ]);


        return to_route("stagiaires.index")->with("msg","stagiaire Modifier  En Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaires $stagiaire)
    {
        $stagiaire->delete();
        return to_route("stagiaires.index")->with("msg","stagiaire Supprimé   En Success");

    }
}
