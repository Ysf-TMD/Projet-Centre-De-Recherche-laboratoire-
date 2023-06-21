<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");
//Gestion de Panneau d'Admin  --------------------------------------------------------------------------------------------------------------------------------- :
Route::get("/admin/pannel",[\App\Http\Controllers\AdminPanel::class,"AdminPannel"])->name("admin.pannel");
Route::post("/admin/reclamations",[\App\Http\Controllers\AdminPanel::class,"AdminReclamations"])->name("reclamations");
Route::delete("/admin/SupprimerReclamation/{reclamation}",[\App\Http\Controllers\AdminPanel::class,"SupprimerReclamation"])->name("SupprimerReclamation");
Route::get("/admin/logout",[\App\Http\Controllers\AdminPanel::class,"LogoutAdmin"])->name("admin.logout");
Route::get("/admin/actions",[\App\Http\Controllers\AdminPanel::class,"liseActions"])->name("admin.actions");
Route::post("/admin/AddUser",[\App\Http\Controllers\AdminPanel::class,"AddUser"])->name("admin.AddUser");
//Route::get("/admin/RestorUser",[\App\Http\Controllers\AdminPanel::class,"RestoreUser"])->name("admin.RestorUser");
Route::get("/admin/EditeUser/{id}",[\App\Http\Controllers\AdminPanel::class,"EditeUser"])->name("admin.EditeUser");
Route::get("/admin/DeleteUser/{id}",[\App\Http\Controllers\AdminPanel::class,"SupprimerUtilisateur"])->name("admin.DeleteUser");
Route::put("/admin/UpdateUser/{id}",[\App\Http\Controllers\AdminPanel::class,"UpdateUser"])->name("admin.UpdateUser");

//Gestion Chercheurs Backend partie Admin ---------------------------------------------------------------------------------------------------------------------------------
Route::resource("chercheur",\App\Http\Controllers\ChercheurController::class );

//Gestion Recherchers  D'un Chercheur -----------------------------------------------------------------------------------------------------------------------------
Route::controller(\App\Http\Controllers\RecherchesController::class)->group(function(){
    //Gestion Recherches D'un chercheur partie frontEnd
    Route::prefix("FrontEnd")->group(function(){
        Route::post("liste_recherches_chercheur/{chercheur}","liste_recherches_chercheur_front")->name("liste_recherches_chercheur");
    });
    //gestion Recherche d'un chercheur partie BackEnd
    Route::prefix("BackEnd")->group(function(){
        Route::any("AjouterRecherche/{chercheur}",'AjouterRecherche')->name("AjouterRecherche");
        Route::post("EnregistrerRecherche/{chercheur}",'EnregistrerRecherche')->name("EnregistrerRecherche");
        Route::any("listerRecherches/{chercheur}","listerRecherches")->name("listerRecherches");
        Route::delete("SupprimerDocument/{recherche}","SupprimerDocument")->name("SupprimerDocument");
        Route::post("TelechargerRecherche/{recherche}","TelechargerRecherche")->name("TelechargerRecherche");
    });
    Route::prefix("FronEnd")->group(function(){
        Route::post("TelechargerRechercheFront/{recherche}","TelechargerRechercheFront")->name("TelechargerRechercheFront");
    });

});
//Gestion Stagiaires---------------------------------------------------------------------------------------------------------------------------------
Route::resource("stagiaires",\App\Http\Controllers\StagiairesController::class );
//Gestion Domaines---------------------------------------------------------------------------------------------------------------------------------
Route::resource("domaines",\App\Http\Controllers\DomainesController::class );
Route::post("relationDomaine/{domaines}", [\App\Http\Controllers\DomainesController::class ,"relationDomaine"])->name("relationDomaine");
Route::post("FrontrelationDomaine/{domaines}", [\App\Http\Controllers\DomainesController::class ,"FrontrelationDomaine"])->name("FrontrelationDomaine");
//Gestion Articles ---------------------------------------------------------------------------------------------------------------------------------
Route::controller(\App\Http\Controllers\ArticleController::class)->group(function()
{
    //gestion d'articles back END
    Route::get("AddArticles","AddArticles" )->name("AddArticles");
    Route::post("SaveArticle","SaveArticle" )->name("SaveArticle");
    Route::get("ListeArticle/{id}","ListeArticle" )->name("ListeArticle");
    Route::post("TelechargerArticle/{article}","TelechargerArticle" )->name("TelechargerArticle");
    Route::delete("SupprimerArticle/{article}","SupprimerArticle" )->name("SupprimerArticle");
    //gestion d'articles front END
    Route::prefix("FrontEnd")->group(function(){
        Route::get("listerArticles/{id}","FrontListeArticles")->name("listerArticles");
        Route::post("FrontTelechargerArticle/{article}","FrontTelechargerArticle")->name("FrontTelechargerArticle");
    });
});
//Gestion d'equipment de laboratoire
Route::controller(\App\Http\Controllers\EquipementController::class)->group(function()
{
    //gestion equipement frontend
    Route::get("equipements","AfficherEquipements")->name("equipements");
    Route::post("FrontTelechargerEquipement/{equipement}","FrontTelechargerEquipement")->name("FrontTelechargerEquipement");
    //gestion equipement de backend
    Route::prefix("Backend")->group(function()
    {
        Route::get("AjouterEquipement","AjouterEquipement")->name("AjouterEquipement");
        Route::post("EnregistrerEquipement","EnregistrerEquipement")->name("EnregistrerEquipement");
        Route::get("ListerEquipements","ListerEquipements")->name("ListerEquipements");
        Route::delete("SupprimerEquipement/{equipement}","SupprimerEquipement")->name("SupprimerEquipement");
    });
});

//Gestion Slider-----------------------------------------------------------------------------------------------------------------------------------------
Route::controller(\App\Http\Controllers\GlobalSections::class)->group(function(){
    Route::get("/chrch","listerChercheurs")->name("chercheurs");
    Route::get("/dmn","ListedDomaines")->name("domaines");
    Route::get("/dmn/trie/{type}","TrierDomaine")->name("TrierDomaine");
    Route::get("/dmn/categorie/{genre}","Categories")->name("Categories");
    Route::get("/stg","listerStagiaires")->name("stagiaires");
    Route::get("/reclamation","reclamation")->name("reclamation");
    Route::post("/addReclamation","addReclamation")->name("addReclamation");
});
//login internaut-----------------------------------------------------------------------------------------------------------------------------------------
Route::get("/loginUser",[\App\Http\Controllers\LoginUserController::class,"LoginUser"])->name("loginUser");
Route::post("/LoginUserFront",[\App\Http\Controllers\LoginUserController::class,"LoginUserFront"])->name("LoginUserFront");
Route::get("/logoutUser",[\App\Http\Controllers\LoginUserController::class,"logoutUser"])->name("logoutUser");
Route::get("/RegisterUser",[\App\Http\Controllers\LoginUserController::class,"RegisterUser"])->name("RegisterUser");
Route::post("/RegisterUser/add",[\App\Http\Controllers\LoginUserController::class,"AddUser"])->name("AddUser");


//Gestion de Chercheurs Associé au domaines Spécifiques ...---------------------------------------------------------------------------------------------------------------------------------
Route::controller("App\\Http\\Controllers\\ChercheurDomaine")->group(function(){
    //gestion via admin (BackEnd)
    Route::prefix("BackEnd")->group(function(){
        Route::get("listeDomainesChercheur","listerChercheur_domaine")->name("listeDomaineChercheur");
    });
    //Affichage pour utilisateur (FrontEnd)
    Route::prefix("FrontEnd")->group(function(){});
});


//---------------------------------------------------------------------------------------------------------------------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = App\Models\User::latest()->paginate("5");
        return view('dashboard',compact("users"));
    })->name('dashboard');
});
