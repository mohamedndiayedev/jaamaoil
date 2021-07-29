<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Cookie;


class manageUsersController extends Controller
{
    function viewCustomers(){
        $customers = Customer::join('users', 'users.email', '=', 'customers.email')->paginate(10);
        session(['page' => 'customers']);
        return view('manage-users')->with('customers', $customers);
        
    }

    function viewAdmins(){
        $users = User::where('user_type', 'admin')->paginate(10);
        session(['page' => 'admins']);
        return view('manage-users')->with('users', $users);
 
    }

    function viewStaffs(){
        $staffs = Staff::join('users', 'users.email', '=', 'staff.email')->paginate(10);
        session(['page' => 'staffs']);
        return view('manage-users')->with('staffs', $staffs);
  
    }

    function addCustomer(Request $req){
        $customer = new Customer;
        $customer->email = $req->email;
        $customer->contact = $req->contact;
        $customer->address = $req->address;
        $customer->save();

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->user_type = 'customer';
        $pwd=$req->password;
        $user->password=Hash::make($pwd);
        $user->save();
        Session::flash('register','Registration succesful!'); 
        Session::flash('alert-class','alert-success');
        return redirect('/reg-customer');

        /* $sendTo = array('name'=>$req->name, 'email' => $req->email, 'password'=> $pwd);
        $emailSent = $this->sendMail($sendTo);
        if($emailSent){
            
            return redirect('/manage-customers');
        } */
    }

    function removeUser(Request $req){
        $email=$req->email;
       
        $user=User::where('email', $email)->first();
        User::where('email', $email)->delete();

        if($user['user_type'] == 'staff'){
            Staff::where('email', $email)->delete();
            return redirect('/manage-staffs'); 

        }

        return redirect('/manage-admins'); 

    }


    function addStaff(Request $req){
        $staff = new Staff;
        $staff->email = $req->email;
        $staff->contact = $req->contact;
        $staff->branch =$req->branch;
        $staff->save();

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->user_type = 'staff';
        $pwd=$req->password;
        $user->password=Hash::make($pwd);
        $user->save();
        Session::flash('register','Registration succesful!'); 
        Session::flash('alert-class','alert-success');
        return redirect('/reg-staff');
    }


    function addAdmin(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->user_type = 'admin';
        $pwd=$req->password;
        $user->password=Hash::make($pwd);
        $user->save();
        Session::flash('register','Registration succesful!'); 
        Session::flash('alert-class','alert-success');
        return redirect('/reg-admin');

    }

    function changePassword(Request $req){
        $pwd=$req->password;
        $email = Session::get('email');
        $user=User::where('email', $email)->first();
        if($user){
            $user->password = Hash::make($pwd);
            $user->save();
            Session::flash('password', 'Password changed successfully!');
            return redirect('/profile');

        }
    }


    function sendMail($sendTo){
        $to_name = $sendTo['name'];
        $to_email = $sendTo['email'];

        Cookie::queue(Cookie::forget('name'));
        Cookie::queue(Cookie::forget('pwd'));

        Cookie::queue('name',$sendTo['name'], 10);
        Cookie::queue('pwd', $sendTo['password'], 10);

        $data = array('name'=>$sendTo['name'], 'password' => $sendTo['password']);
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('This is your password');
        $message->from('cssassignment3@gmail.com','Humairaa Nunhuck');
        });
        return true;
    }
    public function boot()
    {
        Paginator::defaultView('vendor.bootstrap-4');
    }
}
