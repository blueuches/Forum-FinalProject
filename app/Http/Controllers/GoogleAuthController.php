<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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

                $base_username = $google_user->getName(); 
                $username = $this->generateUniqueUsername($base_username);

                $new_user = User::create([
                    'name'=> $google_user->getname(),
                    'email'=> $google_user->getEmail(),
                    'username' => $username,
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

    
    private function generateUniqueUsername($base_username) {
        $username = Str::slug($base_username);
        $count = 1; 
        
        while (User::where('username', $username)->exists()) { 
            $username = Str::slug($base_username) . $count; 
            $count++; 
        } 
        return $username; 
    }
}

