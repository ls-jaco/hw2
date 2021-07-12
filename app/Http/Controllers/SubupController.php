<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Sub;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class SubupController extends BaseController
{

  public function subup_submit(Request $request)
  {

    $id_session = User::find(session('id_session'));

    $error = '';
    $date = date('Y-m-d');
    $expire_date = date('Y-m-d', strtotime("+60 days"));

    $startTimeStamp = strtotime($date);
    $endTimeStamp = strtotime($expire_date);
    $timeDiff = abs($endTimeStamp - $startTimeStamp);
    $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
    $giorni_rimanenti = intval($numberDays);


    if (Sub::where('stato', 'Attivo')->where('cf_utente', $id_session->cf)->first()) {
      $error = 'Hai già un abbonamento attivo!';
    }


    if (empty($error)) {
      $sub = Sub::create([
        'cf_utente' => session('id_session'),
        'data_inizio' => $date,
        'data_scadenza' => $expire_date,
        'stato' => 'Attivo',
        'giorni_rimanenti' => $giorni_rimanenti,
        'n_carta' => $request['creditcard']
      ]);
      $sub->save();
      return redirect('home');
    } else {
      return view('subup')->with('csrf_token', csrf_token())->with('error', $error)->with('nome', $id_session->nome);
    }
  }

  public function subup()
  {
    $id_session = User::find(session('id_session'));
    if (session('id_session') != null) {
      return view('subup')->with('csrf_token', csrf_token())->with('error', '')->with('nome', $id_session->nome);
    } else {
      return redirect('login');
    }
  }

  public function metodi_pagamento()
  {
    $date = date('Y-m-d');
    $mp = Payment::select('n_carta')->where('data_scadenza_carta', '>', $date)->where('cf_utente', session('id_session'))->get();
    return $mp;
  }
}
