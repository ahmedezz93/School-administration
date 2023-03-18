<?php

namespace App\Http\Controllers;

use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{

use AuthTrait;
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

public function index(){


    return view('home.selection');
}



public function showform($type){


    return view('home.new_login',compact('type'));
}


public function destroy(Request $request,$type)
{
    Auth::guard($type)->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}



public function login(Request $request){

    if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
       return $this->redirect($request);
    }

    else{

           flash()->adderror('يرجى ادخال بيانات صحيحه');
        return redirect()->route('selection');
    }

}
public function dashboard(){

    return view('dashboard');
}

}
