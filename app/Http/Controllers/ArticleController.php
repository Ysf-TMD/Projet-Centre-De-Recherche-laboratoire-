<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Domaines;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AddArticles(Request $req )
    {
        $id=$req->domaine_id;
        return view("BackEnd.GestionArticles.AjouterArticle",compact("id"));
    }
    public function SaveArticle(Request $req )
    {

        $validInfo=$req->validate([
            "Nom_article"=>"required",
            "description"=>"required",
            "piece_joint"=>"mimes:pdf,docx,word,rtf"
        ],[
            "piece_joint.mimes"=>"les formts supportés sont : pdf | docx | rtf | word"
        ]);
        $insertInfo=Article::insert([
            "Nom_article"=>$req->Nom_article,
            "description"=>$req->description,
            "piece_joint"=>$req->file("piece_joint")?$req->file("piece_joint")->store("DossierArticles","public"):null ,
            "created_at"=>Carbon::now(),
            "domaine_id"=>$req->id_domaine
        ]);
        return redirect("domaines")->with("msg","Article Ajouter En success");
    }
    public function ListeArticle($id)
    {

        $articles = Article::all()->where("domaine_id",$id);
        $domaine=Domaines::all()->where("id",$id);

        $nbrArticles=count($articles);
        if($nbrArticles!==0){
            return view("BackEnd.GestionArticles.ListerArticles",compact("articles","domaine"));
        }else{
            return back()->with("msg","Les Articles de ce domaine n'exists pas ...!!!");
        }
    }
    public function TelechargerArticle(Response $response , Request $request , Article $article)
    {

        $fileName= $article->Nom_article;
        $chemain = $request->get("chemain");
        return response()->download("storage/".$chemain,"Article De ".$fileName,[],"attachment");
    }
    public function SupprimerArticle($article)
    {
        $articles=Article::find($article);
        $articles->delete();
        return redirect("domaines")->with("msg","Article Est Supprimé");
    }


    //Gestion d'article Front END
    public function FrontListeArticles($id)
    {
        $articles = Article::all()->where("domaine_id",$id);
        $domaine=Domaines::all()->where("id",$id);

        $nbrArticles=count($articles);
        if($nbrArticles!==0){
            return view("FrontEnd.Articles",compact("articles","domaine"));
        }else{
            return back()->with("msg","Les Articles de ce domaine n'exists pas ...!!!");
        }
    }
    public function FrontTelechargerArticle(Response $response  ,Article $article)
    {
        $chemain = $article->piece_joint;
        $nomArticle=$article->Nom_article;
        return response()->download("storage/".$chemain,$nomArticle,[],"attachment");
    }
}
