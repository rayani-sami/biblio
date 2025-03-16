<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function addSubscriber (Request $request){
        if($request->ajax()){
            $data=$request->all();
            $subscriberCount=Newsletter::where('email',$data['subscriber_email'])->count();

            if($subscriberCount>0){
                return "exists";

            }else{
                // add subscriber in table
                $subscriber=new Newsletter ;
                $subscriber->email=$data['subscriber_email'];
                $subscriber->status=1;
                $subscriber->save();
                return "saved";
            }
        }

    }

}
