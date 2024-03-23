<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
   public function AdminLogin(){
    return view('Admin.admin');
   }

   public function AdminLoginCode(Request $request){

      $validator = Validator::make($request->all(), [
         'email' => 'required',
         'password' => 'required',
     ]);
     if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
     }else{
         $email = $request->email;
         $password = $request->password;
         $table = DB::table('users')->where('email',$email)->first();
         if(empty($table)){
            Session::flash('error', 'Email is Invalid!');
            return redirect()->back()->withInput();

         }
     }
      
   }
   public function Admindashboard(){
      return view('admin.dashboard');
     }
}
