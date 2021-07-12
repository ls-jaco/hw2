<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Sub;

class UserController extends BaseController
{

    public function userpage()
    {
        $id_session = User::find(session('id_session'));


        $date = Sub::where('cf_utente', $id_session->cf)->first()->data_inizio;
        $expire_date = Sub::where('cf_utente', $id_session->cf)->first()->data_scadenza;

        $startTimeStamp = strtotime($date);
        $endTimeStamp = strtotime($expire_date);
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        $giorni_rimanenti = intval($numberDays);



        if (session('id_session') != null) {
            return view('userpage', [
                'csrf_token', csrf_token(),
                'error' => '',
                'nome' => $id_session->nome,
                'cognome' => $id_session->cognome,
                'tipo' => $id_session->tipo,
                'giorni_rimanenti' => $giorni_rimanenti,
                'n_downloads' => $id_session->n_downloads,
                'csrf_token' => csrf_token()
            ]);
        } else {
            return redirect('login');
        }
    }

    public function disdici_sub()
    {
        $id_session = User::find(session('id_session'));

        $date = date('Y-m-d');

        $change_tipo = DB::table('users')
            ->where('cf', $id_session->cf)
            ->update(['tipo' => 'Standard']);

        $change_stato = DB::table('abbonamenti')
            ->where('cf_utente', $id_session->cf)
            ->update(
                ['stato' => 'Scaduto'],
                ['giorni_rimanenti', '0'],
                ['data_scadenza', $date]
            );
            return view('userpage', [
                'csrf_token', csrf_token(),
                'error' => '',
                'nome' => $id_session->nome,
                'cognome' => $id_session->cognome,
                'tipo' => $id_session->tipo,
                'giorni_rimanenti' => 0,
                'n_downloads' => $id_session->n_downloads,
                'csrf_token' => csrf_token()
            ]);
    }
}
