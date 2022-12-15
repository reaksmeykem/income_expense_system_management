<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login(){
        return view('authentication.login');
    }

    public function register(){
        return view('authentication.register');
    }

    public function submit_register(Request $request){

        $user = new User();

        $token = hash('sha256', time());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|same:password|min:5|max:30'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token = $token;
        $user->status = 1;

        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->email);
        $subject = 'សូមធ្វើការផ្ទៀងផ្ទាត់ការចុះឈ្មោះ!';
        $message = 'សូមធ្វើការចុចតំណភ្ជាប់ខាងក្រោម: <br> <a href="'.$verification_link.'">ផ្ទៀងផ្ទាត់អ៊ីម៉ែល</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'អ្នកបានចុះឈ្មោះរួចរាល់');
    }

    public function registration_verify($token, $email){
        $user = User::where('token',$token)->where('email',$email)->first();

        if(!$user){
            return redirect()->route('login');
        }

        $user->status = 2;
        $user->token = '';
        $user->update();

        return redirect()->route('login')->with('success','អ្នកបានផ្ទៀងផ្ទាត់ការចុះឈ្មោះជោគជ័យ!');
    }

    public function login_submit(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            if(Auth::guard('web')->user()->status == 2){
                return redirect()->route('dashboard');
            }elseif(Auth::attempt($credentials) AND Auth::guard('web')->user()->status == 1){
                return redirect()->route('login')->with('error','សូមធ្វើការផ្ទៀងផ្ទាត់អ៊ីម៉ែល!');
            } 
        }else{
            return redirect()->route('login')->with('error','ព័ត៌មានមិនត្រឹមត្រូវ!');
        } 
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
