<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){
                $new_user = User::create([
                    'name'=> $google_user->getname(),
                    'email'=> $google_user->getEmail(),
                    'google_id'=> $google_user->getId()
                ]);

                Auth::login($new_user);

                return Redirect::route('communities.index');
            }else{
                Auth::login($user);

                return Redirect::route('communities.index');
            }
        }catch(\Throwable $th){
            dd('Something wen wrong!'.$th->getMessage());
        }
    

    }
}
