<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends BaseController
{

    public function changepw()
    {
        $id_session = User::find(session('id_session'));
        if (session('id_session') != null) {
            return view('changePassword')->with('csrf_token', csrf_token())->with('error', '')->with('nome', $id_session->nome);
        } else {
            return redirect('login');
        }
    }

    public function change_submit(Request $request)
    {

        $error = '';
        $id_session = User::find(session('id_session'));


        $old_password = md5(request('old_password'));
        $new_password = md5(request('new_password'));
        $confirm_password = md5(request('confirm_password'));



        if($old_password == $new_password){
            $error = "La nuova password è uguale a quella che si sta tentando di cambiare, riprovare.";
        }

        if($new_password != $confirm_password){
            $error = "La conferma della password risulta errata, riprovare!";
        }

        if($old_password != $id_session->password){
            $error = "Password errata, riprovare!";
        }



        if (empty($error)) {
            $change = DB::table('users')
                ->where('cf', $id_session->cf)
                ->update(['password' => $new_password]);
            return redirect('userpage');
        }
        else {
            return view('changePassword')->with('csrf_token', csrf_token())->with('error', $error)->with('nome', $id_session->nome);
    }
}
}