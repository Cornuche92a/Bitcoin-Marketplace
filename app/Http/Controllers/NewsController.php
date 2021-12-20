<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add(Request $request){

        $request->validate([
            'tittle' => 'required',
            'body'=>'required'
        ]);

        $news = new \App\Models\News();
        $news->new_tittle=$request->tittle;
        $news->new_body=$request->body;
        $news->save();

        return redirect()->route('dashboard')->with('success','Actualité ajoutée');


    }

    public function delete(Request $request){
        if(auth()->user()->admin == 1) {
            $request->validate([
                'id' => 'required'

            ]);

            $news = News::where('id', '=', $request->id)->firstorfail();
            $news->delete();

            return redirect()->route('dashboard')->with('success', 'Actualité supprimée');
        }
        else{

            return 'Bonsoir non';
        }
    }

}
