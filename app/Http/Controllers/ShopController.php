<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\logs;
use App\Models\notification;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     *

    public function ProductShow(){
    return view('ProductShow');


    }
     *
     *
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryname)
    {
        $getcategorys = Category::select('id', 'catname','name', 'bannerurl')->where(['catname'=>$categoryname])->get(); // Get categories data
        return view('products',[
            'categorydata'=>$getcategorys,
        ]);


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryname, $name)
    {




        $getlogcat = category::where(['catname' => $categoryname, 'name'=>$name])->firstorfail(); //Get the product name from DB

        $logslist = $getlogcat->logs()->where(['available'=>1])->paginate(10);



        return view('singleproduct',compact('logslist'),compact('getlogcat'));
    }

    public function showcategory($type)
    {
        if($type=='abonnements'){
            $categorys = category::select('id', 'catname','name', 'iconurl')->get();

            return view('shop_list',compact('categorys'));


        }
        else{
            return 'bonsoir non';
        }



        return view('shop_list',compact('logslist'),compact('getlogcat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function placeorder(Request $request)
    {

        $request->validate([
            'productid' => 'required'
        ]);

        $getproduct = logs::select('id', 'category_id', 'available')->where(['id' => $request->productid])->get(); // Get Products id,price,categoryid,available
        //try {
        if ($getproduct[0]->available == 1) { //Check if available
            if (auth()->user()->amount >= $getproduct[0]->category->price) {//Check if not clochard


                User::where(['id' => auth()->user()->id])->update(['amount' => auth()->user()->amount - $getproduct[0]->category->price]); //Update User Wallet
                logs::where('id', $request->productid)->update(['available' => 0]); //Update the Available of Product

                \App\Models\Order::create([         //Attribute the order to User
                    'log_id' => $getproduct[0]->id,
                    'user_id' => auth()->user()->id
                ]);

                notification::create([              //Attribute notification to User
                   'user_id' => auth()->user()->id,
                    'notification_id' => 3
                ]);


                return redirect()->route('products.show',['categoryname'=>$getproduct[0]->category->catname,'name'=>$getproduct[0]->category->name])->with([ // If not clochard & Success redirect to shop and tore session SUCCESS
                    'success' => 'Votre abonnement a été activé'
                ]);
            }
            else {
                return redirect()->route('products.show',['categoryname'=>$getproduct[0]->category->catname,'name'=>$getproduct[0]->category->name])->with([ // If Clochard
                    'error' => 'Fonds insuffisants, rechargez votre compte'
                ]);
            }

        }
        else{
            return redirect()->route('products.show',['categoryname'=>$getproduct[0]->category->catname,'name'=>$getproduct[0]->category->name])->with([ // If tricheur
                'error' =>  'Abonnement indisponible'
            ]);
        }

        //}

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
