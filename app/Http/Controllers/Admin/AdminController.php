<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\EnseignantProffessionel;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class AdminController extends Controller
{


       /************************page acceuil admin*********************************************** */
       public function dashboard (){
        Session::put('page','dashboard');

        $totalsection=Section::where('status','1')->count();
        //dd( $section);

        return view('admin.dashboard')->with(compact('totalsection'));
    }

/***********************login fonction*************************************** */
    public function login (Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>"; print_r($data);die;

            $rules= [
            'email' => 'required|email|max:255',
            'password' => 'required'
              ];

        $messages=[
            'email.required' => 'email address is required',
            'email.email' => 'valid email address is required',
            'password.required' => 'password is required'
        ];

        $this->validate($request,$rules,$messages);

          /*   if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            } else{
                return redirect ()->back()->with('error_message','Invalid email or password');
             }*/
              if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']
             ])){

                if (Auth::guard('admin')->user()->type=="enseignant" && Auth::guard('admin')->user()->confirm=="No"){

                    return redirect()->back()->with('error_message','please confirm your email to activate your enseignant account');

                } else if (Auth::guard('admin')->user()->type!="enseignant" && Auth::guard('admin')->user()->status=="0"){
                return redirect()->back()->with('error_message','your admin account is not active');

                } else {
                    return redirect('admin/dashboard');
                }

            } else{
                return redirect ()->back()->with('error_message','Invalid email or password');
             }
        }
        return view('admin.login');
     }

          /***********logout fonction************************************************************************* */
     public function logout (){

        Auth::guard('admin')->logout();
        return redirect('admin/login');

     }


       /***********update paasword fonction************************************************************************* */

   public function updateAdminPassword (Request $request){
    Session::put('page','updatepassword');
    if ($request->isMethod('post')){

        $data = $request->all();
         //echo "<pre>"; print_r($data);die;

        if(Hash::check( $data ['current_password'],Auth::guard('admin')->user()->password)){

            if($data['confirm_password']==$data ['new_password']){

                Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>
                bcrypt($data ['new_password'])]);

                return redirect ()->back()->with('success_message','password has updated successfully');
            } else{
                return redirect ()->back()->with('error_message','new password and confim password does not match');
             }
          }  else {
            return redirect ()->back()->with('error_message',' your current password is incorrect');
         }
    }
    $adminDetails =Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();

      return view('admin.setting.updatepassword')->with(compact('adminDetails'));
   }

      /*********************PASSWORD CURRENT****************************** */
      public function  checkAdminPassword (Request $request){

        $data = $request->all();

   //  echo "<pre>"; print_r($data);die;

        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true" ;
        }else{
            return "false";
        }
       }

       /***********update admin detials fonction*************************** */
       public function updateAdminDetails (Request $request){
        Session::put('page','updatedetail');
        if ($request->isMethod('post')){

            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $rules= [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric'
                  ];

                  $messages=[
                    'admin_name.required' => 'name address is required',

                    'admin_mobile.required' => 'mobile is required'
                ];

                  $this->validate($request,$rules,$messages);
                  // upload image admin
                  if ($request->hasFile('admin_image')){

                    $image_tmp=$request->file('admin_image');
                    if($image_tmp->isValid()){
                        //get image extension
                        // create new manager instance with desired driver
                       $manager = new ImageManager(new Driver());
                        $extension=$image_tmp->getClientOriginalExtension();


                        //generate new name image
                        $img=rand(111,99999).'.'.$extension;

                        $imagePath='admin/images/photos/'.$img;


                        //upload image
                       // \Intervention\Image\Facades\Image::make($image_tmp)->save($imagePath);


                         $img=  $manager->read($image_tmp);
                        // $img=$img->resize(370,246);
                         $img->toJpeg(80)->save($imagePath);



                    }
                    elseif (!empty($data ['current_admin_image'])){
                        $img =$data ['current_admin_image'];
                    }else{
                        $img="";
                     }
                  }

            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data ['admin_name'],'mobile'=>$data ['admin_mobile'],'image'=>$imagePath]);
            return redirect ()->back()->with('success_message','admin details has updated successfully');
        }
        return view('admin.setting.updatedetail');
       }

          /**********************admins managment*********************** */

        public function admins ($type =null){
    $admins=Admin::query();
    if(!empty($type)){
         $admins= $admins->where('type',$type);
         $title=ucfirst($type)."s";
         Session::put('page','view_'. strtolower($title));
    } else{
     $title="All Admins/Enseignant";
     Session::put('page','view_all');
    }
     $admins=$admins->get()->toArray();

  //dd($admins);
   return view('admin.admins.admins')->with(compact('admins','title'));
       }



      /**************Enseignant DETAILS ******************* */
 public function updateEnseignantDetails (Request $request ){

        if ($request->isMethod('post')){

            $data = $request->all();
        //   echo "<pre>"; print_r($data);die;
            $rules= [
                'enseignant_name' => 'required|regex:/^[\pL\s\-]+$/u',
                  ];

                  $messages=[
                    'enseignant_name.required' => 'name  is required',
                ];

                  $this->validate($request,$rules,$messages);
                  // upload image admin
                  if ($request->hasFile('enseignant_image')){

                    $image_tmp=$request->file('enseignant_image');
                    if($image_tmp->isValid()){
                        //get image extension
                        $extension=$image_tmp->getClientOriginalExtension();
                        //generate new name image
                        $imageName=rand(111,99999).'.'.$extension;

                        $imagePath='admin/images/photos/'.$imageName;
                        //upload image
                    //    \Intervention\Image\Facades\Image::make($image_tmp)->save($imagePath);
                    }
                    elseif (!empty($data ['current_enseignant_image'])){
                        $imageName =$data ['current_enseignant_image'];
                    }else{
                        $imageName="";
                     }
                  }
    //update in admins table
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['enseignant_name'],
            'mobile'=>$data ['enseignant_mobile'],
            'image'=>$imageName]);


        //update in Enseignant table
        Enseignant::where('id',Auth::guard('admin')->user()->enseignant_id)->update(
            ['name'=>$data ['enseignant_name'],
            'mobile'=>$data ['enseignant_mobile'],
            'grade'=>$data ['enseignant_grade'],
            'departement'=>$data ['enseignant_departement'],
            'nationnalite'=>$data ['enseignant_nationnalite'],
             ],
        );
            return redirect()->back()->with('success_message','Enseignant details has updated successfully');

        }

    return view('admin.setting.update_enseignant');

   }



            /************************view enseignant details */

       public function viewEnseignantDetails ($id){

    $enseignantDetails=Admin::with('enseignant')->where('id',$id)->first();

    $enseignantDetails=json_decode(json_encode($enseignantDetails),true);
 //  dd($enseignantDetails);
    return view ('admin.admins.view_enseignant_details')->with(compact('enseignantDetails'));
          }


          public function UpdateAdminStatus (Request $request){
            if($request->ajax()){
                $data=$request->all();
                if($data['status']=="Active")
                {
                    $status=0;
                 }else{
                    $status=1;
                 }
                 Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
                 $adminDetails=Admin::where('id',$data['admin_id'])->first()->toArray();
                // $adminType=Auth::guard('admin')->user()->type;
                 if($adminDetails['type']=="enseignant" && $status==1){
                    Enseignant::where('id',$adminDetails['enseignant_id'])->update(['status'=>$status]);
                     //send approval email confirmation for enseignant
                $email =$adminDetails['email'];
                $messagedata=[
                    'email' =>$adminDetails['email'],
                    'name' =>$adminDetails['name'],
                    'mobile' =>$adminDetails['mobile'],
                ];

                Mail::send('emails.enseignant_approved',$messagedata,function($message) use ($email){
                    $message->to($email)->subject(' your enseignant account is approved');
                });
                 }
                 return response ()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
            }

         }



      /***********************get all  users in database *************** */
         public function Users (){

            $users=User::get()->toArray();
            // dd( $users);
            return view ('admin.users.users')->with(compact('users'));
         }

          /**********update users status******************* */
          public function UpdateUserStatus (Request $request){
            if($request->ajax()){
                $data=$request->all();
         if($data['status']=="Active")
            {
             $status=0;
            }else{
             $status=1;
            }
              User::where('id',$data['user_id'])->update(['status'=>$status]);
          return response ()->json(['status'=>$status,'user_id'=>$data['user_id']]);
        }

        }
         /********************delete user ******** */

         public function deleteUser ( $id) {
            User::where('id',$id)->delete();
          $message="User has deleted successfully";
        return redirect()->back()->with('succes_message',$message);

}
}
