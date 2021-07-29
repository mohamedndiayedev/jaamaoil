<?php


namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Voucher;
use App\Models\UsedVouchers;
use Illuminate\Pagination\LengthAwarePaginator;
use Cookie;


class VoucherController extends Controller
{
    function createVoucher(Request $req){
        $count=$req->total;

        for ($i=0; $i<$count; $i++){

            $voucher = new Voucher;
            $voucher->voucher_name = $req->vname;
            $voucher->voucher_code = Hash::make(Str::uuid()->toString());
            $voucher->short_code = $req->scode;
            $voucher->value = $req->value;
            $voucher->expiry_date = $req->edate;
            $voucher->created_by = Session::get('admin.name');
            $voucher->status = "Valid";
            $voucher->save();
        }
       
        if(Cookie::has('count')){
            Cookie::queue(Cookie::forget('count'));
        }
        Cookie::queue('count', $count, 10);
        Session::flash('record','Vouchers created successfully!'); 
        Session::flash('alert-class','alert-success');
        return redirect('/vouchers-list');
      

    }

    function listVouchers(){
        $vouchers = Voucher::orderBy('id', 'desc')->get();
        
        return view('vouchers-list')->with('vouchers', $vouchers); 

        
    }

function customerVouchers(){
    $customer=Session::get('customer.name');
    $vouchers = Voucher::orderBy('id', 'desc')->where('voucher_name', $customer)->get();
    return view('customer-vouchers')->with('vouchers', $vouchers); 

}


    function searchVouchers(Request $req){
        $str=$req->findvoucher;
        $str = ltrim($str, "0");
        $vouchers = Voucher::query()->where('id', $str) 
        ->orWhere('voucher_name', 'LIKE', "%{$str}%") 
        ->paginate(10);
        if(count($vouchers) < 1){
            Session::flash('record','No records found!'); 
            Session::flash('alert-class','alert-danger');
            return redirect('/vouchers-list');

        }
        else{
        return view('vouchers-list')->with('vouchers', $vouchers);
        }
       
    }

    function checkVoucher(Request $request){
        $code=$_GET['code'];
        $voucher = Voucher::query()->where('voucher_code', $code)->first();
        
        if($voucher){
            if($voucher->status == 'Valid'){
                if($voucher->expiry_date >= Carbon::now()->toDateString()){
                    $id=$voucher->id;
                    session(['tempId' => $id]);
                    $request->session()->flash('voucherInfo', $voucher);
                    $request->session()->flash('voucher-validity', 'true');
                    return redirect('/scan-me');
                }
            }
           else{
            $request->session()->flash('voucher-validity', 'false');
            return redirect('/scan-me');
        }
        }
        else{
            $request->session()->flash('voucher-validity', 'false');
            return redirect('/scan-me');
        }
        
    }

    function redeemVoucher(){
        $id=Session::get('tempId');
        $UsedVoucher = new UsedVouchers;
        $UsedVoucher->voucher_id = $id;
        $UsedVoucher->location = Session::get('location');
        $UsedVoucher->staff = Session::get('staff.name');
        $UsedVoucher->save();

        $voucher = Voucher::query()->where('id', $id)->first();
        if($voucher){
            $voucher->status = 'Redeemed';
            $voucher->save();
            session()->forget('tempId');
            Session::flash('redeem','Voucher redeemed successfully!'); 
            Session::flash('alert-class','alert-success');

        }

        else{
            Session::flash('redeem','Problem encountered when trying to redeem the voucher. Please try again!'); 
            Session::flash('alert-class','alert-danger');

        }
        return redirect('/staff-home');

    }

 
}

