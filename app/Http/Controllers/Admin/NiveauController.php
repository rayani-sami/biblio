<?php

namespace App\Http\Controllers\Admin;

use App\Models\Niveau;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NiveauController extends Controller
{
   public function Niveau (){
   $niveaux=Niveau::with(['section','parentniveau'])->get()->toarray();
  // dd($niveaux);
     return view ('admin.niveau.niveaux')->with(compact('niveaux'));

   }


 public function UpdateNiveauStatus (Request $request){
    if($request->ajax()){
        $data=$request->all();
       if($data['status']=="Active")
    {
     $status=0;
    }else{
     $status=1;
    }
      Niveau::where('id',$data['niveau_id'])->update(['status'=>$status]);
  return response ()->json(['status'=>$status,'niveau_id'=>$data['niveau_id']]);
  }

}


public function addEditniveau ( Request $request,$id=null) {
  Session::put('page','niveaux');
  if($id=="")
  {
     $title="Add niveau";
    $niveau=new Niveau;
    $getNiveaux= array();
    $message="niveau add successffuly";
  }else
  { $title="Edit niveau";
    $niveau=Niveau::find($id);
    $getNiveaux=Niveau::with('subNiveau')->where(['parent_id'=>0,'section_id'=>$niveau['section_id']])->get();
    $message="niveau updated successffuly";
  }
  if ($request->isMethod('post'))
  {
    $data = $request->all();
   $rules= [
    'niveau_name' => 'required|',
    'section_id' => 'required',
    'url' => 'required'
      ];

      $messages=[
        'niveau_name.required' => 'niveau_name is required',

        'section_id.required' => 'section_id is required',
        'url.required' => 'url is required'
    ];

      $this->validate($request,$rules,$messages);

       $niveau->section_id=$data['section_id'];
       $niveau->parent_id=$data['parent_id'];
       $niveau->niveau_name=$data ['niveau_name'];
       $niveau->url=$data['url'];
       $niveau->status=1;
       $niveau->save();

       return redirect('admin/niveaux')->with('success_message', $message);
    }




      $getSections=Section::get()->toArray();

  return view('admin.niveau.add_edit')->with (compact('title', 'niveau','getSections','getNiveaux'));

}

public function appendNiveaulevel (Request $request){
    if($request->ajax()){
      $data=$request->all();
      $getNiveaux=Niveau::with('subNiveau')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();
      return view('admin.niveau.append_niveau_level')->with(compact('getNiveaux'));
     }
  }


    /*****************delete niveau */
    public function deleteNiveau ( $id) {

        Niveau::where('id',$id)->delete();
      $message="Niveau has deleted successfully";
    return redirect()->back()->with('succes_message',$message);

   }

}
