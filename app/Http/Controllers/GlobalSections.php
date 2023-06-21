<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Domaines;
use App\Models\Reclamation;
use App\Models\Stagiaires;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalSections extends Controller
{
    public function ListerChercheurs(){
        $chercheurs = Chercheur::latest()->get();
        return view("FrontEnd.chercheurs",compact("chercheurs"));
    }
    public function ListedDomaines()
    {
        $domaines = Domaines::latest()->get();
        $all =count( Domaines::all());
        $bm =count(Domaines::where('genre',"Biologie Moléculaire")->get());
        $civ =count(Domaines::where('genre',"Culture In Vitro")->get());
        $para =count(Domaines::where('genre',"Parasitologie")->get());
        $seq =count(Domaines::where('genre',"Séquensage D'ADN")->get());
        $champs =count(Domaines::where('genre',"Cultures Sur Champ")->get());
        $serres =count(Domaines::where('genre',"Cultures En Serres")->get());
        $Indefinit =count(Domaines::where('genre',"Indefinit")->get());
        return view("FrontEnd.domaines",compact("domaines",["all","bm",
            "civ",
            "para",
            "seq",
            "champs",
            "serres",
            "Indefinit"]));
    }
    public function listerStagiaires()
    {
        $stagiaires=Stagiaires::latest()->get();
        return view("FrontEnd.stagiaires",compact("stagiaires"));
    }
    public function reclamation()
    {
        return view("FrontEnd.reclamation");
    }
    public function addReclamation(Request $req)
    {
        $validInfo=$req->validate([
            "nom"=>"required",
            "email"=>"required",
            "sujet"=>"required|max:200",
            "description"=>"required",
        ],[
            "nom.required"=>"champs obligatoire",
            "email.required"=>"champs obligatoire",
            "sujet.required"=>"champs obligatoire",
            "sujet.max"=>"sujet doit pas deppaser 200 character",
            "description.required"=>"champs obligatoire",
        ]);
        $insertData=Reclamation::insert([
            "nom"=>$req->nom,
            "email"=>$req->email,
            "sujet"=>$req->sujet,
            "description"=>$req->description,
            "created_at"=>Carbon::now(),
        ]);
        return to_route("home")->with("msg","Merci pour votre reclamation");

    }
    public function TrierDomaine($type)
    {
        $all =count( Domaines::all());
        $bm =count(Domaines::where('genre',"Biologie Moléculaire")->get());
        $civ =count(Domaines::where('genre',"Culture In Vitro")->get());
        $para =count(Domaines::where('genre',"Parasitologie")->get());
        $seq =count(Domaines::where('genre',"Séquensage D'ADN")->get());
        $champs =count(Domaines::where('genre',"Cultures Sur Champ")->get());
        $serres =count(Domaines::where('genre',"Cultures En Serres")->get());
        $Indefinit =count(Domaines::where('genre',"Indefinit")->get());
        switch($type){
            case "Nom" :
                $domaines =Domaines::orderBy('nom')->get();
                return view ("FrontEnd.domaines",compact("domaines",["all","bm",
                    "civ",
                    "para",
                    "seq",
                    "champs",
                    "serres",
                    "Indefinit"]));
                break;
            case "latest" :
                $domaines = Domaines::latest()->get();
                return view ("FrontEnd.domaines",compact("domaines",["all","bm",
                    "civ",
                    "para",
                    "seq",
                    "champs",
                    "serres",
                    "Indefinit"]));
                break;
            case "recent" :
                $domaines = Domaines::orderBy('created_at' ,'asc')->get();
                return view ("FrontEnd.domaines",compact("domaines",["all","bm",
                    "civ",
                    "para",
                    "seq",
                    "champs",
                    "serres",
                    "Indefinit"]));
                break;
        };

    }
    public function Categories($genre)
    {
        $domaines =Domaines::where('genre',$genre)->get();
        $all =count( Domaines::all());
        $bm =count(Domaines::where('genre',"Biologie Moléculaire")->get());
        $civ =count(Domaines::where('genre',"Culture In Vitro")->get());
        $para =count(Domaines::where('genre',"Parasitologie")->get());
        $seq =count(Domaines::where('genre',"Séquensage D'ADN")->get());
        $champs =count(Domaines::where('genre',"Cultures Sur Champ")->get());
        $serres =count(Domaines::where('genre',"Cultures En Serres")->get());
        $Indefinit =count(Domaines::where('genre',"Indefinit")->get());
        return view ("FrontEnd.domaines",compact("domaines",["all","bm",
            "civ",
            "para",
            "seq",
            "champs",
            "serres",
            "Indefinit"]
        ));
    }
}
