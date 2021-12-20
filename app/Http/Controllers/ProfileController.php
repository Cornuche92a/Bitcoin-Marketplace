<?php

namespace App\Http\Controllers;

use App\Models\avatar;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    public function index(){

        $getuserinfo = Auth::user();

        return view('profile',compact('getuserinfo'));
}

    public function general(Request $request){

        if($request->has('avatar')){
            $request->validate([
                'avatar' => 'exists:avatars,id'
            ]);

            $user = User::where(['id'=>auth()->user()->id])->firstorfail();
            $user->avatar_id = $request->avatar;
            $user->save();

            return redirect()->route('profile')->with([
                'success' => 'Votre profil a été mis à jour'
            ]);
        }

        if($request->has('email')){
            if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){

            $request->validate([
                'email' => 'required|email'
            ]);

            if(User::where('email','=',$request->email)->exists()){

                return redirect()->route('profile')->with([
                    'error' => 'e-mail déja attribué'
                ]);

            }
            else{

                $user = User::where(['id'=>auth()->user()->id])->firstorfail();
                $user->email = $request->email;
                $user->save();

                return redirect()->route('profile')->with([
                    'success' => 'Votre profil a été mis à jour'
                ]);

            }
        }

        else{
            return redirect()->route('profile')->with([
                'error' => 'E-mail invalide'
            ]);
            }
        }
    }

    public function password(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('profile')->with([
            'success' => 'Mot de passe modifié'
        ]);;
    }


}
