<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class Notifications extends Controller
{
    public function index($id){


        $notifications = notification::where(['id'=>$id, 'user_id'=>auth()->user()->id])->get();

        foreach($notifications as $notification){

            notification::where(['id'=>$id, 'user_id'=>auth()->user()->id])->delete();



            if($notification->type->id == 3){
                return redirect()->route('orders');
            }
            if($notification->type->id == 1){
                return redirect()->route('support');
            }
            if($notification->type->id == 2){
                return redirect()->route('dashboard');
            }

        }


    }

    public function constant(){
        return notification::where('user_id',auth()->user()->id)->get();
    }
}
