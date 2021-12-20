<?php

namespace App\Http\Controllers;

use App\Models\logs;
use App\Models\notification;
use App\Models\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {



        $orders = \App\Models\Order::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->limit(5)->get();
        $news = \App\Models\News::limit(4)->orderBy('created_at','desc')->get();
        if(auth()->user()->admin ==1){
            $received = Payment::select('amount_received')->sum('amount_received');
            return view('dashboard',compact('orders','news','received'));
        }

        return view('dashboard',compact('orders','news'));
    }

    public function AddingFunds(){

        return view('add_funds');

    }

    public function orders(){
        $orders = \App\Models\Order::where('user_id',auth()->user()->id)->get();
        return view('orders', [
            'orders'=>$orders
        ]);

    }



}
