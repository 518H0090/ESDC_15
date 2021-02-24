<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct() {

    }

    public function index(){
        return view('dangnhap.dangnhap');
    }

    public function check(Request $request){

        // if($request->remember == 'remember'){
        //     $remember = true;
        // }else{
        //     $remember = false;
        // }

        if(Auth::attempt(['email' => $request->email,'password'=>$request->password]/*,$remember*/)){
            return  redirect()->route('home');
        }else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('dangnhap.dangnhap');
    }   
}
