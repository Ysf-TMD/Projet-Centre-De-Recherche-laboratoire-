<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class EquipementController extends Controller
{
    //partie frontEnd
    //afficher les equipements Enregistrer ;

    public function AfficherEquipements()
    {
        $equipements = Equipement::latest()->get();
        return view ("FrontEnd.Equipements" , compact("equipements"));
    }

    public function FrontTelechargerEquipement(Response $response  ,Equipement $equipement)
    {
        $chemain = $equipement->guide;
        $nomEquipement=$equipement->nom;
        return response()->download("storage/".$chemain,"Guide D'utilisation de ".$nomEquipement,[],"attachment");
    }
    //partie Backend;
    //afficher le formulaire d'ajoute d'un equipement
    public function AjouterEquipement()
    {
        return view("BackEnd.GestionEquipements.AjouterEquipement");
    }
    public function EnregistrerEquipement(Request $request)
    {

        $validInfo=$request->validate([
            "nom"=>"required",
            "disponibiliter"=>"required",
            "dt_achat"=>"required",
            "responsable"=>"required",

        ],[
            "nom.required"=>"ce champs est obligatoire",
            "disponibiliter.required"=>"ce champs est obligatoire",
            "dt_achat.required"=>"ce champs est obligatoire",
            "responsable.required"=>"ce champs est obligatoire",
            "imageEquipement.required"=>"ce champs est obligatoire",
        ]);
        $imagefile=$request->file("imageEquipement");
        $imageName=time().".".$imagefile->getClientOriginalExtension();
        Image::make($imagefile)->resize(860,744)->save("storage/ImageEquipement/".$imageName);
        $saveImage="ImageEquipement/".$imageName;
        $img =$request->hasFile("imageEquipement")?$saveImage:'ImageEquipement/default.jpg';



//        $img =$request->hasFile("imageEquipement")?$request->file("imageEquipement")->store("img_chercheur","public"):'ImageEquipement/default.png';
        $guide = $request->hasFile("guide")?$request->file("guide")->store("GuideEquipement","public"):null;
        $validInfo=Equipement::insert([
            "nom"=>$request->nom,
            "disponibiliter"=>$request->disponibiliter,
            "dt_achat"=>$request->dt_achat,
            "responsable"=>$request->responsable,
            "guide"=>$guide,
            "imageEquipement"=>$img,
            "created_at"=>Carbon::now()
        ]);
        return to_route("ListerEquipements")->with("Equipement été Bien Ajouter");
    }
    //afficher la page d'equipements pour admin : (lister Equipements)
    public function ListerEquipements()
    {
        $equipements=Equipement::latest()->get();
        return view("BackEnd.GestionEquipements.ListerEquipement",compact("equipements"));
    }
    public function SupprimerEquipement( $equipement)
    {
        $articles=Equipement::find($equipement);
        $articles->delete();
        return to_route("ListerEquipements")->with("msg","Article Est Supprimé");
    }
}
