<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{       
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'metodipagamento';
    protected $primaryKey = 'n_carta';
    
    protected $fillable = ['n_carta', 'proprietario', 'CVV', 'data_scadenza_carta', 'cf_utente']; 
    
}