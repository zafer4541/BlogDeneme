<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Backpages extends Controller
{
    public function index($name)
    {
        return view('Back/dashboard',compact('name'));
    }

    public function login()
    {
        return view('Back/auth/login');
    }

    public function post_login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required | min:6',
            'password' => 'required | min:8',
        ]);/*

        if (Auth::attempt(['user_name' => $request->username, 'password' => $request->password])){

            $admin_name=Auth::attempt(['user_name' => $request->username, 'password' => $request->password])->name;
            dd($admin_name);
            return view('Back\dashboard',compact('admin_name'));
        }
        else
            return redirect()->back()->withErrors('Kullanıcı adı veya şifre yanlış.');*/
        $login = Login::where('user_name', '=', $request->username)->first();
        if (!is_null($login)) {
            $name=$login->name;
            if ($login->password == $request->password)
            {
                return redirect('admin/panel/'.$name);
                //return view('Back\dashboard',compact('name'));
            }
            else
                return redirect()->back()->withErrors('Yanlış şifre girdiniz!');
        } else
            return redirect()->back()->withErrors('Böyle bir kullanıcı adı bulunmamaktadır!');
    }
}
