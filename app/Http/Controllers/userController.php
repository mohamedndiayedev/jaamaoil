<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Staff;

class userController extends Controller
{
    function login(Request $req){
        $user=User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            Session::flash('error','Invalid Credentials!'); 
            Session::flash('alert-class','alert-danger');
            return redirect('/login');
        }
    
        else{
            if($user->user_type == 'admin'){
                $req->session()->put('admin', $user);
                return redirect('/create-master-voucher');
            }

            elseif($user->user_type == 'staff'){
                $req->session()->put('staff', $user); 
                $staff = Staff::where(['email'=>$user->email])->first();
                $req->session()->put('location', $staff->branch); 
                return redirect('/staff-home');
            }

            elseif($user->user_type == 'customer'){
                $req->session()->put('customer', $user);
                return redirect('/customer-home');
            }
            
        }
    }
    function logout(){
        Session::flush();
        Session::flash('error','You have been successfully logged out!'); 
        Session::flash('alert-class','alert-success');
        return redirect('/login');
    }
    
    function sessionCheck(){
        Session::flash('error','You need to login first!'); 
        Session::flash('alert-class','alert-danger');
        return redirect('/login');
    }
    
    
}
