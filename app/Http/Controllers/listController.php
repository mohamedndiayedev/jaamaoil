<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\UsedVouchers;
use App\Models\User;
use App\Models\Voucher;


class listController extends Controller
{
    function voucherNames(){
        $customers = User::join('customers', 'users.email', '=', 'customers.email')->pluck('users.name');
        Session::put('customerName', $customers);
        return view('create-master-voucher'); 

    }

    function staffVoucherList(){
        $location=Session::get('location');
        $vouchers = UsedVouchers::join('vouchers', 'used_vouchers.voucher_id', '=', 'vouchers.id')->where('location', $location)->get();
        return view('staff-home')->with('vouchers', $vouchers); 

    }

    function searchVouchers(Request $req){
        $str=$req->findvoucher;
        $str = ltrim($str, "0");
        $vouchers = UsedVouchers::query()->where('voucher_id', $str) 
        ->orWhere('voucher_name', 'LIKE', "%{$str}%") 
        ->get();
        if(count($vouchers) < 1){
            Session::flash('redeem','No records found!'); 
            Session::flash('alert-class','alert-danger');
            return redirect('/staff-home');

        }
        else{
        return view('staff-home')->with('vouchers', $vouchers);
        }
       
    }

    function customerVoucherList(){
        $name=Session::get('customer.name');
        $vouchers = UsedVouchers::join('vouchers', 'used_vouchers.voucher_id', '=', 'vouchers.id')->where('vouchers.voucher_name', $name)->get();
        return view('customer-home')->with('vouchers', $vouchers); 

    }

    function changeStatus(){
        $id=$_GET['id'];
        $voucher = Voucher::where(['id'=>$id])->first();
        if($voucher){
            $voucher->status = "Invalid";
            $voucher->save();
        }
        return redirect('/vouchers-list');
    }

 
}
