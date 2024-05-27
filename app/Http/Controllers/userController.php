<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //

    function Register(Request $req)
    {
        $validData = $req->validate([
            'name' =>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);

        $user = User::create($validData); 
        if ($user) {
            $boole = true;
            # code...
            return $boole;
        }
        $boole = false;
        return $boole;
    }

    function Login(Request $req)
    {
        $validData = $req->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt($validData)) {
            # code...
            $boole = true;
            
            return Auth::user();
        }
    }

    function LagOut()
    {
        Auth::logout();

        return true;
    }
}




// $post_data = array('error' => 'Email Already Exit');
//         $error = json_encode($post_data, JSON_FORCE_OBJECT);

//         $user = new User();
//         $usered = User::where("email", $req->email)->first();
//         $user->name = $req->input('name');
//         $user->email = $req->input('email');
//         $user->password = Hash::make($req->input('password'));
//         if ($usered) {
//             return $error;
//         } else {
//             $user->save();
//             return $user;
//         }


// $post_data = array('error' => 'Password or username is incorrect');
// $error = json_encode($post_data, JSON_FORCE_OBJECT);
// $user = User::where('email', $req->input('email'))->first();

// if (!$user || !Hash::check($req->input('password'), $user->password)) {
//     return  $error;
// } else {
//     return $user;
// }