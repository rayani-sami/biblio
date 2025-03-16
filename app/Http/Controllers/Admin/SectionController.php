<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{

    /*******************get all section in database  */
    public function sections (){
        $sections=Section::get()->toArray();
     //  dd( $sections);
        return view('admin.sections.sections')->with(compact('sections'));
    }
/*********************modifier le status de section */
       public function UpdateSectionStatus (Request $request){
           if($request->ajax()){
               $data=$request->all();
        if($data['status']=="Active")
           {
            $status=0;
           }else{
            $status=1;
           }
         Section::where('id',$data['section_id'])->update(['status'=>$status]);
         return response ()->json(['status'=>$status,'section_id'=>$data['section_id']]);
       }

    }
    /*****************delete section */
           public function deleteSection ($id) {
               Section::where('id',$id)->delete();
             $message="Section has deleted successfully";
           return redirect()->back()->with('succes_message',$message);

 }

 /**************ajouter ou modifier section */
   public function addEditSection (Request $request, $id=null) {
      Session::put('page','sections');
      if($id=="")
      {
         $title="Add section";
        $section=new Section;
        $message="Section add successffuly";
      }else
      { $title="Edit section";
        $section=Section::find($id);
        $message="Section add successffuly";
      }
      if ($request->isMethod('post'))
      {
        $data = $request->all();
        $rules = [
            'section_name'=> 'required | regex: /^[\pL\s\-]+$/u',
            ];

            $customMessages = [
            'section_name.required' =>'Name is required',
            'section_name.regex' => 'Valid Name is required',
            ];
            $this->validate($request, $rules, $customMessages);
            $section->name= $data['section_name'];
            $section ->status=1;
            $section->save();
            return redirect('admin/sections')->with('success_message', $message);




    }
      return view('admin.sections.add_edit_section')->with (compact('title', 'section'));
   }
}
