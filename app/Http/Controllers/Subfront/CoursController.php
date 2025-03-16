<?php

namespace App\Http\Controllers\Subfront;

use App\Models\Cours;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursController extends Controller
{


    /*******************liste cours */
    public function cours (){
        $specialiteUtilisateur = auth()->user()->section_id;
        $niveauUtilisateur = auth()->user()->niveau_id;
       // $cours=Cours::all();


        $cours = Cours::with('user')->where([
            ['section_id', $specialiteUtilisateur],
            ['niveau_id', $niveauUtilisateur]
        ])->get()->toArray();
          //dd($cours);
        return view('subfront.cours.cours')->with(compact('cours'));
     }
     /*****************telercharger le cours by id */
   public function download($path)
   {

    $exam = Cours::findOrFail($path);

    $pdfPath = $exam->pdf;

    // Vérifie si le chemin du fichier PDF est null ou vide

    if (empty($pdfPath)) {

        return redirect()->back()->with('error', 'Aucun fichier PDF associé à cet examen.');
    }

    return response()->download(storage_path('app/public'.'/'. $pdfPath));


   }

 /*****************voir le cours by id */
   public function viewPdf($id)
   {
       $pdfFile = Cours::findOrFail($id);
       $pdfPath = $pdfFile->pdf;
       $filePath = storage_path('app/public'.'/'. $pdfPath);
       return response()->file($filePath);
   }
}
