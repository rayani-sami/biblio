<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rapport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RapportController extends Controller
{
  public function rapport (){


/********************get tous les rapport avec les etudiants */
    $rapports=Rapport::with('user')->get()->toarray();
    return view('admin.rapports.rapports')->with(compact('rapports'));

  }

/***********************accepter rapport  */
  public function UpdateRapportStatus (Request $request){
    if($request->ajax()){
        $data=$request->all();
       if($data['status']=="Active")
    {
     $status=0;
    }else{
     $status=1;
    }
      Rapport::where('id',$data['rapport_id'])->update(['status'=>$status]);
  return response ()->json(['status'=>$status,'rapport_id'=>$data['rapport_id']]);
  }

}
/**************************voir le rapport */
public function viewPdfrapport($id)
{
    $pdfFile = Rapport::findOrFail($id);
    $pdfPath = $pdfFile->pdf;
    $filePath = storage_path('app/public/rapport'.'/'. $pdfPath);
    return response()->file($filePath);
}

/******************delete rapport************ */
    public function deleteRapport ( $id) {
        Rapport::where('id',$id)->delete();
        $message="Rapport has deleted successfully";
      return redirect()->back()->with('succes_message',$message);

     }

}
