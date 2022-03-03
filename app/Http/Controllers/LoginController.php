<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
class LoginController extends Controller
{
      public function index(){
          return view('login');
      }

      public function auth_login(Request $request){
          $validated=$request->validate([
              'email'=> 'required|email',
              'password' => 'required',
              'g-recaptcha-response' => 'recaptcha'
          ],
        [
            'email.required' => "email is required",
            'password.required' => "password is required",
            'g-recaptcha.required' => "u must select the captcha",
        ]);
         $student= student::where('email',$request->email)->first(); 
         if($student){
             if($request->password == $student->password){
              $request->session()->put("loggedin",$student);
                return redirect()->route('dashboard');
             }else{
                 
                  return redirect('login');
             }
             }else{
                 echo "user not found";
             }
            }

      public function logout(){
         if(session()->has('loggedin')){
           session()->forget('loggedin',null);
         }
         return redirect('login');
         
      }
      function sendMail(){
          return view('email');
      }
      function send(Request $request){
       $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email',
           'message' => 'required'
       ]);
       
       $data = array(
           'name' => $request->name,
           'message' => $request->message
       );

       Mail::to($request->email)

       ->send(new sendEmail($data) );
       return redirect('dashboard')->with('success','email sent successfully');
      }
      }

