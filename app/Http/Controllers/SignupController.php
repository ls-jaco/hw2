<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class SignupController extends BaseController
{

    public function signup_submit()
    {

        $error = '';

        //Email già registrata
        if (User::where('email', '=', request('email'))->count() > 0) {
            $error = 'Email già registrata';
        }
        //Utente già registrato
        else if (User::where('cf', '=', request('cf'))->count() > 0) {
            $error = 'Utente già registrato';
        } else {
            //La password deve contenere almeno 8 caratteri
            if (strlen(request('password')) < 8) {
                $error = 'La password deve contenere almeno 8 caratteri';
            }
            //Il campo password e la sua conferma non coincidono
            else if (request('password') != request('confirm_password')) {
                $error = 'Le password non coincidono. Riprovare';
            }
        }

        if (empty($error)) {
            User::create(['cf' => request('cf'), 'nome' => request('nome'), 'cognome' => request('cognome'), 'email' => request('email'), 'password' => md5(request('password')), 'data_nascita' => request('data_nascita'),]);
            return redirect('login');
        } else {
            return view('signup')->with('csrf_token', csrf_token())->with('email', '')->with('error', $error);
        }
    }

    public function signup()
    {
        if (session('id_session') != null) {
            return redirect('home');
        } else {
            return view('signup')->with('csrf_token', csrf_token())->with('error', '')->with('nome', '');
        }
    }
}
