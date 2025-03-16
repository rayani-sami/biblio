<?php

namespace App\Http\Controllers\Subfront;

use App\Models\Niveau;
use App\Models\Rapport;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class RapportCon extends Controller
{
    public function rapport (){

        $specialiteUtilisateur = auth()->user()->section_id;

        $rapports = Rapport::with('user')->where([
            ['status', 1],
            ['section_id', $specialiteUtilisateur]
        ])->get()->toArray();

        return view('subfront.rapports.rapports')->with(compact('rapports'));
           }

         /**************ajouter ou modifier rapport */
         public function addEditRapport (Request $request, $id=null) {
            Session::put('page','rapports');
            if($id=="")
            {
               $title="ajouter  Rapport";
              $rapport=new Rapport;
              $message="Rapport add successffuly";
            }else
            { $title="modifier Rapport";
              $rapport=Rapport::find($id);
              $message="Rapport add successffuly";
            }
            if ($request->isMethod('post'))
            {
              $data = $request->all();

              //dd($data);
              $rules = [
                  'titre'=> 'required | regex: /^[\pL\s\-]+$/u',
                  'user_id' => 'unique:rapports',
                  ];

                  $customMessages = [
                  'titre.required' =>'titre is required',
                  'titre.regex' => 'Valid titre is required',
                  'user_id.unique' => 'This user has already submitted a report',

                  ];



                  $this->validate($request, $rules, $customMessages);
                  $user_id = Auth::user()->id;

                  // Vérifier si l'utilisateur a déjà soumis un rapport
                  $existingRapport = Rapport::where('user_id', $user_id)->first();

                  if ($existingRapport) {
                      $errorMessage = "Vous avez déjà soumis un rapport, vous pouvez le modifier.";
                  }

           //  $pdfPath = $request->file('pdf')->store('exams', 'public');
             $pdfPath = $request->file('pdf')->store('rapport','public');
             if ($request->hasFile('pdf')){

                $pdf_tmp=$request->file('pdf');
                if($pdf_tmp->isValid()){
                    //get pdf extension
                    $extension=$pdf_tmp->getClientOriginalExtension();
                    //generate new name pdf
                    $pdfName=$pdf_tmp->hashName();


                }
            }
                  $user_id=Auth::user()->id;
                  $user=Auth::user();
                  $niveau = Niveau::find($user->niveau_id);
                  $specialite=Section::find($user->section_id);
                 // $niveau=Auth::user()->niveau;
                  //$rapport = new Rapport();

                  $rapport->user_id= $user_id;
                  $rapport->titre= $data['titre'];
                  $rapport->pdf= $pdfName;
                  $rapport->section_id=$user->section_id;
                  $rapport->niveau_id=$user->niveau_id;
                  $rapport ->status=0;
                 $rapport ->date=$data['date'];
                  $rapport->save();

                  return redirect('subfront/rapports')->with('success_message', $message);

             }




          $specialites = Section::get()->toArray();
          $niveaux = Niveau::get()->toArray();
            return view('subfront.rapports.add_edit_rapport')->with (compact('title', 'rapport','specialites','niveaux'));
         }

/************************voir le rapport */
   public function viewPdfrapport($id)
   {
    $pdfFile = Rapport::findOrFail($id);
    $pdfPath = $pdfFile->pdf;
    $filePath = storage_path('app/public/rapport'.'/'. $pdfPath);
    return response()->file($filePath);
    }
   /*****************telercharger le cours by id */
   public function downloadrapport($path)
   {

    $rapport = Rapport::findOrFail($path);

    $pdfPath = $rapport->pdf;

    // Vérifie si le chemin du fichier PDF est null ou vide

    if (empty($pdfPath)) {

        return redirect()->back()->with('error', 'Aucun fichier PDF associé à cet examen.');
    }

    return response()->download(storage_path('app/public/rapport'.'/'. $pdfPath));


   }

}
