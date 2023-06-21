<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Domaines;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DomainesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domaines = Domaines::latest()->paginate(5);
        return view ("BackEnd.GestionDomaines.lister",compact("domaines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("BackEnd.GestionDomaines.Ajouter");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "description"=>"required",
            "genre"=>"required",
            "image"=>"mimes:jpeg,jpg,png,gif,tif,psd,eps,svg,web"

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "description.required"=>"Ce Champs Est Obligatoire",
            "genre.required"=>"Ce Champs Est Obligatoire",
            "image.mimes"=>"Format non supporté ...",

        ]);

        $imagefile=$request->file("image");
        $imageName=time().".".$imagefile->getClientOriginalExtension();
        Image::make($imagefile)->resize(712,348)->save("storage/img_domaine/".$imageName);
        $saveImage="img_domaine/".$imageName;
        $img =$request->hasFile("image")?$saveImage:'img_domaine/agro_default.jpg';


//        $img =$request->hasFile("image")?$request->file("image")->store("img_chercheur","public"):'img_domaine/agro_default.png';
        $validInfo=Domaines::insert([
            "nom"=>$request->nom,
            "genre"=>$request->genre,

            "description"=>$request->description,
            "image"=>$img,
            "created_at"=>Carbon::now()
        ]);
        return to_route("domaines.index")->with("msg","Domaine Ajouter En Success");

    }

    /**
     * Display the specified resource.
     */
    public function show(Domaines $domaines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domaines $domaine)
    {
        return view("BackEnd.GestionDomaines.update",compact("domaine"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domaines $domaine)
    {

        $validInfo = $request->validate([
            "nom"=>"required|min:3|max:255",
            "description"=>"required",
            "genre"=>"required",
            "image"=>"mimes:jpeg,jpg,png,gif,tif,psd,eps,svg,web"

        ],[
            "nom.required"=>"Ce Champ est obligatoire",
            "nom.min"=>"Entrer minimum 3 characters",
            "description.required"=>"Ce Champs Est Obligatoire",
            "genre.required"=>"Ce Champs Est Obligatoire",
            "image.mimes"=>"format non supporté ...",

        ]);
        if($request->hasFile("image"))
        {

            $imagefile=$request->file("image");
            $imageName=time().".".$imagefile->getClientOriginalExtension();
            Image::make($imagefile)->resize(712,348)->save("storage/img_domaine/".$imageName);
            $saveImage="img_domaine/".$imageName;
            $img =$request->hasFile("image")?$saveImage:'img_domaine/agro_default.jpg';


        }
        else
        {
            $img=$request->oldImage;
        }

        $validInfo=$domaine->update([
            "nom"=>$request->nom,
            "description"=>$request->description,
            "genre"=>$request->genre,
            "image"=>$img,
            "updated_at"=>Carbon::now()
        ]);
        return to_route("domaines.index")->with("msg","Domaine Modifier En Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domaines $domaine)
    {
        $domaine->delete();
        return redirect()->route("domaines.index")->with("msg","Domaine Supprimé En Success");
    }
    //Gestion des relations chercheur-domaine par genre partie admin (Backend)
    public function relationDomaine(Domaines $domaines)
    {
        $genre = $domaines->genre;
        $chercheurs = Chercheur::all()->where("DomaineChercheur",$genre);
        return view ("BackEnd.GestionDomaines.relations",compact("chercheurs"));

    }
    //Gestion des relations chercheur-domaine par genre partie utilisateur (Frontend)
    public function FrontrelationDomaine(Domaines $domaines)
    {
        $genre = $domaines->genre;
        $chercheurs = Chercheur::all()->where("DomaineChercheur",$genre);
        return view ("Frontend.DomaineChercheur",compact("chercheurs"));

    }

}
