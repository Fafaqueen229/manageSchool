<?php

use App\Http\Controllers\enseignantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\categoryController;
use app\http\Controllers\coursController;
use app\Http\Controllers\Controller;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::controller( StudentsController::class)->middleware('auth')->group(function(){
Route::post('/store','store')->name('store');
Route::get('/',  "index")->name('index');
Route::get ('/created', 'created')->name("created");
Route::get ('/update/{id}', 'update')->name("update");
Route::get ('/delete/{id}', 'delete')->name("delete");
Route::get ('/details/{id}', 'details')->name("details");
Route::put ('/activate/{id}', 'activate')->name("activate");
}); 

Route::controller( enseignantController::class)->middleware('auth')->group(function(){
    Route::get ('/addProf', 'addProf')->name("addProf");
  
    Route::get('/listEnseignant','listEnseignant')->name('listEnseignant');

});
/*Route::get('/',  function(){
    return view("addCourse");
});

//Route::get('/students', [StudentsController::class, "create"])->name('index');
/*Route::get('/students/id' , [StudentsController::class, "show"])->name("indeWithId");





Route::get ('/addProf', function (){
    return view ('addProf');
})->name("addProf");


Route::delete('students/{id}', 'StudentsController@destroy')->name('students.destroy'); */

/*Route::get('/login', [UserController::class, "login"])->name('login');
Route::get('/register', [UserController::class, "register"])->name('register'); */


/*Route::controller( StudentsController::class)->middleware('auth')->group(function(){
    Route::get('/', "index")->name('index');
    Route::get('/students ',  "students")->name('indexWithId');

    //Route::post('/store/register',  "store")->name("storeUser");


});
  */
Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('/login', "login")->name('login');
    Route::get('/logout', "logout")->name('logout');
    Route::get('/forgotPassword', "forgotPassword")->name('forgotPassword');
    Route::get('/changePassword', "changePassword")->name('changePassword');
    Route::get('/register',  "register")->name('register');
    Route::post('/authentification',  "authentification")->name('authentification');
    Route::post('/store/register',  "store")->name("storeUser");
    Route::get('/verify_email/{email}',  "verify")->name('verifyEmail');
    Route::post('/storePwd',  "storePwd")->name("storePwd");
    Route::get('/verifyPwd',  "verifyPwd")->name('verifyPwd');
    Route::post('/updatePwd/{email}',  "updatePwd")->name('updatePwd');
   
});

Route::get('/gestionCours', [ coursController::class,"gestionCours"])->name("gestionCours");
Route:: get('/attribuer_cours', [ AttributionEtudiantController::class,"index"])->name("attributionCours");
Route::get('ajout_cours', [ coursController::class,"create"]);
Route::post('store_cours', [ coursController::class,"store"])->name('cours.store');
Route:: get('/cours/delete/{id}', [ coursController::class,"delete"])->name("delete");
Route:: get('/cours/update/{id}', [ coursController::class,"update"])->name("update");
Route:: get('/cours/{id}', [ coursController::class,"show"])->name("cours_show");
Route::post('/update_cours_store',[coursController::class,'updateStore'])->name('update_cours');