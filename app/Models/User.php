<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'cf';
    protected $fillable = ['cf', 'nome', 'cognome', 'email', 'password', 'data_nascita', 'tipo', 'n_downloads'];
}
