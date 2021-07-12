<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'downloads';
    protected $primaryKey = 'id_download';
    protected $fillable = ['data_ora', 'cf_utente', 'id_solo'];
}
