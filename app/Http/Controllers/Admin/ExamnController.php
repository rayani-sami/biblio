<?php

namespace App\Http\Controllers\Admin;

use App\Models\Examen;
use App\Models\Niveau;
use App\Models\PdfFile;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExamnController extends Controller
{
   public function examen (){
$examns=Examen::get()->toarray();

return view('admin.examens.examens')->with(compact('examns'));

   }

 /**************ajouter ou modifier examen */
 public function addEditExamen (Request $request, $id=null) {
    Session::put('page','examens');
    if($id=="")
    {
       $title="Add Examen";
      $examen=new Examen;
      $message="Examen add successffuly";
    }else
    { $title="Edit Examen";
      $examen=Examen::find($id);
      $message="Examen add successffuly";
    }
    if ($request->isMethod('post'))
    {
      $data = $request->all();

      //dd($data);
      $rules = [
          'examen_name'=> 'required | regex: /^[\pL\s\-]+$/u',
          ];

          $customMessages = [
          'examen_name.required' =>'Name is required',
          'examen_name.regex' => 'Valid Name is required',
          ];

          $this->validate($request, $rules, $customMessages);


   //  $pdfPath = $request->file('pdf')->store('exams', 'public');
     $pdfPath = $request->file('examen_pdf')->store('exams','public');
     if ($request->hasFile('examen_pdf')){

        $pdf_tmp=$request->file('examen_pdf');
        if($pdf_tmp->isValid()){
            //get image extension
            $extension=$pdf_tmp->getClientOriginalExtension();
            //generate new name image
            $pdfName=$pdf_tmp->hashName();

            //upload; image
        //    \Intervention\Image\Facades\Image::make($image_tmp)->save($imagePath);
        }
    }
          $adminType=Auth::guard('admin')->user()->type;
          $enseignant_id=Auth::guard('admin')->user()->enseignant_id;
          $admin_id=Auth::guard('admin')->user()->id;
          $examen->admin_type = $adminType;
          $examen->admin_type = $adminType;

          if($adminType=="enseignant"){
            $examen->enseignant_id = $enseignant_id;
          }else{
            $examen->enseignant_id = 0;
          }



          //$examen = new Examen();
          $examen->examen_name= $data['examen_name'];
          $examen->description= $data['description'];
          $examen->examen_pdf= $pdfName;
          $examen->section_id = $request->specialite;
          $examen->niveau_id = $request->niveau;
          $examen ->status=1;
          $examen->save();

          return redirect('admin/examns')->with('success_message', $message);




  }
  $specialites = Section::get()->toArray();
  $niveaux = Niveau::get()->toArray();
    return view('admin.examens.add_edit_examen')->with (compact('title', 'examen','specialites','niveaux'));
 }


    /*****************delete examen */
    public function deleteExamen ( $id) {

        Examen::where('id',$id)->delete();
      $message="Examen has deleted successfully";
    return redirect()->back()->with('succes_message',$message);

   }







}
