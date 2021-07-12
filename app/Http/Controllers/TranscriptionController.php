<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Solos;
use App\Models\Download;
use Illuminate\Http\Request;

class TranscriptionController extends BaseController
{
    public function transcriptions()
    {
        $id_session = User::find(session('id_session'));


        $solos_result = Solos::all();

        if(session('id_session') != null) {
            return view('transcriptions', [
                'csrf_token' => csrf_token(),
                'error' => '',
                'nome' => $id_session->nome,
                'solos_result' => $solos_result,
            ]);
        } else {
            return redirect('login');
        }
    }

    public function download(Request $request){

        $solos_result = Solos::all();

        $error = "";
        $date = date('Y-m-d');

        $id_session = User::find(session('id_session'));
        $user = User::where('cf', session('id_session'))->first();


        
        if($user->tipo == 'Standard' && $user->n_downloads > 5){
            $error = "Hai superato il limite di download gratuiti. Per continuare a scaricare abbonati!";
        }
        
        
        if (empty($error)) {
            
            $user->save();
            
            $dl = Download::create([
                'id_download',
                'data_ora'=> $date,
                'cf_utente'=>session('id_session'),
                'id_solo' => $request['id_solo']
            ]);
            $dl->save();

            $pdf = Solos::find($request->id_solo);

            $file_contents = $pdf->pdf;

            return response($file_contents)
                ->header('Cache-Control', 'no-cache private')
                ->header('Content-Description', 'File Transfer')
                ->header('Content-Type', 'application/octet-stream')
                ->header('Content-length', strlen($file_contents))
                ->header('Content-Disposition', 'attachment; filename=' . $pdf->titolo_traccia)
                ->header('Content-Transfer-Encoding', 'binary');
        }else
        {
        return view('transcriptions')->with('csrf_token', csrf_token())->with('error', $error)->with('nome', $id_session->nome)->with('solos_result', $solos_result);
    }
    }
}
