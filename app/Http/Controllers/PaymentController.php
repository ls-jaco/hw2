<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends BaseController
{


    public function payment()
    {
        $id_session = User::find(session('id_session'));
        if (session('id_session') != null) {
            return view('payment')->with('csrf_token', csrf_token())->with('error', '')->with('nome', $id_session->nome);
        } else {
            return redirect('login');
        }
    }

    public function payment_submit()
    {

        $error = '';
        $date = date('Y-m-d');


        $metodo_pagamento = Payment::where('cf_utente', session('id_session'))->get();

        foreach ($metodo_pagamento as $mp) {
            if ($mp->n_carta == request('n_carta')) {
                $error = 'Questa carta è già registrata per questo utente';
                break;
            }
        };

        if (empty($error)) {
            Payment::create(['n_carta' => request('n_carta'), 'proprietario' => request('proprietario'), 'CVV' => md5(request('CVV')), 'data_scadenza_carta' => request('data_scadenza_carta'), 'cf_utente' => session('id_session')]);
            return redirect('subup');
        } else {
            return view('payment')->with('csrf_token', csrf_token())->with('error', $error);
        }
    }
}
