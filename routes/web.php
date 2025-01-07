<?php

use App\Http\Controllers\CarburantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ExpressController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VehiculeAdminController;
use App\Http\Controllers\VendeurAdminController;
use App\Models\Transmission;
use App\Models\Vehicule;
use App\Models\Vehicule_categorie;

/*
|--------------------------------------------------------------------------
| Web Routes .
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
/*Route::get('/index', function () {
    return view('index');
});*/

Route::get('/vendre', function () {
    return view('vendre');
});
Route::get('/Express', function () {
    return view('Express');
})->name("Express");
Route::get('/Panier', function () {
    return view('Panier');
});
//Route::get('/voiture_neuf', function () {
 //   return view('voiture_neuf');
//});


Route::get("/Accueil/{id?}","VehiculeController@index")->name("vehicule.index");
Route::get("/achet","VehiculeController@search")->name("vehicule.achet");
Route::get("/vendre","VehiculeController@vendre")->name("vehicule.vendre");
Route::post("/get-modeleIndex","VehiculeController@getModeleIndex");
Route::post("/get-modele","VehiculeController@getModele");
Route::get('detail/{id?}', [VehiculeController::class, 'showDetails'])->name('vehicule.detail');

Route::get('add-to-cart/{id}', [VehiculeController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/m', [CartController::class, 'destory'])->name('cart.destroy');
Route::post('/vendeur', [VendeurController::class, 'store'])->name('vendeur.store');

Route::post('/Express', [ExpressController::class,'Envoyer'])->name('express.envoyer');
Route::get('/Connexion', [VehiculeController::class,'deconnexion']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
     //Marque:
    Route::get('/marques', [MarqueController::class,'index'])->name('vehicule.marques');
    Route::post('/marques', [MarqueController::class,'store'])->name('marque.ajouter');
    Route::get("marqueDelete/{id}",[MarqueController::class,'destroy'])->name('marque.supprimer');
    Route::put("marqueEdit/{id}",[MarqueController::class,'update'])->name('marque.modifier');
    Route::get('/searchMarques', [RechercheController::class,'searchMarque'])->name('marques.recherche');
    //modele:modeles.recherche
    Route::get('/modeles', [ModeleController::class,'index'])->name('vehicule.modeles');
    Route::post('/modeles', [ModeleController::class,'store'])->name('modele.ajouter');
    Route::get("modeleDelete/{id}",[ModeleController::class,'destroy'])->name('modele.supprimer');
    Route::put("modeleEdit/{id}",[ModeleController::class,'update'])->name('modele.modifier');
    Route::get('/searchModeles', [RechercheController::class,'searchModele'])->name('modeles.recherche');
    //carburant
    Route::get('/carburants', [CarburantController::class,'index'])->name('vehicule.carburants');
    Route::post('/carburants', [CarburantController::class,'store'])->name('carburant.ajouter');
    Route::get("carburantDelete/{id}",[CarburantController::class,'destroy'])->name('carburant.supprimer');
    Route::put("carburantEdit/{id}",[CarburantController::class,'update'])->name('carburant.modifier');
    Route::get('/searchCarburant', [RechercheController::class,'searchCarburant'])->name('carburants.recherche');

    //ville
    Route::get('/villes', [VilleController::class,'index'])->name('vehicule.villes');
    Route::post('/villes', [VilleController::class,'store'])->name('ville.ajouter');
    Route::get("villeDelete/{id}",[VilleController::class,'destroy'])->name('ville.supprimer');
    Route::put("villeEdit/{id}",[VilleController::class,'update'])->name('ville.modifier');
       //transmission
       Route::get('/transmissions', [TransmissionController::class,'index'])->name('vehicule.transmissions');
       Route::post('/transmissions', [TransmissionController::class,'store'])->name('transmission.ajouter');
       Route::get("transmissionDelete/{id}",[TransmissionController::class,'destroy'])->name('transmission.supprimer');
       Route::put("transmissionEdit/{id}",[TransmissionController::class,'update'])->name('transmission.modifier');
       Route::get('/searchTransmission', [RechercheController::class,'searchTransmission'])->name('transmission.recherche');
       //categorie
       Route::get('/Categories', [CategorieController::class,'index'])->name('vehicule.categories');
       Route::post('/Categories', [CategorieController::class,'store'])->name('categorie.ajouter');
       Route::get("categorieDelete/{id}",[CategorieController::class,'destroy'])->name('categorie.supprimer');
       Route::put("categorieEdit/{id}",[CategorieController::class,'update'])->name('categorie.modifier');
      //couleur
      Route::get('/Couleurs', [CouleurController::class,'index'])->name('vehicule.couleurs');
      Route::post('/Couleurs', [CouleurController::class,'store'])->name('couleur.ajouter');
      Route::get("couleurDelete/{id}",[CouleurController::class,'destroy'])->name('couleur.supprimer');
      Route::put("couleurEdit/{id}",[CouleurController::class,'update'])->name('couleur.modifier');
      Route::get('/searchCouleurs', [RechercheController::class,'searchCouleur'])->name('couleurs.recherche');

      Route::get("showPassword/{id}",[UtilisateurController::class,'showPassword'])->name('show.password');
      //vendeur
      Route::get('/vendeurs', [VendeurAdminController::class,'index'])->name('vehicule.vendeurs');
      Route::post('/vendeurs', [VendeurAdminController::class,'store'])->name('vendeur.ajouter');
      Route::get("vendeurDelete/{id}",[VendeurAdminController::class,'destroy'])->name('vendeur.supprimer');
      Route::get("/searchVendeur",[RechercheController::class,'searchVendeur'])->name('vehicule.recherche');
      Route::put("vendeurEdit/{id}",[VendeurAdminController::class,'update'])->name('vendeur.modifier');
      Route::get("showPassword/{id}",[UtilisateurController::class,'showPassword'])->name('show.password');
      //password
      Route::get('/utilisateurs', [UtilisateurController::class,'index'])->name('vehicule.utilisateurs');
      Route::post('/utilisateurs', [UtilisateurController::class,'store'])->name('utilisateur.ajouter');
      Route::get("utilisateurDelete/{id}",[UtilisateurController::class,'destroy'])->name('utilisateur.supprimer');
      Route::put("utilisateurEdit/{id}",[UtilisateurController::class,'update'])->name('utilisateur.modifier');
     //mission
     Route::get('/Les_missions', [MissionController::class,'index'])->name('mission.index');
     Route::get('/missionsExpert', [MissionController::class,'MissionExpert'])->name('mission.Expert');
     Route::get('/missions', [RechercheController::class,'searchMissionExpert'])->name('mission.search');
     Route::get('/missions', [RechercheController::class,'searchMissionGestionnaire'])->name('missions.search');
     Route::post('/missions/{id_demande}', [MissionController::class,'EnvoyerMission'])->name("Mission.envoyer");
     Route::post('/Ajouter/{id}', [MissionController::class,'Addvehicule'])->name('AddVehicule');
     Route::post('/vendeurs', [VendeurAdminController::class,'store'])->name('vendeur.ajouter');
     Route::get('/experts', [ExpertController::class,'index'])->name('experts.index');

     Route::get('/AddUser', function () {
        return view('auth.inscription');
    })->name("AddUser");

    Route::get('/utilisateurs',[UtilisateurController::class,'index'])->name('utilisateur.index');
    //vehicules
    Route::get('/vehicules',[VehiculeController::class,'indexAdmin'])->name('vehicule.vehicules');
    Route::get('/vehiculess',[VehiculeController::class,"indexExpert"])->name("Expert.vehicules");
    Route::put("VehiculeEdit/{id}",[VehiculeController::class,'update'])->name('vehicule.modifier');
    Route::get('/searchVehicules',[RechercheController::class,'searchVehicules'])->name('vehicules.recherche');
    Route::get("deleteVehicule/{id}",[MissionController::class,'deleteVehicule'])->name('delete.vehicule');

    Route::get('/Gestionnaire', function () {
        return view('index');
    })->name('Gestionnaire');

    Route::get('/demande', [DemandeController::class,'index'])->name('vehicule.demande');
    Route::get('/detail-demande/{id}', [DemandeController::class,'Detaildemande'])->name('vehicule.detaildemande');
    Route::post('/EnvoyerMission/{id}', [MissionController::class,'EnvoyerMission'])->name('mission.envoyer');
    Route::get('/missions/{id}', [MissionController::class,'infoVehicule'])->name("VehiculeExpert");
   // Route::get('/missions', [MissionController::class,'back'])->name("back");


});

