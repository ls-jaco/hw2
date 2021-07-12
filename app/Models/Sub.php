<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'abbonamenti';
    protected $primaryKey = 'id_abbonamento';
    protected $fillable = ['id_abbonamento', 'data_inizio', 'cf_utente', 'data_scadenza', 'stato', 'giorni_rimanenti', 'n_carta'];
}
