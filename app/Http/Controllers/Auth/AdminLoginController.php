<?php

namespace App\Http\Controllers\Auth;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\Listener\UserEventSubscriber;




class AdminLoginController extends Controller
{
    //

    use AuthenticatesUsers;
    //protected $redirectTo = '/guard';
    
    public function __construct(){
        //mudei aqui        v

    	$this->middleware('guest');

    }

    public function mostrarLoginForm(){

    	return view('auth.admin-login');
    }

    public function logar(Request $request){

    	$this->validate($request, [

    		'email' =>'required|email',
    		'password' => 'required|min:6'

    	]);

    	if (Auth::guard('admin')->attempt(['email' =>$request->email, 'password'=>$request->password],$request->remember)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}

    		return redirect()->back()->withInput($request->only('email', 'remember'));


    }



        public function logout(){
           // Auth::guard('admin')->logout();
            $this->middleware('auth:admin')->logout();
            // auth()->user()->logout();
            return redirect()->intended('/');
        }
protected function guard(){
        return Auth::guard('admin');
    }


}
