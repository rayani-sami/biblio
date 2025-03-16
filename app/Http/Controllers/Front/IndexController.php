<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Examen;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
   public function index (){
    return view ('front.index');
   }

   public function about (){
    return view('front.contact.about');
   }


   public function service (){

    $totaluser=User::count();
    $totalbook=Cours::count();
    $totalexamen=Examen::count();
    //$totalrapport=::count();

    return view('front.contact.service')->with(compact('totaluser','totalbook','totalexamen'));
   }

   public function fqs (){
    $totaluser=User::count();
    $totalbook=Cours::count();
    $totalexamen=Examen::count();
    //$totalrapport=::count();
    return view('front.contact.faqs')->with(compact('totaluser','totalbook','totalexamen'));
   }


   public function privacy (){
    return view('front.contact.privacy');
   }


   public function contactus (Request $request){
    if($request->isMethod('post')){
        $data=$request->all();
       // dd($data);


        $rules=[
            "name"=>"required|string|max:100",
            "email"=>"required|email|max:150",
            "subject"=>"required|max:200",
            "message"=>"required",
            "mobile"=>"required"
        ];

        $customMessage=[
            'name.required'=>'name is required',
            'email.required'=>'email is required',
            'email.email'=>'email is valid',
            'subject.required'=>'subject is required',
            'message.required'=>'message is required',
            'mobile.required'=>'message is required',
        ];
        $validator=Validator::make($data,$rules,  $customMessage);
        if( $validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

     //send user query to admin
        $email="rayanisami366@gmail.com";
      $messageData=[
         'name'=>$data['name'],
         'email'=>$data['email'],
         'mobile'=>$data['mobile'],
         'subject'=>$data['subject'],
         'comment'=>$data['message']
      ];

        Mail::send('emails.demande',$messageData,function( $message)use( $email){
              $message->to($email)->subject("demande sur le site");
             });
        $message="Merci pour votre question. Nous vous répondrons bientôt.";

    return redirect()->back()->with('success_message',$message);

    }
    return view ('front.contact.contact');
   }



   public function addSubscriber (Request $request){
    if($request->ajax()){
        $data=$request->all();
      //  dd($data);
        $subscriberCount=Newsletter::where('email',$data['subscriber_email'])->count();
        if($subscriberCount>0){
            return "exists";
        }else{
            // add subscriber in table
            $subscriber=new Newsletter ;
            $subscriber->email=$data['subscriber_email'];
            $subscriber->save();
            return "saved";
        }
    }

}
}
