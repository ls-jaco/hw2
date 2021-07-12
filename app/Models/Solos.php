<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Solos extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'solos';
    protected $primaryKey = 'id_solo';
    protected $fillable = ['id_solo', 'titolo_traccia', 'album', 'id_musicista', 'strumento', 'pdf'];
}