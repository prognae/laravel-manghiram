<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //displays the homepage
    public function index(Request $request) {
        return view('homepage', ['user' =>  $request->session() -> get('username')]);
    }

    //validate login
    public function validateLogin(Request $request) {
        // return response('hello');
        $username = $request -> input('user');
        $password = $request -> input('pass');

        $validate = DB::select("SELECT account_id, username, password from account where username = '$username';");
        
        if(!$validate) {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
        else if($validate) {
            // return view('homepage', ['user' => $username]);
            if(Hash::check($password, $validate[0]->password)) {
                $request->session() -> put('username', $username);
                $request->session() -> put('user_id', $validate[0]->account_id);
                return redirect('/items');
            }
            else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
            
        }
    }

    //logout session forget
    public function logout() {
        session() -> forget('username');
        return redirect('/');
    }
}
