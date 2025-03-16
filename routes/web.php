<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Subfront\RapportCon;
use App\Http\Controllers\Admin\ExamnController;

use App\Http\Controllers\Admin\RapportController;
use App\Http\Controllers\Subfront\CoursController;
use App\Http\Controllers\Subfront\indexController;
use App\Http\Controllers\Subfront\ExamnsController;

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

Route::get('/dddd', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//route group admin without
route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function (){
    // admin login
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware'=>['admin']],function (){
        // admin dashboard route
       Route::get('dashboard','AdminController@dashboard');
    //update password admin
   route::match(['get','post'],'/update-admin-password','AdminController@updateAdminPassword');
    // check admin password
      Route::post ('check-admin-password','AdminController@checkAdminPassword');
     //update password admin
    route::match(['get','post'],'/update-admin-details','AdminController@updateAdminDetails');
   // update details for enseignant
    Route::match(['get','post'],'updateEnseignant','AdminController@updateEnseignantDetails');
   //type admin
    Route::get('/admins/{type?}','AdminController@admins');
// view enseignant details
    Route::get('view-enseignant-details/{id}','AdminController@viewEnseignantDetails');
// update status
    Route::post('update-admin-status','AdminController@UpdateAdminStatus');
// get subscribers and delete it
     Route::get('/subscribers','NewsletterController@subscribers');
     Route::get('delete-subscriber/{id}','NewsletterController@deleteSubscriber');
       //logout admin
       Route::get('logout','AdminController@logout');
       // sections route
   Route::get('sections','SectionController@sections');
   Route::post('update-section-status','SectionController@UpdateSectionStatus')->name('sec');
   Route::get('delete-section/{id}','SectionController@deleteSection');
   Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');
// niveaux route
     route::get('niveaux','NiveauController@Niveau');
     Route::post('update-niveau-status','NiveauController@UpdateNiveauStatus');
     Route::get('append-niveau-level','NiveauController@appendNiveaulevel');
     Route::match(['get','post'],'add-edit-niveau/{id?}','NiveauController@addEditniveau');
     Route::get('delete-niveau/{id}','NiveauController@deleteNiveau');
// users route
     route::get('users','AdminController@Users');
     Route::post('update-user-status','AdminController@UpdateUserStatus');
     Route::get('delete-user/{id}','AdminController@deleteUser');
     /// examns route from enseignant
     route::get('/examns','ExamnController@examen');
     Route::match(['get','post'],'add-edit-examen/{id?}','ExamnController@addEditExamen');
     Route::get('delete-examen/{id}','ExamnController@deleteExamen');
      /// course route from enseignant
     route::get('/cours','CourseController@cours');
     Route::match(['get','post'],'add-edit-cours/{id?}','CourseController@addEditCour');
     Route::get('delete-cours/{id}','CourseController@deleteCourse');
     // rapport routes
     route::get('/rapports','RapportController@rapport');
     Route::post('update-rapport-status','RapportController@UpdateRapportStatus');
     Route::get('/rapport/{id}/view', [RapportController::class, 'viewPdfrapport'])->name('rapport_pdf');
     Route::get('delete-rapport/{id}','RapportController@deleteRapport');
    });


    });
// route withoutt index
    route::prefix('/')->namespace('App\Http\Controllers\Front')->group(function (){

         route::get('/index','IndexController@index');
         Route::match(['get', 'post'],'/contact','IndexController@contactus');

         route::post('/add-subscriber-email','IndexController@addSubscriber');
         route::get('/about','IndexController@about');

         route::get('/service','IndexController@service');

         route::get('/fqs','IndexController@fqs');
         route::get('/privacy','IndexController@privacy');

        /**********************  route of enseignant */
        Route::get('/enseignant/login','EnseignantController@loginenseignant');
        Route::post('/enseignant/login','EnseignantController@enseignantLogin');
        Route::get('/enseignant/register','EnseignantController@register');
        Route::post('/enseignant/register','EnseignantController@register_enseignant');
        Route::get('enseignant/confirm/{code}','EnseignantController@confirmEnseignant');
        /***************************route of users / etudiant */
        Route::get('/user/login','UserController@login');
        Route::post('/user/login','UserController@userLogin');
        Route::get('/user/register','UserController@register');
        Route::post('/user/register','UserController@userRegister');
        Route::get('user/confirm/{code}','UserController@confirmAccount');
        Route::match(['get', 'post'],'user/forgot-password','UserController@forgotPassword');

    });


// route without auth user to upload pdf examen ,rapport , course


    route::prefix('/subfront')->namespace('App\Http\Controllers\Subfront')->group(function (){

        route::get('/index','indexController@index');

        Route::match(['get', 'post'],'user/forgot-password','UserController@forgotPassword');

        Route::match(['get', 'post'],'/user/account','UserController@updateDetails');

        Route::match(['get', 'post'],'/user/update-password','UserController@userUpdatePassword');

        Route::get('/search', [indexController::class, 'search'])->name('search');
        Route::get('/recherhe_examen', [indexController::class, 'recherhe_examen'])->name('recherhe_examen');
        Route::get('/recherche', [indexController::class, 'recherche_rapport'])->name('recherche');
        //logout user
       Route::get('user/logout','UserController@userLogout');


       /****************route examns */
        Route::get('/examns','ExamnsController@examns');
        Route::get('examens/{id}', [ExamnsController::class, 'download'])->name('download_url');
        Route::get('/pdfs/{id}/view', [ExamnsController::class, 'viewPdf'])->name('pdf.view');

             /****************route cours */


          Route::get('/cours','CoursController@cours');

          Route::get('cours/{id}', [CoursController::class, 'download'])->name('download');

          Route::get('/course/{id}/view', [CoursController::class, 'viewPdf'])->name('pdf');




               /****************route rapport */

          Route::get('/rapports','RapportCon@rapport');

          Route::match(['get','post'],'add-edit-rapport/{id?}','RapportCon@addEditRapport');

          Route::get('rapports/{id}', [RapportCon::class, 'downloadrapport'])->name('rapportdownload');

          Route::get('/rapports/{id}/view', [RapportCon::class, 'viewPdfrapport'])->name('view-pdf');





    });
