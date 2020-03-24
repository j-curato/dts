<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }  

    public function registration()
    {
        return view('registration');
    }
    
    public function postLogin(Request $request)
    {
        request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);


        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('ajaxproducts');
        }
        return Redirect::to("/")->withFail('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {  
        request()->validate([
        'fname' => 'required',
        'lname' => 'required',
        'username' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'position' => 'required',
        'privilege' => 'required',
        'status' => 'required'
        ]);
        
        $data = $request->all();

        $check = $this->create($data);
      
        return Redirect::to("/")->withSuccess('Great! You have Successfully loggedin');
    }
    
    public function dashboard()
    {

      if(Auth::check()){
        return view('productAjax');
      }
       return Redirect::to("/")->withSuccess('Opps! You do not have access');
    }

	public function create(array $data)
	{
	  return User::create([
	    'fname' => $data['fname'],
        'lname' => $data['lname'],
	    'username' => $data['username'],
	    'password' => Hash::make($data['password']),
        'position' => $data['position'],
        'privilege'=> $data['privilege'],
        'status'   => $data['status']
  	  ]);
	}
	
	public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}