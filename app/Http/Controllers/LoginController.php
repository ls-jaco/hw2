<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Client\Request;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends BaseController
{
    public function login()
    {
        if (session('id_session') != null) {
            return redirect('home'); //METTERE USERPAGE
        } else {
            return view('login')->with('csrf_token', csrf_token())->with('error', '')->with('nome', '');
        }
    }

    public function submit()
    {
        $error = '';


        if (empty(request('password'))) {
            $error .= 'Immettere una password!';
        }

        if (empty(request('email'))) {
            $error = 'Immettere un email!';
        }

        $user = User::where('email', request('email'))->first();

        if(!isset($user)){
            $error = "Utente not found.";
        }

        if($user->password != md5(request('password'))){
            $error = "Password errata!";
        }



        if (empty($error)) {
            $user = User::where('email', request('email'))->where('password', md5(request('password')))->first();
            if (isset($user)) {
                session(['id_session' => ($user->cf)]);
                return redirect('home');
            } else {
                $error .= 'I dati inseriti sono errati, riprovare.';
            }
        }
        return view('login')->with('csrf_token', csrf_token())->with('email', '')->with('error', $error)->with('nome', '');
    }

    public function logout()
    {
        session()->flush();
        return redirect('home');
    }
}
