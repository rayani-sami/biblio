<?php

namespace App\Http\Controllers\Subfront;

use App\Models\User;
use App\Models\Niveau;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{

    /********************logout function */
    public function userLogout (){
        Auth::logout();
        return redirect('/index');
       }

/*************************forgot password function */
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
                    Mail::send('emails.user_forgot_password', $messageData,function($message)
                    use($email){
                        $message->to($email)->subject('new password - Big store');
                    });
                    // success message
                    return response()->json(['type'=>'success','message'=>'new password sent to your registred email']);
            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }else{
                return view('front.users.forgot_password');
          }

    }



/**********************modifier password  */
     public function userUpdatePassword (Request $request){
        if($request->ajax()){
            $data = $request->all();
           //echo "<pre>"; print_r($data); die;
            $validator=Validator::make($request->all(),[
                'current_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:new_password',
            ]);

            if($validator->passes()){
           // update user password
           $current_password=$data['current_password'];
           $checkPassword=User::where('id',Auth::user()->id)->first();

          if(Hash::check($current_password,$checkPassword->password)){
            $user=User::find(Auth::user()->id);
            $user->password=bcrypt( $data['new_password']);
            $user->save();


            return response()->json(['type'=>'success','message'=>'your password  successfully updated']);

          }else{
            return response()->json(['type'=>'incorrect','message'=>'your current password is incorrect']);
          }


           //redirect back user with success msg


            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }else{

            return view('front2.users.user_account2');
        }
        }

 /************************mettre a jour information */
        public function updateDetails (Request $request){
           // Session::put('page','updatedetail');
            if ($request->isMethod('post')){

                $data = $request->all();
                // echo "<pre>"; print_r($data);die;
                $rules= [
                    'user_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'user_mobile' => 'required|numeric',

                      ];

                      $messages=[
                        'user_name.required' => 'name  is required',

                        'user_mobile.required' => 'mobile is required'
                    ];

                      $this->validate($request,$rules,$messages);
                      // upload image admin
                      if ($request->hasFile('user_image')){

                        $image_tmp=$request->file('user_image');
                        if($image_tmp->isValid()){
                            //get image extension
                            // create new manager instance with desired driver
                           $manager = new ImageManager(new Driver());
                            $extension=$image_tmp->getClientOriginalExtension();


                            //generate new name image
                            $img=rand(111,99999).'.'.$extension;

                            $imagePath='subfront/images/photos/'.$img;
                            //upload image



                             $img=$manager->read($image_tmp);
                            // $img=$img->resize(370,246);
                             $img->toJpeg(80)->save($imagePath);



                        }
                        elseif (!empty($data ['current_user_image'])){
                            $img =$data ['current_user_image'];
                        }else{
                            $img="";
                         }
                      }

                User::where('id',Auth::user()->id)->update([
                'name'=>$data['user_name'],

                'mobile'=>$data ['user_mobile'],

                'image'=>$imagePath]);
                return redirect ()->back()->with('success_message','user details has updated successfully');
            }


            $user = auth()->user();
            // Récupérer le niveau associé à l'utilisateur
             $niveau = Niveau::find($user->niveau_id);
             $nomNiveau = $niveau->niveau_name;

             $user = auth()->user();
            // Récupérer le niveau associé à l'utilisateur
             $specialite = Section::find($user->section_id);
             $nomSec= $specialite->name;
            return view('subfront.setting.mise_a_jour')->with(compact('nomNiveau','nomSec'));
           }



}
