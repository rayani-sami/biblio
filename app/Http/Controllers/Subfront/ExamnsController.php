<?php

namespace App\Http\Controllers\Subfront;

use App\Models\User;
use App\Models\Cours;
use App\Models\Examen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExamnsController extends Controller
{
   public function examns (){

    $specialiteUtilisateur = auth()->user()->section_id;
    $niveauUtilisateur = auth()->user()->niveau_id;
    $examns =Examen::with('user')->where([
        ['section_id', $specialiteUtilisateur],
        ['niveau_id', $niveauUtilisateur]
    ])->get()->toArray();
      // dd($examns);

    //  $examens = Examen::all();
      return view('subfront.examns.examns')->with(compact('examns'));
   }


   public function download($path)
   {

    $exam = Examen::findOrFail($path);

    $pdfPath = $exam->examen_pdf;

    // Vérifie si le chemin du fichier PDF est null ou vide

    if (empty($pdfPath)) {

        return redirect()->back()->with('error', 'Aucun fichier PDF associé à cet examen.');
    }

    return response()->download(storage_path('app/public/exams'.'/'. $pdfPath));


   }


   public function viewPdf($id)
   {
       $pdfFile = Examen::findOrFail($id);
       $pdfPath = $pdfFile->examen_pdf;
       $filePath = storage_path('app/public/exams'.'/'. $pdfPath);
       return response()->file($filePath);
   }


}
