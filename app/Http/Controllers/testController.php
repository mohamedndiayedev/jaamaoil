<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Customer;

class testController extends Controller
{
    function test(){
        $folder_path = public_path().'/pdfs/';
        $files = glob($folder_path.'/*'); 
        
        foreach($files as $file) {
            
            if(is_file($file)) {
                unlink($file); 
            }
        }

    }

    function test2(Request $request){
       

return view('test'); 

    }

}
