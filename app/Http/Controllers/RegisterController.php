<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
class RegisterController extends Controller
{
 public function index(){
     return view('registration');
 }
 public function store(Request $request){
    $validated         =  $request->validate([
        'name'         => 'required',
        'email'        => 'required|email',
        'password'     => 'required|min:6',
        'repassword'   => 'required_with:password|same:password|min:6'],
        [
            'name.required'          => "name is required",
            'email.required'         => "email is required",
            'password.required'      => "password is required",
            'repassword.required'    => "password must be same"
    ]);
  $student               = new student();
  $student->name         = $request->input('name');
  $student->email        = $request->input('email');
  $student->password     = $request->input('password');
  $student->repassword   = $request->input('repassword');
  $student->save();
//   return back()->with('success','register successfully');
  return redirect('registration');
// student::create($request->all());
// return redirect('login');
//  }
}
}