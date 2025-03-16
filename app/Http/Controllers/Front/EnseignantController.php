<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EnseignantController extends Controller
{
   public function loginenseignant (){
    return view ('front.enseignant.login');
   }


   public function register (){
    return view('front.enseignant.registre');
   }
   public function register_enseignant (Request $request){
    if ($request->isMethod('post')){
        $data = $request->all();
     // echo "<pre>"; print_r($data);die;
        $rules= [
            "email" => "required|email|max:255|unique:admins|unique:enseignants",
            "mobile" => "required|min:8|numeric|unique:admins|unique:enseignants",
            "password" => "required",
            "name" => "required",

                 ];

        $messages=[
            "email.required" => "email address is required",
            "email.unique"=> "Already email is exists",
            "password.required" => "password is required",
            "name.required"=> "name is required" ,
            "mobile.required" => "mobile is required",
            "mobile.unique" => "Already mobile is exists",

        ];
        $validator=Validator::make($data,$rules,$messages);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        DB::beginTransaction();
        // create Enseignant account
        // insert details in table Enseignant
        $enseignant = new Enseignant;
        $enseignant->name =$data['name'];
        $enseignant->email =$data['email'];
        $enseignant->mobile =$data['mobile'];
        //$enseignant->password =bcrypt($data['password']);
        $enseignant->status =0;
        $enseignant->save();

        $enseignant_id=DB::getPdo()->lastInsertId();
         // insert details in table admins
        $admin = new Admin;
        $admin->type='enseignant' ;
        $admin->enseignant_id=$enseignant_id ;
        $admin->name =$data['name'];
        $admin->email =$data['email'];
        $admin->mobile =$data['mobile'];
        $admin->password = bcrypt($data['password']);
        $admin->status =0;
        $admin->save();

        //send email confirmation for enseignant
        $email =$data['email'];
        $messagedata=[
            'email' =>$data['email'],
            'name' =>$data['name'],
            'code' =>base64_encode($data['email'])
        ];

        Mail::send('emails.confirmation_enseignant',$messagedata,function($message) use ($email){
            $message->to($email)->subject('confirmer votre enseignant compte');
        });


        DB::commit();

        $message ="merci pour votre inscription en tant qu'enseignant. Nous vous confirmerons par e-mail une fois votre compte approuvé." ;
      return redirect('enseignant/login')->with('success_message', $message);
     }
   }




   public function confirmEnseignant ($email){
    $email =base64_decode($email);
    $enseignantCount =Enseignant::where('email',$email)->count();
    if($enseignantCount>0){
     $enseignantDetails =Enseignant::where('email',$email)->first();
     if( $enseignantDetails->confirm=="Yes"){
         $message= "votre compte est déjà confirmé. vous pouvez vous connecter maintenant" ;
         return redirect('enseignant/login')->with('error_message',$message);
     }else{
          Admin::where('email',$email)->update(['confirm'=>'Yes']);
          Enseignant::where('email',$email)->update(['confirm'=>'Yes']);
          //send register email

          $messagedata=[
              'email' =>$email,
              'name' =>$enseignantDetails['email'],
              'mobile' =>$enseignantDetails->mobile
          ];

          Mail::send('emails.enseignant_confirmed',$messagedata,function($message) use ($email){
              $message->to($email)->subject('votre compte enseignant confirmé');
          });

         $message="votre compte est déjà confirmé. vous pouvez vous connecter et ajouter des informations professionnelles,
         pour activer votre compte enseignant et ajouter des examens et des cours " ;
          return redirect('enseignant/login')->with('success_message',$message);
     }


    }else{
     abort(404);
    }

 }


}
