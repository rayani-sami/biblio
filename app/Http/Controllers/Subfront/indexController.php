<?php

namespace App\Http\Controllers\Subfront;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Examen;
use App\Models\Rapport;
use Illuminate\Http\Request;

class indexController extends Controller
{
   public function index () {
    return view('subfront.index');
   }

   public function search(Request $request)
   {
       $searchTerm = $request->input('q');

       // Perform the search query using your model
       $searchResults =Cours::where('name', 'like', '%' . $searchTerm . '%')
           ->get();
         //  ->toarray()
       // Pass the search results to the view
       return view('subfront.cours.search', ['searchResults' => $searchResults])->with(compact('searchResults'));
   }


   public function recherhe_examen(Request $request)
   {
       $searchTerm = $request->input('k');

       // Perform the search query using your model
       $searchResults =Examen::where('examen_name', 'like', '%' . $searchTerm . '%')
           ->get();

       // Pass the search results to the view
       return view('subfront.examns.search', ['searchResults' => $searchResults]);
   }


   public function recherche_rapport(Request $request)
   {
       $searchTerm = $request->input('R');

       // Perform the search query using your model
       $searchResults =Rapport::where('titre', 'like', '%' . $searchTerm . '%')
           ->get();

       // Pass the search results to the view
       return view('subfront.rapports.search', ['searchResults' => $searchResults]);
   }


}
