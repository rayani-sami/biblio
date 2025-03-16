<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cours;
use App\Models\Niveau;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function cours (){
        $cours=Cours::get()->toarray();

        return view('admin.cours.cours')->with(compact('cours'));

           }

         /**************ajouter ou modifier Cours */
         public function addEditCour (Request $request, $id=null) {
            Session::put('page','Cours');
            if($id=="")
            {
               $title="Add Cours";
              $cour=new Cours;
              $message="Cours add successffuly";
            }else
            { $title="Edit Cours";
              $cour=Cours::find($id);
              $message="Cours add successffuly";
            }
            if ($request->isMethod('post'))
            {
              $data = $request->all();

              //dd($data);
              $rules = [
                  'name'=> 'required | regex: /^[\pL\s\-]+$/u',

                  ];

                  $customMessages = [
                  'name.required' =>'Name is required',
                  'name.regex' => 'Valid Name is required',
                  ];

                  $this->validate($request, $rules, $customMessages);


             //  $pdfPath = $request->file('pdf')->store('exams', 'public');
             $pdfPath = $request->file('pdf')->store('cours','public');


                  $adminType=Auth::guard('admin')->user()->type;
                  $enseignant_id=Auth::guard('admin')->user()->enseignant_id;
                  $admin_id=Auth::guard('admin')->user()->id;
                  $cour->admin_type = $adminType;
                 // $cour->admin_type = $adminType;

                  if($adminType=="enseignant"){
                    $cour->enseignant_id = $enseignant_id;
                  }else{
                    $cour->enseignant_id = 0;
                  }



                  //$examen = new Examen();
                  $cour->name= $data['name'];
                  $cour->pdf= $pdfPath;
                  $cour->section_id = $request->specialite;
                  $cour->niveau_id = $request->niveau;

                  $cour->save();

                  return redirect('admin/cours')->with('success_message', $message);




          }
          $specialites = Section::get()->toArray();
          $niveaux = Niveau::get()->toArray();
            return view('admin.cours.add_edit_cours')->with (compact('title', 'cour','specialites','niveaux'));
         }



    /*****************delete Cours */
    public function deleteCourse ( $id) {

        Cours::where('id',$id)->delete();
      $message="Cours has deleted successfully";
    return redirect()->back()->with('succes_message',$message);

   }
}
