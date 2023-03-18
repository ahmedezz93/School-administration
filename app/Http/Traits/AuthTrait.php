<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'student'){
            $guardName= 'student';
        }
        elseif ($request->type == 'the_parent'){
            $guardName= 'the_parent';
        }
        elseif ($request->type == 'teacher'){
            $guardName= 'teacher';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        elseif ($request->type == 'the_parent'){
            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        elseif ($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
