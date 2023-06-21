<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Recherche;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RecherchesController extends Controller
{
    //ajouter une Recherche partie Admin (BackEnd)
    public function AjouterRecherche( Chercheur $chercheur)
    {
        //afficher le formulaire d'ajoute
        return view ("BackEnd.GestionChercheur.AjouterRecherche",compact("chercheur"));

    }
    //gestion de recherches d'un chercheur (BackEnd) ;
    public function EnregistrerRecherche(Request $req , Chercheur $chercheur)
    {
        $validerInfo = $req->validate([
            "Nom_recherche"=>"required",
            "etat"=>"required",
        ],[
            "Nom_recherche.required"=>"Ce Champs Est Obligatoire",
            "etat.required"=>"Ce Champs Est Obligatoire",
        ]);
        $document = $req->hasFile('documents')?$req->file("documents")->store("DocsChercheur","public"):null;
        $insertData = Recherche::insert([
            "Nom_recherche"=>$req->Nom_recherche,
            "etat"=>$req->etat,
            "documents"=>$document,
            "chercheur_id"=>$chercheur->id,
            "created_at"=>Carbon::now()
        ]);
        return to_route("chercheur.index")->with("msg","Recherche bien Ajouter au Chercheur");
    }

    //renvoyé la liste des recherches lié a un Chercheur :
    public function listerRecherches(Request $req ,Chercheur $chercheur)
    {

        $recherches = Recherche::where("chercheur_id",$chercheur->id)->get();
        return view("BackEnd.GestionChercheur.listerRecherches",compact("recherches","chercheur"));
    }
    //suppression d'un Document partie admin (BackEnd);
    public function SupprimerDocument(Recherche $recherche)
    {
        $recherche->delete();
        return back()->with("msg","Recherche Supprimer Avec success ");
    }
    // Telecharger le document partie BackEnd
    public function TelechargerRecherche(Request $req , Response $response , Recherche $recherche)
    {
        $chemain=$req->chemain;
        $nom=$recherche->Nom_recherche ;
        return response()->download("storage/".$chemain,"Document  ".$nom,[],"attachment");
    }
    //Gestion de Recherches partie




    //Gestion d"une recherche d'un chercheurs (frontEnd)
    public function liste_recherches_chercheur_front(Chercheur $chercheur)
    {
        $id=$chercheur->id;
        $recherches = Recherche::all()->where("chercheur_id",$id);
        return view("FrontEnd.listeRecherches",compact("recherches","chercheur"));
    }
    public function TelechargerRechercheFront(Request $req , Response $response , Recherche $recherche)
    {
        $chemain=$req->chemain;
        $nom=$recherche->Nom_recherche ;
        return response()->download("storage/".$chemain,"Document  ".$nom,[],"attachment");
    }

}
