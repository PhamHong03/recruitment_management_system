<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterReques;
use App\Http\Requests\LoginReques;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập hệ thống '
        ]);
    }

    public function store(Request $request) {
      
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' =>'required'
        ]);

        if(Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' =>  1
            ], $request->input('remember'))){
             return redirect()->route('admin');
        }
        Session::flash('error', 'Email và Password không đúng ');
        return redirect()->back();
        
    }

    public function sign_out() {
        Auth::logout();
        return redirect()->route('admin-login');
    }

    public function login(){
        return view('clients.login');
    }

    public function register(){
        return view('clients.register');
    }


    public function postRegister(RegisterReques $request) {

        $request->merge(['password' => Hash::make($request->password)]);
        try{
                    // dd($request->all());
            User::create($request->all());
        }catch(\Throwable $th){

        }
        return redirect()->route('loginClients');
    }   

    public function postLogin(LoginReques $request)  {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
            if ( Auth::user()->role === 0) {
                return redirect()->route('clients.home');
            }
        }
        return redirect()->back()->with('error', 'Thất bại! Vui lòng kiểm tra lại email hoặc password , Có thể bạn không phải khách hàng của chúng tôi!');

    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}

