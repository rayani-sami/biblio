<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
{
    public function subscribers (){
        Session::put('page','subscribers');
        $subscribers=Newsletter::get()->toArray();
      // dd( $subscribers);
        return view('admin.subscribers.subscribers')->with(compact('subscribers'));
    }



     public function deleteSubscriber ( $id) {
        Newsletter::where('id',$id)->delete();
      $message="Subscriber has deleted successfully";
      return redirect()->back()->with('succes_message',$message);

     }
}
