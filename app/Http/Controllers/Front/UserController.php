<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Niveau;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function login (){
    return view('front.users.login');
   }
   public function register (){
    $specialites = Section::get()->toArray();
     $niveaux = Niveau::get()->toArray();
    return view('front.users.register')->with(compact('specialites','niveaux'));
   }


public function userRegister (Request $request){

    if ($request->ajax()) {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $validator=Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'mobile' => 'required|numeric|min:8',
            'email' => 'required|email|max:100|unique:users',
            'password'=>'required|min:6',

        ],
        );


        if($validator->passes()){


               // regsitre user
          $user =new User();
          $user->name=$data['name'];
          $user->mobile=$data['mobile'];
          $user->email=$data['email'];
          $user->section_id=$data['specialite'];
          $user->niveau_id=$data['niveau'];
          $user->password=bcrypt($data['password']);
          $user->status=0;
          $user->save();

// activte user when user confirm his email account

           $email=$data['email'];
            $messageData=['name'=>$data['name'],'email'=>$data['email'],
            'code'=>base64_encode($data['email'])];
            Mail::send('emails.confirmation',$messageData,function($message)use($email){
                $message->to($email)->subject('confirm your  account ');
           });
           //redirect back with success message
           $redirectTo=url('user/login');
           return response()->json(['type'=>'success','url'=>$redirectTo ,
           'message'=>'Please confirm your email to activate your account']);

        }else{
            return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
   }
   }
   public function userLogin (Request $request) {
    if ($request->ajax()) {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        $validator=Validator::make($request->all(),[
            'email' =>'required|email|max:100|exists:users',
            'password'=>'required|min:6',
             ]);
        if($validator->passes()){
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                if(Auth::user()->status==0){
                      Auth::logout();
                      return response()->json(['type'=>'active',
                      'message'=>'your account is inactive .please confirm your account ']);
                }

               if(!empty(Session::get('session_id'))){
                    $user_id=Auth::user()->id;
                    $session_id=Session::get('session_id');

                }
                $redirectTo=url('/subfront/index');
                return response()->json(['type'=>'success','url'=>$redirectTo]);
               }else{
                return response()->json(['type'=>'incorrect','message'=>'Incorrect Email or Password']);
               }

       }else{
        return response()->json(['type'=>'error','errors'=>$validator->messages()]);
    }
 }
}

public function confirmAccount ($code){
    $email=base64_decode($code);
    $userCount=User::where('email',$email)->count();
    if($userCount>0){
        $userDetails=User::where('email',$email)->first();
        if($userDetails->status==1){
            return redirect('user/login')->with('error_message','your account is already activate. you can login now');
        }else{
            User::where('email',$email)->update(['status'=>1]);
               $messageData=['name'=>$userDetails->name,'mobile'=>$userDetails->mobile,'email'=>$email];
                Mail::send('emails.registre',$messageData,function($message)use($email){
                    $message->to($email)->subject('welcome to your account');
                });
                return redirect('user/login')->with('success_message','your account is activated. you can login now');
        }
    }else{
          abort(404);
    }

}

public function forgotPassword (Request $request){
    if ($request->ajax()) {
        $data = $request->all();
        $validator=Validator::make($request->all(),[

            'email' => 'required|email|max:100|exists:users',

        ],

        [
            'email.exists'=>'email does not exists'
        ]
        );
        if($validator->passes()){

            $new_password=Str::random(16);
            User::where('email',$data['email'])->update(['password'=>bcrypt($new_password)]);

            $userDetails=User::where('email',$data['email'])->first()->toArray();
            $email=$data['email'];
            $messageData=['name'=>$userDetails['name'],'password'=>$new_password,'email'=>$email];
                Mail::send('emails.forgot', $messageData,function($message)
                use($email){
                    $message->to($email)->subject('new password - bibliotheque');
                });
                // success message
                return response()->json(['type'=>'success','message'=>'new password sent to your registred email']);
        }else{
            return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
    }else{
            return view('front.users.forgot');
      }

}





}
